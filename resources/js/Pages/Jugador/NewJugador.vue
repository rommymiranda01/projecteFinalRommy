<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm, usePage} from '@inertiajs/vue3';

export default {
    components: {AuthenticatedLayout, Head, InputLabel, PrimaryButton, TextInput},
    data() {
        const jugador= usePage().props.auth.user;
        return {
            teams: [],
            form: useForm({
                nom: jugador.nom,
                cognom: jugador.cognom,
                dorsal: jugador.dorsal,
                data_naixement: jugador.data_naixement,
                posicio: jugador.posicio,
                foto: jugador.foto,
                id_team: jugador.id_team,
            }),
        };
    },
    created() {
        this.list();
    },
    methods: {
        async list() {
            axios.get('/teams').then(res => {
                this.teams = res.data;
                //console.log(res)
            })
        },
        async onChange(event){
            this.form.foto = event.target.files[0];
            console.log(this.form.foto)
        },
        async submit(){
            this.form.post(route('jugadors.store'));
            // console.log(this.form.id_team)
        }
    }
}
// const jugador = usePage().props.auth.user;
//
// const form = useForm({
//     nom: jugador.nom,
//     cognom: jugador.cognom,
//     dorsal: jugador.dorsal,
//     data_naixement: jugador.data_naixement,
//     posicio: jugador.posicio,
//     foto: jugador.foto,
//     id_team: jugador.id_team,
// });
//
//
// const submit = () => {
//     form.post(route('jugadors.store'));
// }
//
// const onChange=(event)=>{
//     form.foto = event.target.files[0];
//     console.log(form.foto)
// }

</script>
<template>
    <Head title="NewJugador"/>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form New Player</h2>
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="nom" value="FirstName"/>

                                <TextInput
                                    id="nom"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.nom"
                                    required
                                    autofocus
                                    autocomplete="nom"
                                />
                            </div>

                            <div>
                                <InputLabel for="cognom" value="LastName"/>

                                <TextInput
                                    id="cognom"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.cognom"
                                    required
                                    autofocus
                                    autocomplete="cognom"
                                />
                            </div>

                            <div>
                                <InputLabel for="dorsal" value="Dorsal"/>
                                <select name="dorsal" id="dorsal" v-model="form.dorsal">

                                    <option selected disabled hidden value=""></option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>

                                </select>
                            </div>

                            <div>
                                <InputLabel for="data_naixement" value="BirthDate"/>

                                <TextInput
                                    id="data_naixement"
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.data_naixement"
                                    required
                                    autofocus
                                    autocomplete="data_naixement"
                                />
                            </div>

                            <div>
                                <InputLabel for="posicio" value="Position"/>

                                <select name="posicio" id="posicio" v-model="form.posicio">

                                    <option selected disabled hidden value=""></option>
                                    <option>POR</option>
                                    <option>LD</option>
                                    <option>DFC</option>
                                    <option>DFC</option>
                                    <option>LI</option>
                                    <option>MC</option>
                                    <option>MCD</option>
                                    <option>MC</option>
                                    <option>ED</option>
                                    <option>DC</option>
                                    <option>EI</option>

                                </select>
                            </div>

                            <div>
                                <InputLabel for="foto" value="Photo"/>
                                <input type="file" id="foto" name="foto" v-on:change="onChange"
                                       accept="image/*" class="input-file">
                            </div>

                            <div>
                                <InputLabel for="team" value="Teams"/>
                                <select name="id_team" id="id_team" v-model="form.id_team">
                                    <option selected disabled hidden value=""></option>
                                    <option v-for="t in teams" :value="t.id">{{t.nom_equip}}</option>
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

<style scoped>

</style>
