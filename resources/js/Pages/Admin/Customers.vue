<script setup>
import CustomerList from "../../Components/Admin/CustomerList.vue";
import Layout from "../../Components/Layout/Layout.vue";

defineProps({
    customers: Array,
});
</script>

<template>
    <Layout>
        <CustomerList :customers="customers" />
    </Layout>
</template>

<style scoped></style>
