<template>
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Customer Management
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
                                >Customer Management</span
                            >
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div>
            <div class="relative max-w-xs mb-2">
                <input
                    v-model="searchTerm"
                    type="text"
                    placeholder="Search customer..."
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
                <!-- Action Buttons -->
                <template #item-actions="{ id }">
                    <div class="flex space-x-2">
                        <Link
                            href="/cars/${car}"
                            class="text-indigo-600 hover:text-indigo-900"
                            title="Edit"
                        >
                            <PencilSquareIcon class="w-5 h-5" />
                        </Link>
                        <button
                            @click="confirmDelete(id)"
                            class="text-red-600 hover:text-red-900"
                            title="Delete"
                        >
                            <TrashIcon class="w-5 h-5" />
                        </button>
                    </div>
                </template>
            </EasyDataTable>
        </div>
    </main>
</template>

<script setup>
import { router } from "@inertiajs/vue3";
import { ref } from "vue";
import EasyDataTable from "vue3-easy-data-table";
import "vue3-easy-data-table/dist/style.css";
import { Link } from "@inertiajs/vue3";

const searchTerm = ref("");

const searchFields = ["name", "email"];

const props = defineProps({
    customers: Array,
});

const customers = ref(props.customers || []);

// Table headers configuration
const headers = [
    { text: "Name", value: "name", sortable: true },
    { text: "Email", value: "email", sortable: true },
    { text: "Actions", value: "actions", width: 100 },
];

// Action methods
const editCar = (id) => {
    router.put(`/cars/${car}`);
};

const confirmDelete = (id) => {
    if (confirm("Are you sure you want to delete this customer?")) {
        router.delete(`/customers/${id}`, {
            preserveScroll: true,
            onSuccess: () => {
                customers.value = cars.value.filter(
                    (customers) => customers.id !== id
                );
            },
        });
    }
};
</script>

<style></style>
