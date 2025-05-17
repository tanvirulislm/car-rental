<script setup>
const props = defineProps({
    cars: Array,
});

import { Link } from "@inertiajs/vue3";

// Default image if car image is not available
const defaultCarImage =
    "https://images.unsplash.com/photo-1555215695-3004980ad54e?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80";
</script>

<template>
    <section class="py-12 pt-9 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    Choose Your Dream Car
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Discover a world of luxury and comfort with our exceptional
                    fleet
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Dynamic Car Cards Loop -->
                <div
                    v-for="car in cars"
                    :key="car.id"
                    class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 car-card"
                >
                    <!-- Image Section -->
                    <div class="relative h-52 bg-gray-100 overflow-hidden">
                        <img
                            :src="car.image || defaultCarImage"
                            :alt="car.name"
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                        />
                        <!-- Brand Badge -->
                        <div
                            class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-2 rounded shadow-sm"
                        >
                            <span class="font-bold text-gray-800 text-xs">{{
                                car.brand
                            }}</span>
                        </div>
                    </div>

                    <!-- Details Section -->
                    <div class="p-5">
                        <!-- Title and Year -->
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="text-xl font-bold text-gray-900">
                                {{ car.name }}
                            </h3>
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded"
                            >
                                {{ car.year }}
                            </span>
                        </div>

                        <!-- Car Type -->
                        <div class="mb-3">
                            <span
                                class="inline-block bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded"
                            >
                                {{ car.car_type }}
                            </span>
                        </div>

                        <!-- Features Grid -->
                        <div class="grid grid-cols-2 gap-2 mb-4">
                            <div class="flex items-center text-gray-600">
                                <TruckIcon class="h-4 w-4 mr-2 text-gray-500" />
                                <span class="text-sm">{{ car.model }}</span>
                            </div>
                        </div>

                        <!-- Price and CTA -->
                        <div
                            class="flex justify-between items-center pt-3 border-t border-gray-100"
                        >
                            <div>
                                <span class="text-1xl font-bold text-gray-900"
                                    >${{
                                        Math.floor(car.daily_rent_price)
                                    }}</span
                                >
                                <span class="text-gray-500 text-sm">
                                    / day</span
                                >
                            </div>
                            <Link
                                :href="`/car-details/${car.id}`"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-semibold transition-colors flex items-center"
                            >
                                <ArchiveBoxIcon class="h-4 w-4 mr-2" />

                                Book Now
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped></style>
