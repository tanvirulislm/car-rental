<template>
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Customer Management
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
                                >Customer Management</span
                            >
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="mb-6 flex justify-end">
            <button
                @click="openCreateModal"
                class="flex items-center text-sm font-medium px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:hover:bg-blue-500"
            >
                <PlusCircle />
                Add Customer
            </button>
        </div>

        <div
            v-if="showCreateModal"
            class="fixed inset-0 z-50 overflow-y-auto bg-gray-600 bg-opacity-75 transition-opacity"
            aria-labelledby="modal-title"
            role="dialog"
            aria-modal="true"
        >
            <div
                class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            >
                <div
                    class="fixed inset-0 transition-opacity"
                    aria-hidden="true"
                    @click="closeCreateModal"
                >
                    <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                </div>

                <span
                    class="hidden sm:inline-block sm:align-middle sm:h-screen"
                    aria-hidden="true"
                    >&#8203;</span
                >

                <div
                    class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
                >
                    <form @submit.prevent="submit">
                        <div
                            class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                        >
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full"
                                >
                                    <h3
                                        class="text-lg leading-6 font-medium text-gray-900 dark:text-white"
                                        id="modal-title"
                                    >
                                        Add New Customer
                                    </h3>
                                    <div
                                        class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4"
                                    >
                                        <div class="space-y-4">
                                            <div>
                                                <label
                                                    for="name"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                    >Name</label
                                                >
                                                <input
                                                    type="text"
                                                    id="name"
                                                    v-model="form.name"
                                                    placeholder="e.g. John Doe"
                                                    required
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                                />
                                            </div>
                                        </div>

                                        <div class="space-y-4">
                                            <div>
                                                <label
                                                    for="email"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                    >Email</label
                                                >
                                                <input
                                                    type="email"
                                                    id="email"
                                                    v-model="form.email"
                                                    required
                                                    placeholder="e.g. example@example.com"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse"
                        >
                            <button
                                type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm dark:hover:bg-blue-500"
                            >
                                Create Customer
                            </button>
                            <button
                                type="button"
                                @click="closeCreateModal"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <CustomerList :customers="customers" />
    </main>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import { createToaster } from "@meforma/vue-toaster";
import { ref } from "vue";
import PlusCircle from "../Svg/PlusCircle.vue";
import CustomerList from "./CustomerList.vue";
import HomeIcon from "@heroicons/vue/24/outline/HomeIcon";
import ChevronRightIcon from "@heroicons/vue/24/outline/ChevronRightIcon";

const props = defineProps({
    customers: Array,
});

const toaster = createToaster();

const form = useForm({
    name: "",
    email: "",
    role: "customer",
    password: "customer123",
});

function submit() {
    form.post("/CreateCustomer", {
        onSuccess: () => {
            toaster.success("Customer created successfully!");
            closeCreateModal();
            resetForm();
        },
        onError: (errors) => {
            if (errors.message) {
                toaster.error(errors.message);
            } else {
                toaster.error("Something went wrong!");
            }
        },
    });
}

const showCreateModal = ref(false);
const errors = ref({});

const openCreateModal = () => {
    showCreateModal.value = true;
};

const closeCreateModal = () => {
    showCreateModal.value = false;
    resetForm();
};

const resetForm = () => {
    form.reset();
    errors.value = {};
};
</script>

<style scoped></style>
