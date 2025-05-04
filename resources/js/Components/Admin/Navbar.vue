<script setup></script>

<template>
    <header class="bg-white dark:bg-gray-800 shadow-sm z-10">
        <div
            class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700"
        >
            <div class="flex items-center">
                <button
                    id="sidebar-toggle"
                    class="mr-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200"
                >
                    <!-- <i data-feather="menu"></i> -->
                    <!-- HeroIcon for menu bars-3-->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                        class="size-6"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </button>

                <div class="relative w-64">
                    <input
                        type="search"
                        placeholder="Search..."
                        class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                    />
                    <div
                        class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                    >
                        <i
                            data-feather="search"
                            class="text-gray-400 dark:text-gray-500"
                        ></i>
                    </div>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <!-- <div class="relative">
                <button
                  id="theme-toggle"
                  class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200"
                >
                  <i data-feather="moon" class="hidden dark:block"></i>
                  <i data-feather="sun" class="dark:hidden"></i>
                </button>
              </div> -->
                <!-- **************** -->
                <div class="relative">
                    <button
                        id="notificationBtn"
                        class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 relative focus:outline-none"
                    >
                        <i data-feather="bell" class="w-5 h-5"></i>
                        <span
                            class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center animate-pulse"
                            >3</span
                        >
                    </button>

                    <!-- Notification Dropdown -->
                    <div
                        id="notificationDropdown"
                        class="hidden absolute right-0 mt-[15px] w-80 bg-white dark:bg-gray-800 rounded-md shadow-lg z-20 border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700 transform origin-top-right transition-all duration-200 scale-95 opacity-0"
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
                                        John Doe
                                    </p>
                                    <p
                                        class="text-sm text-gray-500 dark:text-gray-400"
                                    >
                                        Commented on your post
                                    </p>
                                    <p
                                        class="text-xs text-gray-400 dark:text-gray-500 mt-1"
                                    >
                                        2 minutes ago
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
                                        <i
                                            data-feather="users"
                                            class="w-5 h-5 text-indigo-600 dark:text-indigo-400"
                                        ></i>
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
                                        <i
                                            data-feather="check-circle"
                                            class="w-5 h-5 text-green-600 dark:text-green-400"
                                        ></i>
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
                </div>
                <!-- **************** -->
                <div class="relative">
                    <button
                        id="profileBtn"
                        class="flex items-center space-x-1 focus:outline-none mr-3"
                    >
                        <div class="flex items-center space-x-2">
                            <img
                                src="https://randomuser.me/api/portraits/men/44.jpg"
                                alt="User"
                                class="w-10 h-10 rounded-full border-2 border-white shadow-sm"
                            />
                            <div class="text-left hidden md:block">
                                <p
                                    class="text-sm font-medium text-gray-800 dark:text-white"
                                >
                                    Sarah Johnson
                                </p>
                            </div>
                        </div>
                        <i
                            id="profileChevron"
                            data-feather="chevron-down"
                            class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform duration-200"
                        ></i>
                    </button>

                    <!-- Profile Dropdown Content -->
                    <div
                        id="profileDropdown"
                        class="hidden absolute right-0 mt-[15px] mr-3 w-56 bg-white dark:bg-gray-800 rounded-md shadow-sm z-10 border border-gray-200 dark:border-gray-700"
                    >
                        <div
                            class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center space-x-3"
                        >
                            <img
                                src="https://randomuser.me/api/portraits/men/44.jpg"
                                alt="User"
                                class="w-11 h-11 rounded-full border-2 border-white shadow-sm"
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
                                <i
                                    data-feather="user"
                                    class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                ></i>
                                Profile
                            </a>
                            <a
                                href="#"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <i
                                    data-feather="settings"
                                    class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                ></i>
                                Settings
                            </a>
                            <a
                                href="#"
                                class="flex items-center px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700"
                            >
                                <i
                                    data-feather="activity"
                                    class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                ></i>
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
                                <i
                                    data-feather="log-out"
                                    class="w-4 h-4 mr-3 text-gray-500 dark:text-gray-400"
                                ></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<style scoped></style>
