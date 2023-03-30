<template>
    <Head title="NewJornada"/>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form New Player</h2>
                        <form @submit.prevent="submit">

                            <div>
                                <InputLabel for="temporada" value="Temporades"/>
                                <select name="id_temporada" id="id_temporada" v-model="form.id_temporada">
                                    <option selected disabled hidden value=""></option>
                                    <option v-for="t in temporades" :value="t.id">{{t.any_temporada}}</option>
                                </select>
                            </div>

                            <div>
                                <InputLabel for="data_jornada" value="Match day"/>
                                <TextInput
                                    id="data_jornada"
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.data_jornada"
                                    required
                                    autofocus
                                    autocomplete="data_jornada"
                                />
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
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, useForm, usePage} from '@inertiajs/vue3';
import temporades from "@/Pages/Temporada/Temporades.vue";
export default {
    computed: {
        temporades() {
            return temporades
        }
    },
    components: {AuthenticatedLayout, Head, InputLabel, PrimaryButton, TextInput},
    name: "NewJornada",
    data() {
        const jornada= usePage().props.auth.user;
        return {
            temporades: [],
            form: useForm({
                id_temporada: jornada.id_temporada,
                data_jornada: jornada.data_jornada,
            }),
        };
    },
    created() {
        this.list();
    },
    methods: {
        async list() {
            axios.get('/temporades').then(res => {
                this.temporades = res.data;
            })
        },
        async submit(){
            this.form.post(route('jornades.store'));
        }
    }

}
</script>

<style scoped>

</style>
