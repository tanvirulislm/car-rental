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
                class="flex items-center text-sm font-medium px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:hover:bg-blue-500"
            >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2" />
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
      d="M12 8v8m-4-4h8" />
  </svg>
                Add Car
            </button>
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
                    class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
                >
                    <form @submit.prevent="handleCreateCar">
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
                                        Add New Car
                                    </h3>
                                    <div
                                        class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4"
                                    >
                                        <!-- Column 1 -->
                                        <div class="space-y-4">
                                            <div>
                                                <label
                                                    for="name"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                    >Name</label
                                                >
                                                <input
                                                    type="text"
                                                    v-model="newCarForm.name"
                                                    id="name"
                                                    placeholder="e.g. Mercedes-Benz E-Class"
                                                    required
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                                />
                                            </div>
                                            <div>
                                                <label
                                                    for="brand"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                    >Brand</label
                                                >
                                                <input
                                                    type="text"
                                                    v-model="newCarForm.brand"
                                                    id="brand"
                                                    placeholder="e.g. Mercedes-Benz"
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
                                                    placeholder="e.g. E-Class"
                                                    required
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                                />
                                            </div>
                                        </div>

                                        <!-- Column 2 -->
                                        <div class="space-y-4">
                                            <div>
                                                <label
                                                    for="year"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                    >Year</label
                                                >
                                                <input
                                                    type="number"
                                                    v-model.number="
                                                        newCarForm.year
                                                    "
                                                    id="year"
                                                    required
                                                    placeholder="e.g. 2023"
                                                    min="1900"
                                                    :max="
                                                        new Date().getFullYear() +
                                                        1
                                                    "
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                                />
                                            </div>

                                            <div>
                                                <label
                                                    for="car_type"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                    >Car Type</label
                                                >
                                                <input
                                                    v-model="
                                                        newCarForm.car_type
                                                    "
                                                    id="car_type"
                                                    placeholder="e.g. Sedan"
                                                    required
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                                >
                                                    
                                            </input>
                                            </div>
                                            <div>
                                                <label
                                                    for="daily_rent_price"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                    >Daily Price ($)</label
                                                >
                                                <input
                                                    type="number"
                                                    step="0.01"
                                                    v-model.number="
                                                        newCarForm.daily_rent_price
                                                    "
                                                    id="daily_rent_price"
                                                    placeholder="e.g. 50"
                                                    required
                                                    min="0"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                                />
                                            </div>
                                        </div>

                                        <!-- Full width elements -->
                                        <div class="md:col-span-2 space-y-4">
                                            <div>
                                                <label
                                                    for="image"
                                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                                    >Car Image</label
                                                >
                                                <input
                                                    type="file"
                                                    id="image"
                                                    @change="handleImageUpload"
                                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                                />
                                            </div>
                                            <div class="flex items-center">
                                                <input
                                                    id="availability"
                                                    v-model="
                                                        newCarForm.availability
                                                    "
                                                    type="checkbox"
                                                    class="h-4 w-4 text-blue-600 border-gray-300 dark:border-gray-500 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:focus:ring-offset-gray-800"
                                                />
                                                <label
                                                    for="availability"
                                                    class="ml-2 block text-sm text-gray-900 dark:text-gray-300"
                                                    >Available for rent</label
                                                >
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

<script setup>import { ref } from 'vue';
// import { router } from '@inertiajs/vue3';

// Reactive state
const showCreateModal = ref(false);
const newCarForm = ref({
    name: '',
    brand: '',
    model: '',
    year: new Date().getFullYear(),
    car_type: '',
    daily_rent_price: '',
    image: '',
    availability: true
});
const errors = ref({});

// Modal control functions
const openCreateModal = () => {
    showCreateModal.value = true;
};

const closeCreateModal = () => {
    showCreateModal.value = false;
    resetForm();
};

const resetForm = () => {
    newCarForm.value = {
        name: '',
        brand: '',
        model: '',
        year: new Date().getFullYear(),
        car_type: '',
        daily_rent_price: '',
        image: '',
        availability: true
    };
    errors.value = {};
};

// Form handling functions
const validateForm = () => {
    errors.value = {};
    let isValid = true;

    if (!newCarForm.value.name.trim()) {
        errors.value.name = 'Car name is required';
        isValid = false;
    }

    if (!newCarForm.value.brand.trim()) {
        errors.value.brand = 'Brand is required';
        isValid = false;
    }

    // Add other validations as needed...

    return isValid;
};

const handleImageUpload = (event) => {
    newCarForm.value.image = event.target.files[0];
};

const submitForm = () => {
    if (!validateForm()) return;

    const formData = new FormData();
    formData.append('name', newCarForm.value.name);
    // Append other fields...

    router.post('/CreateCar', formData, {
        preserveScroll: true,
        onSuccess: () => {
            closeCreateModal();
        },
        onError: (err) => {
            if (err.errors) {
                errors.value = err.errors;
            }
        }
    });
};
</script>

<style scoped></style>
