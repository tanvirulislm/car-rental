<script setup>
import RentalContent from "../../Components/Admin/RentalContent.vue";
import Layout from "../../Components/Layout/Layout.vue";
defineProps(["rentals"]);
</script>

<template>
    <Layout>
        <RentalContent :rentals="rentals" />
    </Layout>
</template>

<style scoped></style>
