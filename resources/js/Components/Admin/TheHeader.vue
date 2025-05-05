<template>
    <header class="bg-white dark:bg-gray-800 shadow-sm z-10">
        <div
            class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700"
        >
            <div class="flex items-center">
                <button
                    @click="$emit('toggleSidebar')"
                    class="mr-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none"
                >
                    <Bars3Icon class="w-6 h-6" />
                </button>

                <div class="relative w-64">
                    <input
                        type="search"
                        placeholder="Search..."
                        class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    />
                    <div
                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                    >
                        <MagnifyingGlassIcon
                            class="w-5 h-5 text-gray-400 dark:text-gray-500"
                        />
                        <!-- Replaced search -->
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Dark Mode Toggle (Optional, example using VueUse) -->
                <!--
                <button @click="toggleDark()" class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                    <MoonIcon v-if="isDark" class="w-5 h-5" />
                    <SunIcon v-else class="w-5 h-5" />
                </button>
                -->

                <!-- Notification Dropdown -->
                <div class="relative" ref="notificationDropdownContainer">
                    <button
                        @click="toggleNotificationDropdown"
                        class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 relative focus:outline-none"
                    >
                        <BellIcon class="w-5 h-5" />
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center animate-pulse"
                            >3</span
                        >
                    </button>

                    <!-- Notification Dropdown Content -->
                    <transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="transform opacity-0 scale-95"
                        enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-75"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95"
                    >
                        <div
                            v-show="isNotificationOpen"
                            class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 rounded-md shadow-lg z-20 border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700 origin-top-right"
                        >
                            <div
                                class="px-4 py-3 flex items-center justify-between border-b border-gray-200 dark:border-gray-700"
                            >
                                <h3
                                    class="font-medium text-gray-900 dark:text-white"
                                >
                                    Notifications
                                </h3>
                                <button
                                    class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300"
                                >
                                    Mark all as read
                                </button>
                            </div>

                            <div class="max-h-96 overflow-y-auto">
                                <!-- Notification Item 1 -->
                                <a
                                    href="#"
                                    class="flex px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700"
                                >
                                    <div class="flex-shrink-0">
                                        <img
                                            class="h-10 w-10 rounded-full"
                                            src="https://randomuser.me/api/portraits/men/32.jpg"
                                            alt="User"
                                        />
                                    </div>
                                    <div class="ml-3">
                                        <p
                                            class="text-sm font-medium text-gray-900 dark:text-white"
                                        >
                                            Jane Doe
                                        </p>
                                        <p
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                        >
                                            Rent a Audi A6
                                        </p>
                                        <p
                                            class="text-xs text-gray-400 dark:text-gray-500 mt-1"
                                        >
                                            9 minutes ago
                                        </p>
                                    </div>
                                </a>
                                <!-- Notification Item 2 -->
                                <a
                                    href="#"
                                    class="flex px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700"
                                >
                                    <div class="flex-shrink-0">
                                        <div
                                            class="h-10 w-10 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center"
                                        >
                                            <UsersIcon
                                                class="w-5 h-5 text-indigo-600 dark:text-indigo-400"
                                            />
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p
                                            class="text-sm font-medium text-gray-900 dark:text-white"
                                        >
                                            New followers
                                        </p>
                                        <p
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                        >
                                            5 new people followed you
                                        </p>
                                        <p
                                            class="text-xs text-gray-400 dark:text-gray-500 mt-1"
                                        >
                                            1 hour ago
                                        </p>
                                    </div>
                                </a>
                                <!-- Notification Item 3 -->
                                <a
                                    href="#"
                                    class="flex px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700"
                                >
                                    <div class="flex-shrink-0">
                                        <div
                                            class="h-10 w-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center"
                                        >
                                            <CheckCircleIcon
                                                class="w-5 h-5 text-green-600 dark:text-green-400"
                                            />
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <p
                                            class="text-sm font-medium text-gray-900 dark:text-white"
                                        >
                                            Order completed
                                        </p>
                                        <p
                                            class="text-sm text-gray-500 dark:text-gray-400"
                                        >
                                            Your order #12345 has been shipped
                                        </p>
                                        <p
                                            class="text-xs text-gray-400 dark:text-gray-500 mt-1"
                                        >
                                            3 hours ago
                                        </p>
                                    </div>
                                </a>
                            </div>

                            <div
                                class="px-4 py-2 text-center border-t border-gray-200 dark:border-gray-700"
                            >
                                <a
                                    href="#"
                                    class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300"
                                >
                                    View all notifications
                                </a>
                            </div>
                        </div>
                    </transition>
                </div>

                <!-- Profile Dropdown -->
                <div class="relative" ref="profileDropdownContainer">
                    <button
                        @click="toggleProfileDropdown"
                        class="flex items-center space-x-1 focus:outline-none mr-3"
                    >
                        <div class="flex items-center space-x-2">
                            <img
                                src="https://static.vecteezy.com/system/resources/previews/021/548/095/non_2x/default-profile-picture-avatar-user-avatar-icon-person-icon-head-icon-profile-picture-icons-default-anonymous-user-male-and-female-businessman-photo-placeholder-social-network-avatar-portrait-free-vector.jpg"
                                alt="User"
                                class="w-10 h-10 rounded-full border-2 border-white dark:border-gray-700 shadow-sm"
                            />
                            <div class="text-left hidden md:block">
                                <p
                                    class="text-sm font-medium text-gray-800 dark:text-white"
                                >
                                    Sarah Johnson
                                </p>
                            </div>
                        </div>
                        <ChevronDownIcon
                            :class="[
                                'w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-200',
                                { 'rotate-180': isProfileOpen },
                            ]"
                        />
                    </button>

                    <!-- Profile Dropdown Content -->
                    <transition
                        enter-active-class="transition ease-out duration-100"
                        enter-from-class="transform opacity-0 scale-95"
                        enter-to-class="transform opacity-100 scale-100"
                        leave-active-class="transition ease-in duration-75"
                        leave-from-class="transform opacity-100 scale-100"
                        leave-to-class="transform opacity-0 scale-95"
                    >
                        <div
                            v-show="isProfileOpen"
                            class="absolute right-0 mt-2 mr-3 w-56 bg-white dark:bg-gray-800 rounded-md shadow-lg z-10 border border-gray-200 dark:border-gray-700 origin-top-right"
                        >
                            <div
                                class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center space-x-3"
                            >
                                <img
                                    src="https://static.vecteezy.com/system/resources/previews/021/548/095/non_2x/default-profile-picture-avatar-user-avatar-icon-person-icon-head-icon-profile-picture-icons-default-anonymous-user-male-and-female-businessman-photo-placeholder-social-network-avatar-portrait-free-vector.jpg"
                                    alt="User"
                                    class="w-11 h-11 rounded-full border-2 border-white dark:border-gray-700 shadow-sm"
                                />
                                <div>
                                    <p
                                        class="font-medium text-gray-800 dark:text-white"
                                    >
                                        Sarah Johnson
                                    </p>
                                    <p
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        sarah@example.com
                                    </p>
                                </div>
                            </div>
                            <div class="py-1">
                                <a
                                    href="profile.html"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                                >
                                    <UserIcon
                                        class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                    />
                                    Profile
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                                >
                                    <Cog6ToothIcon
                                        class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                    />
                                    Settings
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                                >
                                    <SparklesIcon
                                        class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                    />
                                    Activity Log
                                </a>
                            </div>
                            <div
                                class="py-1 border-t border-gray-200 dark:border-gray-700"
                            >
                                <a
                                    href="#"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                                >
                                    <ArrowLeftOnRectangleIcon
                                        class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                    />
                                    <!-- Replaced log-out -->
                                    Logout
                                </a>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import {
    ArrowLeftOnRectangleIcon,
    Bars3Icon,
    BellIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    Cog6ToothIcon,
    MagnifyingGlassIcon,
    SparklesIcon,
    UserIcon,
    UsersIcon,
} from "@heroicons/vue/24/outline";
import { onBeforeUnmount, onMounted, ref } from "vue";
// Optional: If using VueUse for dark mode
// import { useDark, useToggle } from '@vueuse/core';
// const isDark = useDark();
// const toggleDark = useToggle(isDark);

defineEmits(["toggleSidebar"]);

const isNotificationOpen = ref(false);
const isProfileOpen = ref(false);
const notificationDropdownContainer = ref(null);
const profileDropdownContainer = ref(null);

const toggleNotificationDropdown = () => {
    isNotificationOpen.value = !isNotificationOpen.value;
    if (isNotificationOpen.value) {
        isProfileOpen.value = false; // Close other dropdown
    }
};

const toggleProfileDropdown = () => {
    isProfileOpen.value = !isProfileOpen.value;
    if (isProfileOpen.value) {
        isNotificationOpen.value = false; // Close other dropdown
    }
};

const closeDropdowns = (event) => {
    if (
        notificationDropdownContainer.value &&
        !notificationDropdownContainer.value.contains(event.target)
    ) {
        isNotificationOpen.value = false;
    }
    if (
        profileDropdownContainer.value &&
        !profileDropdownContainer.value.contains(event.target)
    ) {
        isProfileOpen.value = false;
    }
};

onMounted(() => {
    document.addEventListener("click", closeDropdowns);
});

onBeforeUnmount(() => {
    document.removeEventListener("click", closeDropdowns);
});
</script>
