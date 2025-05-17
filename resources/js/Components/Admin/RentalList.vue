<template>
    <div>
        <div class="relative max-w-xs mb-2">
            <input
                v-model="searchTerm"
                type="text"
                placeholder="Search cars..."
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
            :items="cars"
            buttons-pagination
            table-class-name="customize-table"
            :search-value="searchTerm"
            :search-fields="searchFields"
        >
            <!-- Availability Badge -->
            <template #item-availability="{ availability }">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                    :class="
                        availability
                            ? 'bg-green-100 text-green-800'
                            : 'bg-red-100 text-red-800'
                    "
                >
                    {{ availability ? "Available" : "Unavailable" }}
                </span>
            </template>

            <!-- Car Image -->
            <template #item-image="{ image }">
                <img
                    :src="image"
                    class="w-16 h-10 object-cover rounded"
                    alt="Car Image"
                />
            </template>

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
</template>

<script setup>
import { router } from "@inertiajs/vue3";
import { ref } from "vue";
import EasyDataTable from "vue3-easy-data-table";
import "vue3-easy-data-table/dist/style.css";
import { Link } from "@inertiajs/vue3";

const searchTerm = ref("");

const searchFields = ["name", "brand", "model", "car_type", "year"];

const props = defineProps({
    car: Array,
});

const cars = ref(props.car || []);

// Table headers configuration
const headers = [
    { text: "Name", value: "name", sortable: true },
    { text: "Brand", value: "brand", sortable: true },
    { text: "Model", value: "model", sortable: true },
    { text: "Year", value: "year", sortable: true },
    { text: "Type", value: "car_type", sortable: true },
    { text: "Daily Price", value: "daily_rent_price", sortable: true },
    { text: "Availability", value: "availability", sortable: true },
    { text: "Image", value: "image" },
    { text: "Actions", value: "actions", width: 100 },
];

// Action methods
const editCar = (id) => {
    router.put(`/cars/${car}`);
};

const confirmDelete = (id) => {
    if (confirm("Are you sure you want to delete this car?")) {
        router.delete(`/cars/${id}`, {
            preserveScroll: true,
            onSuccess: () => {
                cars.value = cars.value.filter((car) => car.id !== id);
            },
        });
    }
};
</script>

<style></style>
