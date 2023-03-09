<template>
    <Head title="Edit Temporada"/>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Form Edit Team</h2>
                        <form @submit.prevent="update">
                            <div>
                                <InputLabel for="any_temporada" value="Any Temporada" />

                                <TextInput
                                    id="anyTemporada"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="temporada.any_temporada"
                                    required
                                    autofocus
                                    autocomplete="any_temporada"
                                    model-value="form.any_temporada"
                                />

                                <!--                                <InputError class="mt-2" :message="form.errors.name" />-->
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
// export default {
//     name: "EditTemporada",
// }

export default {
    components: {TextInput, AuthenticatedLayout, InputLabel, PrimaryButton,Head},
    data(){
        return{
            temporada:{
                any_temporada:"",
            }
        }
    },
    mounted() {
        this.mostrarBlog()
    },
    methods:{
        async mostrarBlog(){
            console.log(this.route.params)
            //console.log(this.axios.get(`localhost/editTemporada/${this.$route.params.id}/edit`))
            // this.axios.get(`localhost/editTemporada/${this.$route.params.id}`)
            //     .then(response=>{
            //         const {any_temporada,} = response.data
            //         this.temporada.any_temporada = any_temporada
            //         console.log(response)
            //     })
            //     .catch(err=>{
            //         console.log(err)
            //     })
        },
        async update(){

        }
    }
}

// const temporada = usePage().props.auth.user;
//
// const form = useForm({
//     any_temporada: this.temporada.any_temporada,
// });
//
// console.log(form)

// const submit = () => {
//     form.post(route('temporada.store'));
// }
</script>

<style scoped>

</style>
