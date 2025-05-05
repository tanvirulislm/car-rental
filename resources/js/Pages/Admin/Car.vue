<script setup>
import CarContent from "../../Components/Admin/CarContent.vue";
import Layout from "../../Components/Layout/Layout.vue";
defineProps({
    car: Array,
});
</script>

<template>
    <Layout>
        <CarContent :car="car" />
    </Layout>
</template>

<style scoped></style>
