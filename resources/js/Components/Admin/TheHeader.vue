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
                                <Link
                                    href="/profile"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                                >
                                    <UserIcon
                                        class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                    />
                                    Profile
                                </Link>
                                <!-- <a
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
                                </a> -->
                            </div>
                            <div
                                class="py-1 border-t border-gray-200 dark:border-gray-700"
                            >
                                <Link
                                    href="/logout"
                                    class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                                >
                                    <ArrowLeftOnRectangleIcon
                                        class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                    />
                                    <!-- Replaced log-out -->
                                    Logout
                                </Link>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
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
        isProfileOpen.value = false;
    }
};

const toggleProfileDropdown = () => {
    isProfileOpen.value = !isProfileOpen.value;
    if (isProfileOpen.value) {
        isNotificationOpen.value = false;
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
