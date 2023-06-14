<script>
import {Head, useForm, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
export default {
    name: "Entrades",
    components: {InputLabel, AuthenticatedLayout, Head},
    data() {
        const users = usePage().props.auth.user;
        return {
            partitsjornada: [],
            selectedId: null,
            form: useForm({
                id_partit: this.selectedId,
                id_user: users.id_user,
            }),
        };
    },
    methods: {
        async partitsentrada() {
            const id = this.selectedId;

            axios.get(`/partitsentrada/${id}`)
                .then(res => {
                    this.partitsjornada = res.data;
                    console.log(res);
                })
                .catch(error => {
                    console.log(error.response);
                });
        },
        async addEntrada(){
            this.form.id_partit = this.selectedId;
            this.form.id_user = usePage().props.auth.user.id;
            this.form.post(route('entrades.store'));
        }
    }, created() {
        this.selectedId = localStorage.getItem('selectedId');
        this.partitsentrada();

    },
}
</script>

<template>
    <Head title="Entrades"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="container text-center mt-5" v-for="partit in partitsjornada" :key="partit.id">
                        <form @submit.prevent="addEntrada">

                            <div class="mt-3">
                                Jornada: {{partit.id_jornada}}
                            </div>

                            <div class="row">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <img :src="'../images/'+partit.logo_equip_local" alt="partit.logo_equip_local" style="width:35%;">
                                </div>
                                <div class="col-5">
                                    {{partit.data}}
                                </div>
                                <div class="col d-flex justify-content-center align-items-center">
                                    <img :src="'../images/'+partit.logo_equip_visitant" alt="partit.logo_equip_visitant" style="width:35%;">
                                </div>
                            </div>

                            <div class="mt-3 mb-3">
                                <button type="submit" class="btn btn-warning" name="addEntrada">Compra Entrades</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
