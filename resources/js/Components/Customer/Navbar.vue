<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <Link href="/">
                    <img
                        src="../../../../public/logo.png"
                        alt="Rimberio"
                        class="h-10"
                    />
                </Link>

                <!-- Desktop Navigation -->
                <div>
                    <div class="ml-10 flex items-center space-x-4">
                        <Link
                            href="/"
                            class="hover:text-blue-600 px-3 py-2 text-sm font-medium"
                            :class="
                                $page.url === '/'
                                    ? 'text-blue-600'
                                    : 'text-gray-800'
                            "
                            >Home</Link
                        >
                        <Link
                            href="/all-cars"
                            class="hover:text-blue-600 px-3 py-2 text-sm font-medium"
                            :class="
                                $page.url === '/all-cars'
                                    ? 'text-blue-600'
                                    : 'text-gray-800'
                            "
                            >Vehicles</Link
                        >
                        <Link
                            href="/my-rentals"
                            class="hover:text-blue-600 px-3 py-2 text-sm font-medium"
                            :class="
                                $page.url === '/my-rentals'
                                    ? 'text-blue-600'
                                    : 'text-gray-800'
                            "
                            >My Bookings</Link
                        >
                    </div>
                </div>

                <div class="hidden md:flex items-center">
                    <Link
                        href="/login"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition-all me-2"
                    >
                        Login
                    </Link>
                    <Link
                        href="/registration"
                        class="border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-sm font-medium transition-all"
                    >
                        Sign Up
                    </Link>
                </div>
                <!-- <div class="flex items-center">
                    <div class="relative">
                        <button
                            class="flex items-center space-x-2 focus:outline-none"
                        >
                            <div
                                class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center"
                            >
                                <span class="text-blue-600 font-medium"
                                    >JD</span
                                >
                            </div>
                            <span class="text-sm font-medium">John Doe</span>
                            <ChevronDownIcon class="h-5 w-5" />
                        </button>
                    </div>
                </div> -->
            </div>
        </div>
    </nav>
</template>

<style scoped></style>
