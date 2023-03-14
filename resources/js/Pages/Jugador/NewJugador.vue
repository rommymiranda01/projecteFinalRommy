<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm, usePage} from '@inertiajs/vue3';
// export default {
//     name: "NewJugador"
// }
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
                                <InputLabel for="nom" value="FirstName" />

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
                                <InputLabel for="cognom" value="LastName" />

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
                                <InputLabel for="dorsal" value="Dorsal" />

                                <TextInput
                                    id="dorsal"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.dorsal"
                                    required
                                    autofocus
                                    autocomplete="dorsal"
                                />
                            </div>

                            <div>
                                <InputLabel for="data_naixement" value="BirthDate" />

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
                                <InputLabel for="posicio" value="Position" />

                                <TextInput
                                    id="posicio"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.posicio"
                                    required
                                    autofocus
                                    autocomplete="posicio"
                                />
                            </div>

                            <div>
                                <InputLabel for="foto" value="Foto" />
                                <TextInput
                                    id="foto"
                                    type="file"
                                    class="mt-1 block w-full"
                                    v-model="form.foto"
                                    required
                                    autocomplete=""
                                    @change="onChange"
                                />
                            </div>


                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
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
