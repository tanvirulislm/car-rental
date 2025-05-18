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
            :items="rentals"
            buttons-pagination
            table-class-name="customize-table"
            :search-value="searchTerm"
            :search-fields="searchFields"
        >
            <!-- Car Image -->
            <template #item.startDate="{ item }">
                {{ formatDate(item.startDate) }}
            </template>

            <template #item.endDate="{ item }">
                {{ formatDate(item.endDate) }}
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
                    <Link
                        :href="`/rentals/${rental}/cancel`"
                        class="text-red-600 hover:text-red-900"
                        title="Delete"
                    >
                        <TrashIcon class="w-5 h-5" />
                    </Link>
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

const props = defineProps(["rentals"]);

const rentals = ref(
    props.rentals.map((rental) => ({
        id: rental.id,
        customerName: rental.user?.name ?? "-",
        carName: rental.car?.name ?? "-",
        startDate: rental.start_date,
        endDate: rental.end_date,
        carType: rental.car?.car_type ?? "-",
        totalCost: rental.total_cost,
    }))
);

// Table headers configuration
const searchFields = ["customerName", "carName", "totalCost"];

const headers = [
    { text: "ID", value: "id", sortable: true },
    { text: "Customer Name", value: "customerName", sortable: true },
    { text: "Car Name", value: "carName", sortable: true },
    { text: "Start Date", value: "startDate", sortable: true },
    { text: "End Date", value: "endDate", sortable: true },
    { text: "Car Type", value: "carType", sortable: true },
    { text: "Total Price", value: "totalCost", sortable: true },
    { text: "Actions", value: "actions", width: 100 },
];

const formatDate = (dateString) => {
    console.log("Formatting:", dateString);
    if (!dateString) return "";
    const date = new Date(dateString);
    return new Intl.DateTimeFormat("en-GB", {
        day: "2-digit",
        month: "2-digit",
        year: "numeric",
    }).format(date);
};

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
