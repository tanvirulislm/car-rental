<script setup>
import RentalContent from "../../Components/Admin/RentalContent.vue";
import Layout from "../../Components/Layout/Layout.vue";
defineProps(["rentals", "cars", "users"]);
</script>

<template>
    <Layout>
        <RentalContent :rentals="rentals" :cars="cars" :users="users" />
    </Layout>
</template>

<style scoped></style>
