<template>
    <form @submit.prevent="submitEdit">
        <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div
                    class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full"
                >
                    <h3
                        class="text-lg leading-6 font-medium text-gray-900 dark:text-white"
                        id="modal-title-edit"
                    >
                        Edit Car
                    </h3>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <div>
                                <label
                                    for="edit_name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    id="edit_name"
                                    v-model="form.name"
                                    placeholder="e.g. Mercedes-Benz E-Class"
                                    required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-red-500 text-sm mt-1"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div>
                                <label
                                    for="edit_brand"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >Brand</label
                                >
                                <input
                                    type="text"
                                    id="edit_brand"
                                    v-model="form.brand"
                                    placeholder="e.g. Mercedes-Benz"
                                    required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                />
                                <div
                                    v-if="form.errors.brand"
                                    class="text-red-500 text-sm mt-1"
                                >
                                    {{ form.errors.brand }}
                                </div>
                            </div>
                            <div>
                                <label
                                    for="edit_model"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >Model</label
                                >
                                <input
                                    type="text"
                                    id="edit_model"
                                    v-model="form.model"
                                    placeholder="e.g. E-Class"
                                    required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                />
                                <div
                                    v-if="form.errors.model"
                                    class="text-red-500 text-sm mt-1"
                                >
                                    {{ form.errors.model }}
                                </div>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <div>
                                <label
                                    for="edit_year"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >Year</label
                                >
                                <input
                                    type="number"
                                    id="edit_year"
                                    v-model="form.year"
                                    required
                                    placeholder="e.g. 2023"
                                    min="1900"
                                    :max="new Date().getFullYear()"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                />
                                <div
                                    v-if="form.errors.year"
                                    class="text-red-500 text-sm mt-1"
                                >
                                    {{ form.errors.year }}
                                </div>
                            </div>
                            <div>
                                <label
                                    for="edit_car_type"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >Car Type</label
                                >
                                <input
                                    id="edit_car_type"
                                    v-model="form.car_type"
                                    placeholder="e.g. Sedan"
                                    required
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                />
                                <div
                                    v-if="form.errors.car_type"
                                    class="text-red-500 text-sm mt-1"
                                >
                                    {{ form.errors.car_type }}
                                </div>
                            </div>
                            <div>
                                <label
                                    for="edit_daily_rent_price"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >Daily Price ($)</label
                                >
                                <input
                                    type="number"
                                    v-model="form.daily_rent_price"
                                    step="0.01"
                                    id="edit_daily_rent_price"
                                    placeholder="e.g. 50"
                                    required
                                    min="0"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                />
                                <div
                                    v-if="form.errors.daily_rent_price"
                                    class="text-red-500 text-sm mt-1"
                                >
                                    {{ form.errors.daily_rent_price }}
                                </div>
                            </div>
                        </div>

                        <!-- Full width elements -->
                        <div class="md:col-span-2 space-y-4">
                            <div>
                                <label
                                    for="edit_image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300"
                                    >Car Image (leave empty to keep
                                    current)</label
                                >
                                <input
                                    type="file"
                                    id="edit_image"
                                    @input="form.image = $event.target.files[0]"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-white"
                                />
                                <div
                                    v-if="form.errors.image"
                                    class="text-red-500 text-sm mt-1"
                                >
                                    {{ form.errors.image }}
                                </div>
                                <img
                                    v-if="currentImageUrl && !previewUrl"
                                    :src="`/${currentImageUrl}`"
                                    alt="Current car image"
                                    class="mt-2 h-20 w-auto rounded"
                                />
                                <img
                                    v-if="previewUrl"
                                    :src="previewUrl"
                                    alt="New image preview"
                                    class="mt-2 h-20 w-auto rounded"
                                />
                            </div>
                            <div class="flex items-center">
                                <input
                                    id="edit_availability"
                                    type="checkbox"
                                    v-model="form.availability"
                                    class="h-4 w-4 text-blue-600 border-gray-300 dark:border-gray-500 rounded focus:ring-indigo-500 dark:bg-gray-700 dark:focus:ring-offset-gray-800"
                                />
                                <label
                                    for="edit_availability"
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
                :disabled="form.processing"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm dark:hover:bg-blue-500 disabled:opacity-50"
            >
                Save Changes
            </button>
            <button
                type="button"
                @click="$emit('closeModal')"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
            >
                Cancel
            </button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { createToaster } from "@meforma/vue-toaster";
import { ref, watch, onMounted } from "vue";

const props = defineProps({
    car: Object,
});

const emit = defineEmits(["closeModal", "carUpdated"]);
const toaster = createToaster({ position: "top-right", duration: 3000 });

const form = useForm({
    _method: "PUT",
    name: "",
    brand: "",
    model: "",
    year: null,
    car_type: "",
    daily_rent_price: null,
    image: null,
    availability: true,
});

const currentImageUrl = ref(null);
const previewUrl = ref(null);

watch(
    () => props.car,
    (newCarData) => {
        if (newCarData) {
            form.reset(); // Important to clear previous errors and states
            form.name = newCarData.name;
            form.brand = newCarData.brand;
            form.model = newCarData.model;
            form.year = newCarData.year;
            form.car_type = newCarData.car_type;
            form.daily_rent_price = newCarData.daily_rent_price;
            form.availability = !!newCarData.availability; // Ensure boolean
            currentImageUrl.value = newCarData.image;
            form.image = null; // Reset file input
            previewUrl.value = null; // Clear old preview
        }
    },
    { immediate: true, deep: true }
);

watch(
    () => form.image,
    (newImageFile) => {
        if (newImageFile instanceof File) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewUrl.value = e.target.result;
            };
            reader.readAsDataURL(newImageFile);
        } else {
            previewUrl.value = null; // Clear preview if image is removed or not a file
        }
    }
);

function submitEdit() {
    if (!props.car || !props.car.id) {
        toaster.error("Cannot edit car: ID is missing.");
        return;
    }
    // Use form.post for multipart/form-data with _method: 'PUT'
    form.post(route("cars.update", { car: props.car.id }), {
        preserveScroll: true,
        onSuccess: () => {
            toaster.success("Car updated successfully!");
            emit("carUpdated");
            emit("closeModal");
        },
        onError: (errors) => {
            toaster.error("Failed to update car. Please check errors.");
            console.error("Update Errors:", errors);
        },
    });
}
</script>
