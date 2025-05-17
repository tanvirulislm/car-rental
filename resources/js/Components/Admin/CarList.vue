<template>
    <div>
        <!-- Search -->
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

        <!-- Data Table -->
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

            <!-- Actions -->
            <template #item-actions="{ id }">
                <div class="flex space-x-2">
                    <button
                        @click="openEditModal(id)"
                        class="text-indigo-600 hover:text-indigo-900"
                        title="Edit"
                    >
                        <PencilSquareIcon class="w-5 h-5" />
                    </button>
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

        <!-- Edit Modal -->
        <div
            v-if="showEditModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        >
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl w-full max-w-2xl mx-4 overflow-hidden border border-gray-200 dark:border-gray-700"
            >
                <!-- Header -->
                <div
                    class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600"
                >
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                        Edit Car Details
                    </h2>
                </div>

                <!-- Two Column Form -->
                <form
                    @submit.prevent="updateCar"
                    enctype="multipart/form-data"
                    class="p-6"
                >
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column (Image Section) -->
                        <div class="space-y-4">
                            <!-- Image Preview -->
                            <div
                                class="relative aspect-square bg-gray-100 dark:bg-gray-700 rounded-lg overflow-hidden border-2 border-dashed border-gray-300 dark:border-gray-600"
                            >
                                <template v-if="previewUrl || editedCar.image">
                                    <img
                                        :src="previewUrl || editedCar.image"
                                        alt="Car Image"
                                        class="absolute inset-0 w-full h-full object-cover"
                                    />
                                </template>
                                <div
                                    v-else
                                    class="absolute inset-0 flex items-center justify-center text-gray-400"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-12 w-12"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        />
                                    </svg>
                                </div>
                            </div>

                            <!-- File Input -->
                            <div>
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300"
                                >
                                    {{
                                        previewUrl || editedCar.image
                                            ? "Change Image"
                                            : "Upload Image"
                                    }}
                                </label>
                                <input
                                    type="file"
                                    @change="handleImageUpload"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 dark:file:bg-gray-600 dark:file:text-gray-100 dark:hover:file:bg-gray-500"
                                    accept="image/*"
                                />
                            </div>
                        </div>

                        <!-- Right Column (Form Fields) -->
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 gap-4">
                                <div>
                                    <label
                                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                        >Name</label
                                    >
                                    <input
                                        v-model="editedCar.name"
                                        type="text"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label
                                            class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                            >Brand</label
                                        >
                                        <input
                                            v-model="editedCar.brand"
                                            type="text"
                                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        />
                                    </div>
                                    <div>
                                        <label
                                            class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                            >Model</label
                                        >
                                        <input
                                            v-model="editedCar.model"
                                            type="text"
                                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label
                                            class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                            >Year</label
                                        >
                                        <input
                                            v-model="editedCar.year"
                                            type="number"
                                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        />
                                    </div>
                                    <div>
                                        <label
                                            class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                            >Type</label
                                        >
                                        <input
                                            v-model="editedCar.car_type"
                                            type="text"
                                            class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        />
                                    </div>
                                </div>

                                <div>
                                    <label
                                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                        >Daily Price</label
                                    >
                                    <input
                                        v-model="editedCar.daily_rent_price"
                                        type="number"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    />
                                </div>

                                <div>
                                    <label
                                        class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                        >Availability</label
                                    >
                                    <select
                                        v-model="editedCar.availability"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    >
                                        <option :value="true">Available</option>
                                        <option :value="false">
                                            Unavailable
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Buttons -->
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
import { Link, router } from "@inertiajs/vue3";
import { ref, reactive, computed } from "vue";
import EasyDataTable from "vue3-easy-data-table";
import "vue3-easy-data-table/dist/style.css";
import {
    MagnifyingGlassIcon,
    PencilSquareIcon,
    TrashIcon,
} from "@heroicons/vue/24/solid";

// Props
const props = defineProps({
    car: Array,
});

// Data
const searchTerm = ref("");
const searchFields = ["name", "brand", "model", "car_type", "year"];
const cars = ref(props.car || []);
const showEditModal = ref(false);
const defaultEditedCarState = {
    id: null,
    name: "",
    brand: "",
    model: "",
    year: "",
    car_type: "",
    daily_rent_price: "",
    availability: true,
    image: null,
};

const editedCar = reactive({ ...defaultEditedCarState });
const newImageFile = ref(null); // To store the selected file object

const previewUrl = computed(() => {
    if (newImageFile.value) {
        return URL.createObjectURL(newImageFile.value);
    }
    return null;
});

// Headers
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

// Methods
const openEditModal = (id) => {
    const carToEdit = props.car.find((c) => c.id === id);
    if (carToEdit) {
        Object.assign(editedCar, carToEdit);
        newImageFile.value = null;
        showEditModal.value = true;
    }
};

const closeModal = () => {
    showEditModal.value = false;
    Object.assign(editedCar, defaultEditedCarState); // Reset form
    newImageFile.value = null;
};

const handleImageUpload = (event) => {
    if (event.target.files && event.target.files[0]) {
        newImageFile.value = event.target.files[0];
    } else {
        newImageFile.value = null;
    }
};

const updateCar = () => {
    const formData = new FormData();
    formData.append("_method", "PUT"); // Tell Laravel to treat this POST as PUT
    formData.append("name", editedCar.name);
    formData.append("brand", editedCar.brand);
    formData.append("model", editedCar.model);
    formData.append("year", editedCar.year);
    formData.append("car_type", editedCar.car_type);
    formData.append("daily_rent_price", editedCar.daily_rent_price);
    formData.append("availability", editedCar.availability ? "1" : "0");

    if (newImageFile.value) {
        formData.append("image", newImageFile.value);
    }

    router.post(`/cars/${editedCar.id}`, formData, {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
        },
        onError: (errors) => {
            console.error("Error updating car:", errors);
            const errorMessages = Object.values(errors).flat().join(" ");
            alert(
                `Error updating car: ${
                    errorMessages || "Please check your input."
                }`
            );
        },
        forceFormData: true,
    });
};

const confirmDelete = (id) => {
    if (confirm("Are you sure you want to delete this car?")) {
        router.delete(`/cars/${id}`, {
            preserveScroll: true,
        });
    }
};
</script>

<style scoped>
/* Optional: You can style modal transition here if needed */
</style>
