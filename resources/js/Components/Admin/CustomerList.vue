<template>
    <div>
        <div class="relative max-w-xs mb-2">
            <input
                v-model="searchTerm"
                type="text"
                placeholder="Search customers..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white dark:bg-gray-800 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
            <div
                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
            >
                <MagnifyingGlassIcon class="h-5 w-5 text-gray-400" />
            </div>
        </div>
        <EasyDataTable
            :headers="headers"
            :items="customers"
            buttons-pagination
            table-class-name="customize-table"
            :search-value="searchTerm"
            :search-fields="searchFields"
        >
            <template #item-actions="{ customer }">
                <div class="flex space-x-2">
                    <button
                        @click="openEditModal(customer)"
                        class="text-indigo-600 hover:text-indigo-900"
                        title="Edit"
                    >
                        <PencilSquareIcon class="w-5 h-5" />
                    </button>
                    <button
                        @click="confirmDelete(customer.id)"
                        class="text-red-600 hover:text-red-900"
                        title="Delete"
                    >
                        <TrashIcon class="w-5 h-5" />
                    </button>
                </div>
            </template>
        </EasyDataTable>

        <div
            v-if="showEditModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        >
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl w-full max-w-md mx-4 overflow-hidden border border-gray-200 dark:border-gray-700"
            >
                <div
                    class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600"
                >
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                        Edit Customer Details
                    </h2>
                </div>

                <form @submit.prevent="updateCustomer" class="p-6">
                    <div class="space-y-4">
                        <div>
                            <label
                                for="name"
                                class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                >Name</label
                            >
                            <input
                                v-model="editedCustomer.name"
                                type="text"
                                id="name"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            />
                            <div
                                v-if="form.errors.name"
                                class="text-red-500 text-sm"
                            >
                                {{ form.errors.name }}
                            </div>
                        </div>
                        <div>
                            <label
                                for="email"
                                class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                >Email</label
                            >
                            <input
                                v-model="editedCustomer.email"
                                type="email"
                                id="email"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            />
                            <div
                                v-if="form.errors.email"
                                class="text-red-500 text-sm"
                            >
                                {{ form.errors.email }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button
                            type="button"
                            @click="closeModal"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                        >
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, router, useForm } from "@inertiajs/vue3";
import { ref, reactive } from "vue";
import EasyDataTable from "vue3-easy-data-table";
import "vue3-easy-data-table/dist/style.css";
import {
    MagnifyingGlassIcon,
    PencilSquareIcon,
    TrashIcon,
} from "@heroicons/vue/24/solid";

// Props
const props = defineProps({
    customers: Array,
});

// Data
const searchTerm = ref("");
const searchFields = ["name", "email", "role"];
const customers = ref(props.customers || []);
const showEditModal = ref(false);
const editedCustomer = reactive({
    id: null,
    name: "",
    email: "",
});

const form = useForm({
    name: "",
    email: "",
    role: "customer",
});

// Headers
const headers = [
    { text: "ID", value: "id", sortable: true },
    { text: "Name", value: "name", sortable: true },
    { text: "Email", value: "email", sortable: true },
    { text: "Actions", value: "actions", width: 100 },
];

// Methods
const openEditModal = (customer) => {
    Object.assign(editedCustomer, customer);
    form.reset();
    form.clearErrors();
    showEditModal.value = true;
};

const closeModal = () => {
    showEditModal.value = false;
};

const updateCustomer = () => {
    form.put(`/customers/${editedCustomer.id}`, editedCustomer, {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
            // Optionally display a success message
        },
        onError: (errors) => {
            // Errors are automatically populated in form.errors
        },
    });
};

const confirmDelete = (id) => {
    if (confirm("Are you sure you want to delete this customer?")) {
        router.delete(`/customers/${id}`, {
            preserveScroll: true,
        });
    }
};
</script>

<style scoped>
/* Optional: You can style modal transition here if needed */
</style>
