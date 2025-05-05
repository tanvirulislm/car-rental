<template>
    <div
        :class="[
            'sidebar bg-white dark:bg-gray-800 text-gray-800 dark:text-white flex-shrink-0 border-r border-gray-200 dark:border-gray-700 flex flex-col transition-all duration-300 ease-in-out',
            isCollapsed ? 'w-[80px]' : 'w-64',
        ]"
    >
        <!-- Logo Bar -->
        <div
            class="flex items-center justify-between p-4 border-gray-200 dark:border-gray-700"
            :class="{ 'justify-center': isCollapsed }"
        >
            <div class="flex items-center">
                <div
                    class="w-8 h-8 bg-indigo-600 dark:bg-indigo-700 rounded-full flex items-center justify-center text-white flex-shrink-0"
                >
                    <CubeIcon class="w-5 h-5" />
                </div>
                <span
                    v-show="!isCollapsed"
                    class="logo-text ml-3 font-semibold text-lg"
                    >AdminPro</span
                >
            </div>
        </div>
        <!-- Sidebar Menu -->
        <div class="flex-1 overflow-y-auto">
            <nav class="p-4">
                <div class="mb-6">
                    <!-- <p v-show="!isCollapsed" class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-4">MAIN</p> -->
                    <ul>
                        <!-- <li class="mb-2">
                            <a
                                href="#"
                                class="flex items-center p-2 text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-gray-700 rounded-lg"
                                :class="{ 'justify-center': isCollapsed }"
                            >
                                <HomeIcon class="w-5 h-5 flex-shrink-0" />
                                <span
                                    v-show="!isCollapsed"
                                    class="nav-text ml-3"
                                    >Dashboard</span
                                >
                            </a>
                        </li> -->
                        <li class="mb-2">
                            <Link
                                href="/dashboard"
                                class="flex items-center p-2 rounded-lg transition-colors cursor-pointer"
                                :class="[
                                    isCollapsed ? 'justify-center' : '',
                                    $page.url === '/dashboard'
                                        ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-gray-700'
                                        : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700',
                                ]"
                            >
                                <HomeIcon class="w-5 h-5 flex-shrink-0" />
                                <span v-if="!isCollapsed" class="ml-3"
                                    >Dashboard</span
                                >
                            </Link>
                        </li>
                        <li class="mb-2">
                            <Link
                                href="/dashboard/cars"
                                class="flex items-center p-2 rounded-lg transition-colors cursor-pointer"
                                :class="[
                                    isCollapsed ? 'justify-center' : '',
                                    $page.url === '/dashboard/cars'
                                        ? 'text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-gray-700'
                                        : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700',
                                ]"
                            >
                                <TruckIcon class="w-5 h-5 flex-shrink-0" />
                                <span v-if="!isCollapsed" class="ml-3"
                                    >Cars</span
                                >
                            </Link>
                        </li>
                        <li class="mb-2">
                            <a
                                href="#"
                                class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"
                                :class="{ 'justify-center': isCollapsed }"
                            >
                                <Cog6ToothIcon class="w-5 h-5 flex-shrink-0" />
                                <!-- Replaced settings -->
                                <span
                                    v-show="!isCollapsed"
                                    class="nav-text ml-3"
                                    >Settings</span
                                >
                            </a>
                        </li>
                        <li class="mb-2">
                            <a
                                href="alerts.html"
                                class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"
                                :class="{ 'justify-center': isCollapsed }"
                            >
                                <ExclamationCircleIcon
                                    class="w-5 h-5 flex-shrink-0"
                                />
                                <!-- Replaced alert-circle -->
                                <span
                                    v-show="!isCollapsed"
                                    class="nav-text ml-3"
                                    >Alerts</span
                                >
                            </a>
                        </li>
                        <li class="mb-2">
                            <a
                                href="forms.html"
                                class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"
                                :class="{ 'justify-center': isCollapsed }"
                            >
                                <PencilSquareIcon
                                    class="w-5 h-5 flex-shrink-0"
                                />
                                <!-- Replaced edit -->
                                <span
                                    v-show="!isCollapsed"
                                    class="nav-text ml-3"
                                    >Forms</span
                                >
                            </a>
                        </li>
                        <!-- Add Cards link if needed -->
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</template>

<script setup>
import { TruckIcon } from "@heroicons/vue/24/outline";

import { Link } from "@inertiajs/vue3";

defineProps({
    isCollapsed: {
        type: Boolean,
        default: false,
    },
});
</script>

<style scoped>
.sidebar {
    transition: width 0.3s ease-in-out;
}
</style>
