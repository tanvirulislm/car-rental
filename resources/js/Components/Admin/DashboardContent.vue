<template>
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-900">
        <!-- Breadcrumb and Page Title -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Dashboard Overview
            </h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <Link
                            href="/dashboard"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-white"
                        >
                            <HomeIcon class="w-4 h-4 mr-2" />
                            Home
                        </Link>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <ChevronRightIcon class="w-4 h-4 text-gray-400" />
                            <span
                                class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"
                                >Dashboard</span
                            >
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Stats Cards (Improved) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Card 1 with progress bar -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p
                            class="text-sm font-medium text-gray-500 dark:text-gray-400"
                        >
                            Total Cars
                        </p>
                        <h3
                            class="text-2xl font-bold text-gray-800 dark:text-white mt-1"
                        >
                            {{ totalCars }}
                        </h3>
                    </div>
                    <div
                        class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300"
                    >
                        <TruckIcon class="w-6 h-6" />
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p
                            class="text-sm font-medium text-gray-500 dark:text-gray-400"
                        >
                            Available Cars
                        </p>
                        <h3
                            class="text-2xl font-bold text-gray-800 dark:text-white mt-1"
                        >
                            {{ availableCars }}
                        </h3>
                    </div>
                    <div
                        class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300"
                    >
                        <CheckCircleIcon class="w-6 h-6" />
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p
                            class="text-sm font-medium text-gray-500 dark:text-gray-400"
                        >
                            Total Rentals
                        </p>
                        <h3
                            class="text-2xl font-bold text-gray-800 dark:text-white mt-1"
                        >
                            {{ totalRentals }}
                        </h3>
                    </div>
                    <div
                        class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300"
                    >
                        <ClipboardDocumentIcon class="w-6 h-6" />
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p
                            class="text-sm font-medium text-gray-500 dark:text-gray-400"
                        >
                            Total Earnings
                        </p>
                        <h3
                            class="text-2xl font-bold text-gray-800 dark:text-white mt-1"
                        >
                            {{ totalEarnings }}
                        </h3>
                    </div>
                    <div
                        class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300"
                    >
                        <CurrencyDollarIcon class="w-6 h-6" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
defineProps(["totalCars", "availableCars", "totalRentals", "totalEarnings"]);
import { defineProps } from "vue";
import { Link } from "@inertiajs/vue3";
</script>

<style scoped></style>
