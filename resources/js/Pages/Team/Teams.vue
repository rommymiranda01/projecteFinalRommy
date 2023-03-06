<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from '@inertiajs/vue3';
//import axios from 'axios';


export default {
    components: {AuthenticatedLayout, Head},
    data() {
        return {
            teams: [],
        };
    },
    created() {
        this.list();
    },
    methods: {
        async list() {
            axios.get('/allteams').then(res=>{
                this.teams = res.data;
                //console.log(res)
            })
        },
        async eliminar(id) {
            const res = await axios.delete('/allteams/' + id);
            // console.log("Click")
            // console.log(id)
            this.list();
        },
    }
}
</script>

<template>
    <Head title="Teams"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">List Teams</h2>
                        <a :href="route('newteam')" class="btn btn-sm btn-primary">Add Team</a>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name Team</th>
                                <th scope="col">Logo</th>
                                <th scope="col" colspan="2" class="text-center">Accion</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="t in teams">
                                <th scope="row">{{t.id}}</th>
                                <td>{{t.nom_equip}}</td>
                                <td>{{t.logo}}</td>
                                <td class="text-center">
                                    <button  @click="editar(t.id);" class="btn btn-warning me-2">Editar</button>

                                    <button @click="eliminar(t.id)" class="btn btn-danger">
                                     Eliminar
                                    </button>
<!--                                    <a href="/teams/{{eliminar(t.id)}}/eliminar" class="btn btn-danger btn-sm">Eliminar</a>-->
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


<style scoped>

</style>
