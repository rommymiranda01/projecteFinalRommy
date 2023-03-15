<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm, usePage} from '@inertiajs/vue3';


const jugador = usePage().props.auth.user;

const form = useForm({
    nom: jugador.nom,
    cognom: jugador.cognom,
    dorsal: jugador.dorsal,
    data_naixement: jugador.data_naixement,
    posicio: jugador.posicio,
    foto: jugador.foto,
    id_team: jugador.id_team,
});


const submit = () => {
    form.post(route('jugadors.store'));
}

const onChange=(event)=>{
    jugador.foto = event.target.files[0];
    console.log(jugador.foto)
}
// export default {
//     name: "NewJugador",
//     components: {Head, AuthenticatedLayout, InputLabel, PrimaryButton, TextInput},
//     data() {
//         const jugador = usePage().props.auth.user;
//         //console.log(jugador)
//         const form = useForm({
//             nom: jugador.nom,
//             cognom: jugador.cognom,
//             dorsal: jugador.dorsal,
//             data_naixement: jugador.data_naixement,
//             posicio: jugador.posicio,
//             foto: jugador.foto,
//             id_team: jugador.id_team,
//         });
//         return {
//             nom: form.nom,
//             cognom: form.cognom,
//             dorsal: form.dorsal,
//             data_naixement: form.data_naixement,
//             posicio: form.posicio,
//             foto: form.foto,
//             id_team: form.id_team,
//         };
//     },
//     methods: {
//         onChange(event) {
//             this.foto = event.target.files[0];
//             //console.log(this.foto)
//         },
//         async submit(){
//             const formData = new FormData();
//             formData.append('foto', this.foto);
//             await axios.post('jugadors.store', formData, {
//                 headers: {
//                     'Content-Type': 'multipart/form-data',
//                 },
//             });
//         }
//     }
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
                                    v-model="nom"
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
                                    v-model="cognom"
                                    required
                                    autofocus
                                    autocomplete="cognom"
                                />
                            </div>

                            <div>
                                <InputLabel for="dorsal" value="Dorsal"/>
                                <select name="dorsal" id="dorsal" v-model="dorsal">

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
                                    v-model="data_naixement"
                                    required
                                    autofocus
                                    autocomplete="data_naixement"
                                />
                            </div>

                            <div>
                                <InputLabel for="posicio" value="Position"/>

                                <select name="posicio" id="posicio" v-model="posicio">

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
<!--                                <TextInput-->
<!--                                    id="foto"-->
<!--                                    type="file"-->
<!--                                    class="mt-1 block w-full"-->
<!--                                    v-model="foto"-->
<!--                                    required-->
<!--                                    autocomplete=""-->
<!--                                    @change="onChange"-->
<!--                                />-->
                            </div>

                            <div>
                                <InputLabel for="team" value="Teams"/>
                                <select name="id_team" id="id_team" v-model="id_team">
                                    <option selected disabled hidden value=""></option>
                                    <option>POR</option>
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
