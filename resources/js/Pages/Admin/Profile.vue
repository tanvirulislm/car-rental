<script setup>
import Layout from "../../Components/Layout/Layout.vue";
import { Link } from "@inertiajs/vue3";
defineProps({
    user: Object,
});
</script>

<template>
    <Layout>
        <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-900">
            <!-- Breadcrumb and Page Title -->
            <div class="flex justify-between items-center mb-6">
                <h2
                    class="text-2xl font-semibold text-gray-800 dark:text-white"
                >
                    Profile Overview
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
                                <ChevronRightIcon
                                    class="w-4 h-4 text-gray-400"
                                />
                                <span
                                    class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400"
                                    >Profile</span
                                >
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            <div
                class="mx-auto p-6 bg-white dark:bg-gray-800 rounded-2xl shadow-lg"
            >
                <!-- Profile Header -->
                <div
                    class="flex flex-col md:flex-row items-start md:items-center gap-6 pb-6 border-b border-gray-200 dark:border-gray-700"
                >
                    <!-- Avatar -->
                    <div class="relative group">
                        <img
                            src="https://static.vecteezy.com/system/resources/previews/021/548/095/non_2x/default-profile-picture-avatar-user-avatar-icon-person-icon-head-icon-profile-picture-icons-default-anonymous-user-male-and-female-businessman-photo-placeholder-social-network-avatar-portrait-free-vector.jpg"
                            alt="Profile"
                            class="w-24 h-24 rounded-full border-4 border-white dark:border-gray-800 shadow-lg"
                        />
                        <button
                            class="absolute bottom-0 right-0 bg-indigo-600 text-white p-2 rounded-full shadow-md hover:bg-indigo-700 transition-transform hover:scale-110"
                        >
                            <!-- <i data-feather="camera" class="w-4 h-4"></i> -->
                            <CameraIcon class="w-4 h-4" />
                        </button>
                    </div>

                    <!-- User Info -->
                    <div class="flex-1">
                        <div
                            class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4"
                        >
                            <div>
                                <h1
                                    class="text-2xl font-bold text-gray-800 dark:text-white"
                                >
                                    {{ user.name }}
                                </h1>
                                <p class="text-gray-600 dark:text-gray-300">
                                    {{
                                        user.job_title ||
                                        user.role ||
                                        "Role not specified"
                                    }}
                                </p>
                            </div>
                            <div class="flex gap-2">
                                <button
                                    class="px-3 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 flex items-center gap-2"
                                >
                                    <PencilSquareIcon class="w-6 h-6" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="grid gap-6 pt-6">
                    <!-- About Section -->
                    <div class="">
                        <h2
                            class="text-xl font-semibold text-gray-800 dark:text-white mb-4"
                        >
                            About
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-6">
                            Passionate UX designer with 5+ years of experience
                            creating intuitive digital experiences. Love working
                            with design systems and accessibility. Coffee
                            enthusiast and dog lover.
                        </p>

                        <!-- Details Grid -->
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg"
                                >
                                    <EnvelopeIcon
                                        class="w-5 h-5 text-gray-600 dark:text-gray-300"
                                    />
                                </div>
                                <div>
                                    <p
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        Email
                                    </p>
                                    <p class="text-gray-800 dark:text-white">
                                        {{ user.email }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg"
                                >
                                    <PhoneIcon
                                        class="w-5 h-5 text-gray-600 dark:text-gray-300"
                                    />
                                </div>
                                <div>
                                    <p
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        Phone
                                    </p>
                                    <p class="text-gray-800 dark:text-white">
                                        +1 (555) 123-4567
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg"
                                >
                                    <MapPinIcon
                                        class="w-5 h-5 text-gray-600 dark:text-gray-300"
                                    />
                                </div>
                                <div>
                                    <p
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        Location
                                    </p>
                                    <p class="text-gray-800 dark:text-white">
                                        San Francisco, CA
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg"
                                >
                                    <BriefcaseIcon
                                        class="w-5 h-5 text-gray-600 dark:text-gray-300"
                                    />
                                </div>
                                <div>
                                    <p
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        Position
                                    </p>
                                    <p class="text-gray-800 dark:text-white">
                                        Senior UX Designer
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </Layout>
</template>

<style scoped></style>
