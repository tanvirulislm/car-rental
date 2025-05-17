<script setup>
import { Link, router } from "@inertiajs/vue3";
import { ref, computed, watch } from "vue";
import UserLayout from "../../Components/Customer/Layout/UserLayout.vue";

const props = defineProps({
    car: Object,
});

const startDate = ref("");
const endDate = ref("");
const processing = ref(false);
const errors = ref({});

const dailyPrice = computed(() => Math.floor(props.car.daily_rent_price));

const totalDays = computed(() => {
    if (!startDate.value || !endDate.value || startDate.value > endDate.value)
        return 0;

    const start = new Date(startDate.value);
    const end = new Date(endDate.value);

    const diffTime = end - start;

    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24)) + 1;

    return diffDays > 0 ? diffDays : 0;
});

const totalRent = computed(() => totalDays.value * dailyPrice.value);

// Date validation helpers
const todayString = new Date().toISOString().split("T")[0];

const minEndDate = computed(() => {
    return startDate.value || todayString;
});

watch(startDate, (newStartDate) => {
    if (endDate.value && newStartDate > endDate.value) {
        endDate.value = newStartDate;
    }

    if (endDate.value && endDate.value < todayString) {
        endDate.value = todayString;
    }
});

const submitBooking = () => {
    if (!startDate.value || !endDate.value) {
        errors.value = { dates: "Please select both start and end dates" };
        return;
    }

    processing.value = true;

    router.post(
        "/MakeRental",
        {
            car_id: props.car.id,
            start_date: startDate.value,
            end_date: endDate.value,
            total_cost: totalRent.value,
        },
        {
            onSuccess: () => {
                processing.value = false;
                // Redirect to booking confirmation or bookings list
                // router.visit("/rentals/{rental}");
            },
            onError: (err) => {
                errors.value = err;
                processing.value = false;
            },
        }
    );
};
</script>

<template>
    <UserLayout>
        <div class="container mx-auto px-4 py-8">
            <!-- Back Button -->
            <Link
                href="/all-cars"
                class="inline-flex items-center bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded mb-6 text-sm font-medium transition-all"
            >
                <ArrowLeftIcon class="h-4 w-4 mr-2" /> All Cars
            </Link>

            <!-- Main Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="md:flex">
                    <!-- Car Image Gallery -->
                    <div class="md:w-1/2 p-4">
                        <div
                            class="h-96 bg-gray-100 rounded-lg overflow-hidden mb-4"
                        >
                            <img
                                :src="`/${car.image}`"
                                :alt="car.name"
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <div class="md:w-1/2 p-6">
                        <div class="border-b pb-4 mb-4">
                            <h1 class="text-2xl font-bold text-gray-900">
                                {{ car.name }}
                            </h1>
                            <div class="flex items-center mt-2">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded mr-2"
                                    >{{ car.year }}</span
                                >
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded"
                                    >{{ car.car_type }}</span
                                >
                            </div>
                        </div>

                        <!-- Car Features -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="flex items-center">
                                <TruckIcon class="h-5 w-5 text-gray-700 mr-2" />
                                <span class="text-gray-700">{{
                                    car.model
                                }}</span>
                            </div>
                        </div>

                        <!-- Booking Dates -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-3">
                                Select Rental Period
                            </h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-1"
                                        >Start Date</label
                                    >
                                    <input
                                        type="date"
                                        v-model="startDate"
                                        :min="todayString"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    />
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 mb-1"
                                        >End Date</label
                                    >
                                    <input
                                        type="date"
                                        v-model="endDate"
                                        :min="minEndDate"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Price Summary -->
                        <div class="bg-gray-50 p-4 rounded-lg mb-6">
                            <h3 class="text-lg font-semibold mb-2">
                                Price Summary
                            </h3>
                            <div class="space-y-2">
                                <div class="flex justify-between">
                                    <span class="text-gray-600"
                                        >${{ dailyPrice }}
                                        x
                                        {{ totalDays > 0 ? totalDays : 0 }}
                                        Days</span
                                    >
                                    <span class="font-medium"
                                        >${{ totalRent }}</span
                                    >
                                </div>
                                <div
                                    class="border-t border-gray-200 my-2"
                                ></div>
                                <div class="flex justify-between">
                                    <span class="text-gray-800 font-semibold"
                                        >Total</span
                                    >
                                    <span class="text-blue-600 font-semibold"
                                        >${{ totalRent }}</span
                                    >
                                </div>
                            </div>
                        </div>

                        <!-- Book Now Button -->
                        <button
                            @click="submitBooking"
                            :disabled="processing || totalDays === 0"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-medium transition-colors flex items-center justify-center disabled:bg-gray-400 disabled:cursor-not-allowed"
                        >
                            <span v-if="processing">Processing...</span>
                            <template v-else>
                                <ArchiveBoxIcon class="h-4 w-4 mr-2" />
                                Book Now
                            </template>
                        </button>

                        <!-- Error message -->
                        <div
                            v-if="errors.dates"
                            class="mt-2 text-red-600 text-sm"
                        >
                            {{ errors.dates }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </UserLayout>
</template>

<style scoped></style>
