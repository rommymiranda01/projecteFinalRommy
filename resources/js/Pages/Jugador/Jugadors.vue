<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from '@inertiajs/vue3';

export default {
    name: "Jugadors",
    components: {AuthenticatedLayout, Head},
    data() {
        return {
            jugadors: [],
            teams: [],
            players: [],
            id_team: null,
        };
    },
    created() {
        this.list();
        this.listteams();
    },
    methods: {
        async list() {
            axios.get('/jugadors').then(res => {
                this.jugadors = res.data;
                // console.log(res)
            })
        },
        async listteams() {
            axios.get('/teams').then(res => {
                this.teams = res.data;
                // console.log(res)
            })
        },
        async eliminar(id) {
            const res = await axios.delete('/jugadors/' + id);
            // console.log("Click")
            // console.log(id)
            this.list();
        },
        async fetchPlayers() {
            const id = this.id_team;
            axios.get(`/jugadorsteams/${id}`)
                .then(res => {
                    this.players = res.data;
                    console.log(this.players);
                })
                .catch(error => {
                    console.log(error.response);
                });
        }
    }
}
</script>

<template>
    <Head title="Jugadors"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <!--        Rol Admin            -->
                    <div class="p-6 text-gray-900" v-if="$page.props.auth.user.rol === 'admin'">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">List Players</h2>
                        <a :href="route('jugadors.create')" class="btn btn-sm btn-primary">Add Player</a>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">FirstName</th>
                                <th scope="col">LastName</th>
                                <th scope="col">Dorsal</th>
                                <th scope="col">BirthDate</th>
                                <th scope="col">Position</th>
                                <th scope="col">Id Equip</th>
                                <th scope="col" colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="j in jugadors">
                                <th scope="row">{{ j.id }}</th>
                                <td>{{ j.nom }}</td>
                                <td>{{ j.cognom }}</td>
                                <td>{{ j.dorsal }}</td>
                                <td>{{ j.data_naixement }}</td>
                                <td>{{ j.posicio }}</td>
                                <td>{{ j.id_team }}</td>
                                <td class="text-center">
                                    <a :href="route('jugadors.edit', j.id)" id="{{j.id}}"
                                       class="btn btn-warning">Edit</a>
                                    <button @click="eliminar(j.id)" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <!--        Rol User            -->
                    <div class="my-4 mx-3" v-if="$page.props.auth.user.rol === 'user'">
                        <h2>List Players</h2>
                        <select name="id_team" id="id_team" v-model="id_team" @change="fetchPlayers">
                            <option selected disabled hidden value=""></option>
                            <option v-for="t in teams" :value="t.id">{{ t.nom_equip }}</option>
                        </select>
                    </div>

                    <div v-if="id_team">
                        <div class="row row-cols-1 row-cols-md-3 g-4" v-if="$page.props.auth.user.rol === 'user'">
                            <div class="col" v-for="j in players">
                                <div class="card h-100 border-info mb-3 text-dark bg-light">
                                    <img :src="'images/'+j.foto" class="card-img-top" alt="">
                                    <div class="card-footer bg-transparent border-info">
                                        <h6 class="card-title text-center">Nom: {{ j.nom }}</h6>
                                        <p class="card-title text-center">Cognom: {{ j.cognom }}</p>
                                        <p class="card-title text-center">Dorsal: {{ j.dorsal }}</p>
                                        <p class="card-title text-center">Data Naixement: {{ j.data_naixement }}</p>
                                        <p class="card-title text-center">Posició: {{ j.posicio }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div class="row row-cols-1 row-cols-md-3 g-4" v-if="$page.props.auth.user.rol === 'user'">
                            <div class="col" v-for="j in jugadors">
                                <div class="card h-100 border-info mb-3 text-dark bg-light">
                                    <img :src="'images/'+j.foto" class="card-img-top" alt="">
                                    <div class="card-footer bg-transparent border-info">
                                        <h6 class="card-title text-center">Nom: {{ j.nom }}</h6>
                                        <p class="card-title text-center">Cognom: {{ j.cognom }}</p>
                                        <p class="card-title text-center">Dorsal: {{ j.dorsal }}</p>
                                        <p class="card-title text-center">Data Naixement: {{ j.data_naixement }}</p>
                                        <p class="card-title text-center">Posició: {{ j.posicio }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
