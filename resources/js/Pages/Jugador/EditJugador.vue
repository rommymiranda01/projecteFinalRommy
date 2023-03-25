<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm, usePage} from '@inertiajs/vue3';

/*export default {
    components: {AuthenticatedLayout, Head, InputLabel, PrimaryButton, TextInput},
}*/

// let teams = [];
const props = defineProps({
    jugador: Object,
});

// axios.get('/teams').then(res => {
//     teams = res.data;
//     console.log(teams)
// })

const form = useForm({
    nom: props.jugador.nom,
    cognom: props.jugador.cognom,
    dorsal: props.jugador.dorsal,
    data_naixement: props.jugador.data_naixement,
    posicio: props.jugador.posicio,
    foto: props.jugador.foto,
    id_team: props.jugador.id_team,
});

// const onChange=(event)=>{
//     form.foto = event.target.files[0];
// }

const update = () => {
    form.put(route('jugadors.update', props.jugador.id, {
        _method: 'put',
        nom: form.nom,
        cognom: form.cognom,
        dorsal: form.dorsal,
        data_naixement: form.data_naixement,
        posicio: form.posicio,
        foto: form.foto,
        id_team: form.id_team,
    }));
}

</script>
<template>
    <Head title="EditJugador"/>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form Edit Player</h2>
                        <form @submit.prevent="update">
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

<!--                            <div>-->
<!--                                <InputLabel for="foto" value="Photo"/>-->
<!--                                <input type="file" id="foto" name="foto" v-on:change="onChange"-->
<!--                                       accept="image/*" class="input-file">-->
<!--                            </div>-->

<!--                            <div>-->
<!--                                <InputLabel for="team" value="Teams"/>-->
<!--                                <select name="id_team" id="id_team" v-model="form.id_team">-->
<!--                                    <option v-for="t in teams" :value="t.id">{{t.nom_equip}}</option>-->
<!--                                </select>-->
<!--                            </div>-->


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
