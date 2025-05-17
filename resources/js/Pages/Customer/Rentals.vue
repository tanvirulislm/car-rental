<script setup>
import UserLayout from "../../Components/Customer/Layout/UserLayout.vue";
import RentalsContent from "../../Components/Customer/RentalsContent.vue";
</script>

<template>
    <UserLayout>
        <RentalsContent :rentals="$page.props.rentals" />
    </UserLayout>
</template>

<style scoped></style>
