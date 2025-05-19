<script setup>
import CustomerContent from "../../Components/Admin/CustomerContent.vue";
import Layout from "../../Components/Layout/Layout.vue";

defineProps({
    customers: Array,
});
</script>

<template>
    <Layout>
        <CustomerContent :customers="customers" />
    </Layout>
</template>

<style scoped></style>
