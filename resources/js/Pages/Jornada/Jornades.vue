<template>
    <Head title="Jornades"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">List Match Day</h2>
                        <a :href="route('jornades.create')" class="btn btn-sm btn-primary">Add Match Day</a>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Id Season</th>
                                <th scope="col">Match day</th>
                                <th scope="col" colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="j in jornades" :key="j.id">
                                <th scope="row">{{j.id}}</th>
                                <td>{{j.id_temporada}}</td>
                                <td>{{j.data_jornada}}</td>
                                <td class="text-center">
                                    <a :href="route('jornades.edit', j.id)" id="{{j.id}}" class="btn btn-warning me-2">Edit</a>
                                    <button @click="eliminar(j.id)" class="btn btn-danger me-2">
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
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from '@inertiajs/vue3';
export default {
    components: {AuthenticatedLayout, Head},
    name: "Jornades",
    data() {
        return {
            jornades: [],
        };
    },
    created() {
        this.list();
    },
    methods: {
        async list() {
            axios.get('/jornades').then(res=>{
                this.jornades = res.data;
                //console.log(res.data)
            })
        },
        async eliminar(id) {
            const res = await axios.delete('/jornades/' + id);
            // console.log("Click")
            // console.log(id)
            this.list();
        }
    }
}
</script>

<style scoped>

</style>
