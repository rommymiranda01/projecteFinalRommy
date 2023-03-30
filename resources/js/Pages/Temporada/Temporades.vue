<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from '@inertiajs/vue3';

// const props = defineProps({
//     temporades:{type:Object}
// });
export default {
    components: {AuthenticatedLayout, Head},
    name: "Temporades",
    data() {
        return {
            temporades: [],
        };
    },
    created() {
        this.list();
    },
    methods: {
        async list() {
            axios.get('/temporades').then(res=>{
                this.temporades = res.data;
                //console.log(res.data)
            })
        },
        async eliminar(id) {
            const res = await axios.delete('/temporades/' + id);
            // console.log("Click")
            // console.log(id)
            this.list();
        },
        async editar(id){
            console.log(id)
            //route('editTemporada/'+id)
            axios.get('/temporada.edit/'+id);
        }
    }
}
</script>
<template>
    <Head title="Temporades"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">List Temporades</h2>
                        <a :href="route('temporades.create')" class="btn btn-sm btn-primary">Add Temporada</a>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Year Season</th>
                                <th scope="col" colspan="2" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="t in temporades" :key="t.id">
                                <th scope="row">{{t.id}}</th>
                                <td>{{t.any_temporada}}</td>
                                <td class="text-center">
                                    <a :href="route('temporades.edit', t.id)" id="{{t.id}}" class="btn btn-warning me-2">Edit</a>
                                    <button @click="eliminar(t.id)" class="btn btn-danger me-2">
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

<style scoped>

</style>
