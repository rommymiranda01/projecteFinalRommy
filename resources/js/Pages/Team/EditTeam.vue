<template>
    <Head title="EditTeam"/>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form New Team</h2>
                        <form @submit.prevent="update">
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

                            </div>

                            <div>
                                <InputLabel for="logo" value="Logo" />
                                <TextInput
                                    id="logo"
                                    type="file"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete=""
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

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm, usePage} from '@inertiajs/vue3';

// export default {
//     name: "EditTeam",
//     components: {AuthenticatedLayout}
// }

const props = defineProps({
    team: Object,
});

const form = useForm({
    nom_equip: props.team.nom_equip,
    logo: props.team.logo,
});

const update = () => {
    form.put(route('teams.update', props.team.id, {
        _method: 'put',
        nom_equip: form.nom_equip,
        logo: form.logo,
    }));
}
</script>

<style scoped>

</style>
