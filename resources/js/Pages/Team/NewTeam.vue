<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm, usePage} from '@inertiajs/vue3';

// export default {
//     name: "NewTeam",
//     components: {AuthenticatedLayout}
// }

const team = usePage().props.auth.user;

const form = useForm({
    nom_equip: team.nom_equip,
    logo: team.logo,
});

const submit = () => {
    form.post(route('team.store'));
}
</script>

<template>
    <Head title="NewTeam"/>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form New Team</h2>
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="nom_equip" value="Name Team" />

                                <TextInput
                                    id="nameTeam"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.nom_equip"
                                    required
                                    autofocus
                                    autocomplete="nom_equip"
                                />

<!--                                <InputError class="mt-2" :message="form.errors.name" />-->
                            </div>

                            <div>
                                <InputLabel for="logo" value="Logo" />
                                <TextInput
                                    id="logo"
                                    type="file"
                                    class="mt-1 block w-full"
                                    v-model="form.logo"
                                    required
                                    autocomplete=""
                                    @change="onChange"
                                />
                            </div>


                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                                </Transition>
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
