<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <nav>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <Link href="/">
                    <img
                        src="../../../../public/logo.png"
                        alt="Rimberio"
                        class="h-10"
                    />
                </Link>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button
                        type="button"
                        class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-blue-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>

                        <Bars3Icon class="h-6 w-6" />
                        <!-- Close icon -->
                        <x-mark-icon class="h-6 w-6" />
                    </button>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:block">
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
            </div>
        </div>

        <!-- Mobile Navigation (hidden by default) -->
        <div class="mobile-menu hidden md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a
                    href="#"
                    class="text-gray-800 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium"
                    >Home</a
                >
                <Link
                    href="/all-cars"
                    class="text-gray-800 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium"
                    >Vehicles</Link
                >
                <a
                    href="#"
                    class="text-gray-800 hover:text-blue-600 block px-3 py-2 rounded-md text-base font-medium"
                    >My Bookings</a
                >
            </div>
            <div
                class="px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-200"
            >
                <Link
                    href="/login"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition-all mb-2"
                >
                    Login
                </Link>
                <Link
                    href="/registration"
                    class="w-full border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white px-4 py-2 rounded text-sm font-medium transition-all"
                >
                    Sign Up
                </Link>
            </div>
        </div>
    </nav>
</template>

<style scoped></style>
