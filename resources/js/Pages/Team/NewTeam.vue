<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from '@inertiajs/vue3';

// export default {
//     name: "NewTeam",
//     components: {AuthenticatedLayout}
// }
</script>

<template>
    <Head title="NewTeam"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Hello World</h2>
        </template>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
