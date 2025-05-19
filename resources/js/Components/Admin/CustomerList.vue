<template>
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
                        href="#"
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
</template>

<script setup>
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";
import EasyDataTable from "vue3-easy-data-table";
import "vue3-easy-data-table/dist/style.css";
import { PencilSquareIcon, TrashIcon } from "@heroicons/vue/24/solid";

const searchTerm = ref("");

const searchFields = ["name", "email"];

const props = defineProps({
    customers: Array,
});

const customers = ref(props.customers || []);

// Table headers configuration
const headers = [
    { text: "ID", value: "id", sortable: true },
    { text: "Role", value: "role", sortable: true },
    { text: "Name", value: "name", sortable: true },
    { text: "Email", value: "email", sortable: true },
    { text: "Actions", value: "actions", width: 100 },
];

const confirmDelete = (id) => {
    if (confirm("Are you sure you want to delete this car?")) {
        router.delete(`/customers/${id}`, {
            preserveScroll: true,
        });
    }
};
</script>

<style></style>
