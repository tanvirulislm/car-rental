<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div
        class="hero-image h-auto bg-gray-50 md:h-96 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-16 md:py-0"
    >
        <div class="text-center px-4 w-full">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                Premium Car Rental Services
            </h1>
            <p class="text-lg sm:text-xl mb-8">
                Experience luxury and comfort with our exceptional fleet
            </p>
            <Link
                href="/all-cars"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition-colors"
            >
                Book your car
            </Link>
        </div>
    </div>
</template>

<style>
/* .hero-image {
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
        url("https://images.unsplash.com/photo-1503376780353-7e6692767b70?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80");
    background-size: cover;
    background-position: center;
} */

/* Smooth transition for mobile menu */
.mobile-menu {
    transition: all 0.3s ease;
}

.car-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.transition-all {
    transition: all 0.3s ease;
}
</style>
