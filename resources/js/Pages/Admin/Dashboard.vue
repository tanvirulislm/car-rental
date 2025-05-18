<script setup>
import DashboardContent from "../../Components/Admin/DashboardContent.vue";
import Layout from "../../Components/Layout/Layout.vue";
defineProps({
    totalCars: Number,
    availableCars: Number,
    totalRentals: Number,
    totalEarnings: Number,
});
</script>

<template>
    <Layout>
        <DashboardContent
            :total-cars="totalCars"
            :available-cars="availableCars"
            :total-rentals="totalRentals"
            :total-earnings="totalEarnings"
        />
    </Layout>
</template>

<style scoped></style>
