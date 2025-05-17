<script setup>
import FeaturedVehicles from "../../Components/Customer/FeaturedVehicles.vue";
import Hero from "../../Components/Customer/Hero.vue";
import UserLayout from "../../Components/Customer/Layout/UserLayout.vue";
</script>

<template>
    <UserLayout>
        <Hero />
        <FeaturedVehicles :cars="$page.props.cars" />
    </UserLayout>
</template>

<style scoped></style>
