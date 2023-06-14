<template>
    <Head title="Partits"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <!--        Rol Admin            -->
                    <div class="p-6 text-gray-900" v-if="$page.props.auth.user.rol === 'admin'">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">List Match</h2>
                        <a :href="route('partits.create')" class="btn btn-sm btn-primary">Add Match</a>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id Match Day</th>
                                <th scope="col">Id Local Team</th>
                                <th scope="col">Id Visitor Team</th>
                                <th scope="col" colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="p in partits" :key="p.id">
                                <th scope="row">{{ p.id }}</th>
                                <td>{{ p.id_jornada }}</td>
                                <td>{{ p.id_equip_local }}</td>
                                <td>{{ p.id_equip_visitant }}</td>
                                <td class="text-center">
                                    <!--                                    <a :href="route('partits.edit', p.id)" id="{{p.id}}" class="btn btn-warning me-2">Edit</a>-->
                                    <button @click="eliminar(p.id)" class="btn btn-danger me-2">
                                        Delete
                                    </button>
                                    <!--                                    <a :href="route('jornades.index', t.id)" id="{{t.id}}" class="btn btn-warning">Match Day</a>-->
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
                    <!--        Rol User            -->
        <div class="container bg-light border rounded">
            <h2 class="text-center py-3">Calendar of Matches</h2>
                    <div class="card mb-3" v-if="$page.props.auth.user.rol === 'user'" v-for="partit in partitsjornada" :key="partit.id">
                        <div class="card-body">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <p>MatchDay: {{partit.data}}</p>
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <img :src="'images/'+partit.logo_equip_local" class="img-fluid float-left" alt="partit.logo_equip_local" style="width:35%;">
                                        vs
                                        <img :src="'images/'+partit.logo_equip_visitant" class="img-fluid float-right" alt="partit.logo_equip_visitant" style="width: 35%;">
                                    </div>
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <button @click="ticket(partit.id)" class="btn btn-warning">Ticket</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

    </AuthenticatedLayout>
</template>

<script>
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    name: "Partits",
    components: {AuthenticatedLayout, Head},
    data() {
        return {
            partits: [],
            partitsjornada: [],
           partitsentrades: [],
        };
    },
    created() {
        this.list();
        this.partitsteams();
    },
    methods: {
        async list() {
            axios.get('/partits').then(res => {
                this.partits = res.data;
                //console.log(res)
            })
        },
        async eliminar(id) {
            const res = await axios.delete('/partits/' + id);
            // console.log("Click")
            // console.log(id)
            this.list();
        },
        async partitsteams() {
            axios.get('/partitsteams')
                .then(res => {
                    this.partitsjornada = res.data;
                    console.log(res);
                })
                .catch(error => {
                    console.log(error.response);
                });

        },
        async ticket(id) {
                localStorage.setItem('selectedId', id);
                window.location.href = `/entrades/${id}`;
        },
    }
}
</script>

<style scoped>

</style>
