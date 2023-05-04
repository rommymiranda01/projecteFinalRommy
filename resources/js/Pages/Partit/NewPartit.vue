<template>
    <Head title="NewMatch"/>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form New Match</h2>
                        <form @submit.prevent="submit">

                            <div>
                                <InputLabel for="jornada" value="Id Jornada"/>
                                <select name="id_jornada" id="id_jornada" v-model="form.id_jornada">
                                    <option selected disabled hidden value=""></option>
                                    <option v-for="t in jornades" :value="t.id">{{t.id}}</option>
                                </select>
                            </div>

                            <div>
                                <InputLabel for="equip_local" value="Equip Local"/>
                                <select name="id_equip_local" id="id_equip_local" v-model="form.id_equip_local">
                                    <option selected disabled hidden value=""></option>
                                    <option v-for="t in equips" :value="t.id">{{t.nom_equip}}</option>
                                </select>
                            </div>

                            <div>
                                <InputLabel for="equip_visitant" value="Equip Visitant"/>
                                <select name="id_equip_visitant" id="id_equip_visitant" v-model="form.id_equip_visitant">
                                    <option selected disabled hidden value=""></option>
                                    <option v-for="t in equips" :value="t.id">{{t.nom_equip}}</option>
                                </select>
                            </div>

                            <div class="flex items-center gap-4">
                                <PrimaryButton>Save</PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import TextInput from "@/Components/TextInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {Head, useForm, usePage} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";

export default {
    name: "NewPartit",
    components: {InputLabel, AuthenticatedLayout, Head, PrimaryButton, TextInput},
    data() {
        const partit= usePage().props.auth.user;
        return {
            jornades: [],
            equips: [],
            form: useForm({
                id_jornada: partit.id_jornada,
                id_equip_local: partit.id_equip_local,
                id_equip_visitant: partit.id_equip_visitant,
            }),
        };
    },
    created() {
        this.list();
        this.liste()
    },
    methods: {
        async list() {
            axios.get('/jornades').then(res => {
                this.jornades = res.data;
            })
        },
        async liste() {
            axios.get('/teams').then(res => {
                this.equips = res.data;
            })
        },
        async submit(){
            this.form.post(route('partits.store'));
        }
    }
}
</script>

<style scoped>

</style>
