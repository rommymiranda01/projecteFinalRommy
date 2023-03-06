<template>
    <Head title="NewTeam"/>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Team</h2>
        </template>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    name: "EditTeam",
    components: {AuthenticatedLayout}
}
</script>

<style scoped>

</style>
