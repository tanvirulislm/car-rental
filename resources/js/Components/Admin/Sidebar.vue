<script setup></script>

<template>
    <div
        class="sidebar bg-white dark:bg-gray-800 text-gray-800 dark:text-white w-64 flex-shrink-0 border-r border-gray-200 dark:border-gray-700 flex flex-col"
    >
        <!-- Logo Bar -->
        <div
            class="flex items-center justify-between p-4 border-gray-200 dark:border-gray-700"
        >
            <div class="flex items-center">
                <div
                    class="w-8 h-8 bg-indigo-600 dark:bg-indigo-700 rounded-full flex items-center justify-center text-white"
                >
                    <i data-feather="box"></i>
                </div>
                <span class="logo-text ml-3 font-semibold text-lg"
                    >AdminPro</span
                >
            </div>
        </div>
        <!-- Sidebar Menu -->
        <div class="flex-1 overflow-y-auto">
            <nav class="p-4">
                <div class="mb-6">
                    <!-- <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-4">MAIN</p> -->
                    <ul>
                        <li class="mb-2">
                            <a
                                href="#"
                                class="flex items-center p-2 text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-gray-700 rounded-lg"
                            >
                                <i data-feather="home" class="w-5 h-5"></i>
                                <span class="nav-text ml-3">Dashboard</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a
                                href="tables.html"
                                class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"
                            >
                                <i data-feather="table" class="w-5 h-5"></i>
                                <span class="nav-text ml-3">Tables</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a
                                href="#"
                                class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"
                            >
                                <i data-feather="settings" class="w-5 h-5"></i>
                                <span class="nav-text ml-3">Settings</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a
                                href="alerts.html"
                                class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"
                            >
                                <i
                                    data-feather="alert-circle"
                                    class="w-5 h-5"
                                ></i>
                                <span class="nav-text ml-3">Alerts</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a
                                href="forms.html"
                                class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"
                            >
                                <i data-feather="edit" class="w-5 h-5"></i>
                                <span class="nav-text ml-3">Forms</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a
                                href="#"
                                class="flex items-center p-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg"
                            >
                                <i data-feather="grid" class="w-5 h-5"></i>
                                <span class="nav-text ml-3">Cards</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</template>

<style scoped></style>
