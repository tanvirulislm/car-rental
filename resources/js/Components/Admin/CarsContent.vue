<template>
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-gray-900">
        <!-- Breadcrumb and Page Title -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                Car Management
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
                                >Car Management</span
                            >
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <!-- Add Car Button -->
        <div class="mb-6 flex justify-end">
            <button
                @click="openCreateModal"
                class="flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:hover:bg-indigo-500"
            >
                <PlusIcon class="w-5 h-5 mr-2" />
                Add Car
            </button>
        </div>

        <!-- Cars Table -->
        <div class="mt-8">
            <h3
                class="text-xl font-semibold text-gray-800 dark:text-white mb-4"
            >
                Car List
            </h3>
            <div
                class="shadow border-b border-gray-200 dark:border-gray-700 sm:rounded-lg overflow-hidden"
            >
                <VueEasytable
                    :columns="tableColumns"
                    :table-data="cars"
                    :loading="loading"
                    :pagination="true"
                    :page-size="10"
                    theme-color="#6366f1"
                    table-class-name="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                    header-text-direction="left"
                    body-text-direction="left"
                >
                    <template #empty>
                        <div
                            class="text-center py-10 text-gray-500 dark:text-gray-400"
                        >
                            No cars available.
                        </div>
                    </template>

                    <template #loading>
                        <div
                            class="flex justify-center items-center py-10 text-gray-500 dark:text-gray-400"
                        >
                            <svg
                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-indigo-600"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                ></path>
                            </svg>
                            Loading data...
                        </div>
                    </template>

                    <template #item-image_url="{ row }">
                        <img
                            :src="
                                row.image_url ||
                                'https://via.placeholder.com/64x40?text=No+Image'
                            "
                            :alt="`${row.make} ${row.model}`"
                            class="h-10 w-16 object-cover rounded"
                            @error="
                                $event.target.src =
                                    'https://via.placeholder.com/64x40?text=Error'
                            "
                        />
                    </template>

                    <template #item-price_per_day="{ row }">
                        ${{ parseFloat(row.price_per_day).toFixed(2) }}
                    </template>

                    <template #item-is_available="{ row }">
                        <span
                            :class="
                                row.is_available
                                    ? 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-700 dark:text-green-100'
                                    : 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-700 dark:text-red-100'
                            "
                        >
                            {{ row.is_available ? "Yes" : "No" }}
                        </span>
                    </template>

                    <!-- Add action buttons here if needed, e.g.
                    <template #item-actions="{ row }">
                        <button @click="editCar(row)" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200 mr-2 p-1">
                            <PencilIcon class="w-4 h-4" />
                        </button>
                        <button @click="confirmDeleteCar(row)" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200 p-1">
                            <TrashIcon class="w-4 h-4" />
                        </button>
                    </template>
                    -->
                </VueEasytable>
            </div>
        </div>

        <!-- Create Car Modal -->
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
                    class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                >
                    <form @submit.prevent="handleCreateCar">
                        <div
                            class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4"
                        >
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 dark:bg-indigo-700 sm:mx-0 sm:h-10 sm:w-10"
                                >
                                    <PlusIcon
                                        class="h-6 w-6 text-indigo-600 dark:text-indigo-300"
                                        aria-hidden="true"
                                    />
                                </div>
                                <div
                                    class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full"
                                >
                                    <h3
                                        class="text-lg leading-6 font-medium text-gray-900 dark:text-white"
                                        id="modal-title"
                                    >
                                        Add New Car
                                    </h3>
                                    <div class="mt-4 space-y-4">
                                        <div>
                                            <label
                                                for="make"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                >Make</label
                                            >
                                            <input
                                                type="text"
                                                v-model="newCarForm.make"
                                                id="make"
                                                required
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                            />
                                        </div>
                                        <div>
                                            <label
                                                for="model"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                >Model</label
                                            >
                                            <input
                                                type="text"
                                                v-model="newCarForm.model"
                                                id="model"
                                                required
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                            />
                                        </div>
                                        <div>
                                            <label
                                                for="year"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                >Year</label
                                            >
                                            <input
                                                type="number"
                                                v-model.number="newCarForm.year"
                                                id="year"
                                                required
                                                min="1900"
                                                :max="
                                                    new Date().getFullYear() + 1
                                                "
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                            />
                                        </div>
                                        <div>
                                            <label
                                                for="price_per_day"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                >Price per Day ($)</label
                                            >
                                            <input
                                                type="number"
                                                step="0.01"
                                                v-model.number="
                                                    newCarForm.price_per_day
                                                "
                                                id="price_per_day"
                                                required
                                                min="0"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                            />
                                        </div>
                                        <div>
                                            <label
                                                for="image_url"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                >Image URL</label
                                            >
                                            <input
                                                type="url"
                                                v-model="newCarForm.image_url"
                                                id="image_url"
                                                class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                                placeholder="https://example.com/image.png"
                                            />
                                        </div>
                                        <div class="flex items-center">
                                            <input
                                                id="is_available"
                                                v-model="
                                                    newCarForm.is_available
                                                "
                                                type="checkbox"
                                                class="h-4 w-4 text-indigo-600 border-gray-300 dark:border-gray-500 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:focus:ring-offset-gray-800"
                                            />
                                            <label
                                                for="is_available"
                                                class="ml-2 block text-sm text-gray-900 dark:text-gray-300"
                                                >Available for rent</label
                                            >
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
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm dark:hover:bg-indigo-500"
                            >
                                Save Car
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
    </main>
</template>

<script setup>
import { ref, onMounted } from "vue";
import {
    HomeIcon,
    ChevronRightIcon,
    PlusIcon,
} from "@heroicons/vue/24/outline"; // Assuming outline variant
import VueEasytable from "vue-easytable";
import "vue-easytable/libs/theme-default/index.css"; // Default theme for vue-easytable

// Reactive state
const cars = ref([]);
const loading = ref(false);
const showCreateModal = ref(false);
const newCarForm = ref({
    make: "",
    model: "",
    year: new Date().getFullYear(),
    price_per_day: null,
    image_url: "",
    is_available: true,
});

const tableColumns = ref([
    {
        field: "image_url",
        key: "image_url",
        title: "Image",
        width: 100,
        align: "center",
        fixed: "left",
    },
    { field: "make", key: "make", title: "Make", width: 150 },
    { field: "model", key: "model", title: "Model", width: 150 },
    { field: "year", key: "year", title: "Year", width: 100, align: "center" },
    {
        field: "price_per_day",
        key: "price_per_day",
        title: "Price/Day",
        width: 120,
        align: "right",
    },
    {
        field: "is_available",
        key: "is_available",
        title: "Available",
        width: 100,
        align: "center",
    },
    // { field: 'actions', key: 'actions', title: 'Actions', width: 120, align: 'center', fixed: 'right' } // Example for actions
]);

// Methods
const fetchCars = async () => {
    loading.value = true;
    // Simulate API call
    await new Promise((resolve) => setTimeout(resolve, 1000));
    cars.value = [
        {
            id: 1,
            make: "Toyota",
            model: "Camry",
            year: 2022,
            price_per_day: 50.0,
            image_url:
                "https://via.placeholder.com/150/FF0000/FFFFFF?Text=ToyotaCamry",
            is_available: true,
        },
        {
            id: 2,
            make: "Honda",
            model: "Civic",
            year: 2023,
            price_per_day: 45.5,
            image_url:
                "https://via.placeholder.com/150/00FF00/FFFFFF?Text=HondaCivic",
            is_available: false,
        },
        {
            id: 3,
            make: "Ford",
            model: "Mustang",
            year: 2021,
            price_per_day: 70.0,
            image_url: "",
            is_available: true,
        },
        {
            id: 4,
            make: "BMW",
            model: "X5",
            year: 2024,
            price_per_day: 120.0,
            image_url:
                "https://via.placeholder.com/150/0000FF/FFFFFF?Text=BMWX5",
            is_available: true,
        },
        {
            id: 5,
            make: "Audi",
            model: "A4",
            year: 2022,
            price_per_day: 65.0,
            image_url:
                "https://via.placeholder.com/150/FFFF00/000000?Text=AudiA4",
            is_available: false,
        },
    ];
    loading.value = false;
};

const openCreateModal = () => {
    newCarForm.value = {
        // Reset form
        make: "",
        model: "",
        year: new Date().getFullYear(),
        price_per_day: null,
        image_url: "",
        is_available: true,
    };
    showCreateModal.value = true;
};

const closeCreateModal = () => {
    showCreateModal.value = false;
};

const handleCreateCar = async () => {
    // Basic validation (can be improved with a library like Vuelidate)
    if (
        !newCarForm.value.make ||
        !newCarForm.value.model ||
        !newCarForm.value.year ||
        newCarForm.value.price_per_day === null ||
        newCarForm.value.price_per_day < 0
    ) {
        alert("Please fill in all required fields correctly.");
        return;
    }

    loading.value = true; // Show loading state on table
    // Simulate API call for creating a car
    await new Promise((resolve) => setTimeout(resolve, 500));

    const newCarEntry = {
        id:
            cars.value.length > 0
                ? Math.max(...cars.value.map((c) => c.id)) + 1
                : 1, // Mock ID generation
        ...newCarForm.value,
    };
    cars.value.unshift(newCarEntry); // Add to the beginning of the list

    // In a real app:
    // try {
    //   const response = await api.post('/cars', newCarForm.value);
    //   cars.value.unshift(response.data); // Or fetchCars() again
    // } catch (error) {
    //   console.error("Failed to create car:", error);
    //   alert("Failed to create car. Please try again.");
    // }

    loading.value = false;
    closeCreateModal();
};

onMounted(() => {
    fetchCars();
});

// If you need icons for actions in the table:
// import { PencilIcon, TrashIcon } from '@heroicons/vue/24/outline';
// const editCar = (car) => { console.log('Edit car:', car); /* Implement edit logic */ };
// const confirmDeleteCar = (car) => {
//  if (confirm(`Are you sure you want to delete ${car.make} ${car.model}?`)) {
//    deleteCar(car);
//  }
// };
// const deleteCar = async (car) => { /* Implement delete logic */ loading.value = true; await new Promise(r => setTimeout(r, 500)); cars.value = cars.value.filter(c => c.id !== car.id); loading.value = false; };
</script>

<style scoped></style>
