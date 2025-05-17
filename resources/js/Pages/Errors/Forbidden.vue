<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="flex flex-col items-center justify-center h-screen text-center">
        <h1 class="text-6xl font-bold text-red-600 mb-4">403</h1>
        <p class="text-xl mb-6">
            Oops! You don’t have permission to access this page.
        </p>
        <Link href="/" class="text-blue-600 hover:underline">Go to Home</Link>
    </div>
</template>

<style scoped></style>
