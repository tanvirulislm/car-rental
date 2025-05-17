<script setup>
import RentalContent from "../../Components/Admin/RentalContent.vue";
import Layout from "../../Components/Layout/Layout.vue";
defineProps({
    car: Array,
});
</script>

<template>
    <Layout>
        <RentalContent />
    </Layout>
</template>

<style scoped></style>
