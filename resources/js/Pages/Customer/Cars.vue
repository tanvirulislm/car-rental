<script setup>
import AllCars from "../../Components/Customer/AllCars.vue";
import UserLayout from "../../Components/Customer/Layout/UserLayout.vue";
</script>

<template>
    <UserLayout>
        <AllCars :cars="$page.props.cars" />
    </UserLayout>
</template>

<style scoped></style>
