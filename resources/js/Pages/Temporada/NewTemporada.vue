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
                                <InputLabel for="any_temporada" value="Any Temporada" />

                                <TextInput
                                    id="anyTemporada"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.any_temporada"
                                    required
                                    autofocus
                                    autocomplete="any_temporada"
                                />

                                <!--                                <InputError class="mt-2" :message="form.errors.name" />-->
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

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm, usePage} from '@inertiajs/vue3';

// export default {
//     name: "NewTemporada"
// }

const temporada = usePage().props.auth.user;

const form = useForm({
    any_temporada: temporada.any_temporada,
});

const submit = () => {
    form.post(route('temporada.store'));
}
</script>

<style scoped>

</style>
