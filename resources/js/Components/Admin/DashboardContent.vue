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
                        <a
                            href="#"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-400 dark:hover:text-white"
                        >
                            <HomeIcon class="w-4 h-4 mr-2" />
                            Home
                        </a>
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
                            New Users
                        </p>
                        <h3
                            class="text-2xl font-bold text-gray-800 dark:text-white mt-1"
                        >
                            1,254
                        </h3>
                        <div
                            class="mt-3 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2"
                        >
                            <div
                                class="bg-blue-600 h-2 rounded-full"
                                style="width: 72%"
                            ></div>
                        </div>
                        <p
                            class="text-xs text-gray-500 dark:text-gray-400 mt-1"
                        >
                            72% of target
                        </p>
                    </div>
                    <div
                        class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300"
                    >
                        <UsersIcon class="w-6 h-6" />
                    </div>
                </div>
            </div>

            <!-- Card 2 with sparkline chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p
                            class="text-sm font-medium text-gray-500 dark:text-gray-400"
                        >
                            Revenue
                        </p>
                        <h3
                            class="text-2xl font-bold text-gray-800 dark:text-white mt-1"
                        >
                            $34,543
                        </h3>
                        <div class="mt-3 h-10 w-full">
                            <!-- Simple sparkline chart (would be replaced with actual chart library e.g., Chart.js, ApexCharts) -->
                            <svg viewBox="0 0 100 30" class="w-full h-full">
                                <polyline
                                    points="0,20 20,10 40,15 60,5 80,15 100,10"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    class="text-green-500"
                                />
                            </svg>
                        </div>
                    </div>
                    <div
                        class="p-3 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300"
                    >
                        <CurrencyDollarIcon class="w-6 h-6" />
                        <!-- Replaced dollar-sign -->
                    </div>
                </div>
            </div>

            <!-- Card 3 with comparison -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p
                            class="text-sm font-medium text-gray-500 dark:text-gray-400"
                        >
                            Conversion
                        </p>
                        <h3
                            class="text-2xl font-bold text-gray-800 dark:text-white mt-1"
                        >
                            3.2%
                        </h3>
                        <div class="mt-2 flex items-center space-x-4">
                            <div>
                                <p
                                    class="text-xs text-gray-500 dark:text-gray-400"
                                >
                                    This Month
                                </p>
                                <p class="text-sm font-medium text-green-500">
                                    +1.2%
                                </p>
                            </div>
                            <div>
                                <p
                                    class="text-xs text-gray-500 dark:text-gray-400"
                                >
                                    Last Month
                                </p>
                                <p
                                    class="text-sm font-medium text-gray-800 dark:text-white"
                                >
                                    2.0%
                                </p>
                                <!-- Adjusted dark text color -->
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-3 rounded-full bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300"
                    >
                        <ArrowTrendingUpIcon class="w-6 h-6" />
                        <!-- Replaced trending-up -->
                    </div>
                </div>
            </div>

            <!-- Card 4 with icon list -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p
                            class="text-sm font-medium text-gray-500 dark:text-gray-400"
                        >
                            Active Tasks
                        </p>
                        <h3
                            class="text-2xl font-bold text-gray-800 dark:text-white mt-1"
                        >
                            18
                        </h3>
                        <div class="mt-3 flex space-x-2">
                            <div
                                class="p-1 rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300"
                            >
                                <ExclamationCircleIcon class="w-4 h-4" />
                                <!-- Replaced alert-circle -->
                            </div>
                            <div
                                class="p-1 rounded-full bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300"
                            >
                                <ExclamationTriangleIcon class="w-4 h-4" />
                                <!-- Replaced alert-triangle -->
                            </div>
                            <div
                                class="p-1 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300"
                            >
                                <CheckIcon class="w-4 h-4" />
                                <!-- Replaced check -->
                            </div>
                        </div>
                    </div>
                    <div
                        class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-300"
                    >
                        <CheckCircleIcon class="w-6 h-6" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity & Top Products -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Activity -->
            <div
                class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 lg:col-span-2"
            >
                <h3
                    class="text-lg font-semibold text-gray-800 dark:text-white mb-4"
                >
                    Recent Activity
                </h3>
                <div class="space-y-4">
                    <!-- Activity Item 1 -->
                    <div class="flex">
                        <div class="flex-shrink-0 mr-3">
                            <div
                                class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center text-blue-600 dark:text-blue-300"
                            >
                                <UserPlusIcon class="w-5 h-5" />
                            </div>
                        </div>
                        <div class="flex-1 pt-1">
                            <p
                                class="text-sm font-medium text-gray-800 dark:text-white"
                            >
                                New user registered
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Sarah Johnson joined the platform
                            </p>
                            <p
                                class="text-xs text-gray-400 dark:text-gray-500 mt-1"
                            >
                                2 minutes ago
                            </p>
                        </div>
                    </div>
                    <!-- Activity Item 2 -->
                    <div class="flex">
                        <div class="flex-shrink-0 mr-3">
                            <div
                                class="h-10 w-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center text-green-600 dark:text-green-300"
                            >
                                <CurrencyDollarIcon class="w-5 h-5" />
                                <!-- Replaced dollar-sign -->
                            </div>
                        </div>
                        <div class="flex-1 pt-1">
                            <p
                                class="text-sm font-medium text-gray-800 dark:text-white"
                            >
                                New order received
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Order #12345 for $129.99
                            </p>
                            <p
                                class="text-xs text-gray-400 dark:text-gray-500 mt-1"
                            >
                                15 minutes ago
                            </p>
                        </div>
                    </div>
                    <!-- More activity items... -->
                </div>
                <a
                    href="#"
                    class="mt-4 inline-flex items-center text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300"
                >
                    View all activity
                    <ChevronRightIcon class="w-4 h-4 ml-1" />
                </a>
            </div>

            <!-- Top Products -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h3
                    class="text-lg font-semibold text-gray-800 dark:text-white mb-4"
                >
                    Top Products
                </h3>
                <div class="space-y-4">
                    <!-- Product 1 -->
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 h-10 w-10 rounded-md bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-indigo-600 dark:text-indigo-300"
                        >
                            <CubeIcon class="w-5 h-5" />
                            <!-- Replaced box -->
                        </div>
                        <div class="ml-3 flex-1">
                            <p
                                class="text-sm font-medium text-gray-800 dark:text-white"
                            >
                                Premium Headphones
                            </p>
                            <div class="flex items-center justify-between">
                                <p
                                    class="text-sm text-gray-500 dark:text-gray-400"
                                >
                                    $199.99
                                </p>
                                <p class="text-xs font-medium text-green-500">
                                    +24%
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Product 2 -->
                    <div class="flex items-center">
                        <div
                            class="flex-shrink-0 h-10 w-10 rounded-md bg-green-100 dark:bg-green-900 flex items-center justify-center text-green-600 dark:text-green-300"
                        >
                            <ClockIcon class="w-5 h-5" />
                            <!-- Replaced watch -->
                        </div>
                        <div class="ml-3 flex-1">
                            <p
                                class="text-sm font-medium text-gray-800 dark:text-white"
                            >
                                Smart Watch
                            </p>
                            <div class="flex items-center justify-between">
                                <p
                                    class="text-sm text-gray-500 dark:text-gray-400"
                                >
                                    $249.99
                                </p>
                                <p class="text-xs font-medium text-green-500">
                                    +18%
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- More products... -->
                </div>
            </div>
        </div>
    </main>
</template>

<script setup></script>

<style scoped></style>
