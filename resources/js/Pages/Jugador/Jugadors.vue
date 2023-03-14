<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from '@inertiajs/vue3';
export default {
    name: "Jugadors",
    components: {AuthenticatedLayout, Head},

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
                    <div class="p-6 text-gray-900">
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
                            <tr v-for="t in teams">
                                <th scope="row">{{t.id}}</th>
                                <td>{{t.nom_equip}}</td>
                                <td>{{t.logo}}</td>
                                <td class="text-center">
                                    <a :href="route('teams.edit', t.id)" id="{{t.id}}" class="btn btn-warning">Edit</a>
                                    <button @click="eliminar(t.id)" class="btn btn-danger">
                                        Eliminar
                                    </button>
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
