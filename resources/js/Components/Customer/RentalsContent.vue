<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";
const props = defineProps({
    rentals: Array,
});

const formatDate = (dateString) => {
    if (!dateString) return "";
    const date = new Date(dateString);
    const options = { year: "numeric", month: "short", day: "numeric" };
    return date.toLocaleDateString(undefined, options);
};

// dynamic statuses
const getRentalStatus = (rental) => {
    const today = new Date();
    today.setHours(0, 0, 0, 0); // Normalize to start of day for accurate comparison

    const startDate = new Date(rental.start_date);
    startDate.setHours(0, 0, 0, 0);

    const endDate = new Date(rental.end_date);
    endDate.setHours(0, 0, 0, 0);

    // Note: "Cancelled" status is handled by rental deletion in the backend.
    // Rentals in this list are active or past, not cancelled.

    if (endDate < today) {
        return "Completed";
    } else if (startDate <= today && endDate >= today) {
        return "Ongoing";
    } else if (startDate > today) {
        return "Upcoming";
    }
    return "Unknown"; // Fallback, should ideally not be reached
};

const statusStyles = {
    Upcoming: {
        badge: "bg-blue-100 text-blue-800",
        border: "border-blue-500",
    },
    Ongoing: {
        badge: "bg-green-100 text-green-800",
        border: "border-green-500",
        buttonDisabled: true,
    },
    Completed: {
        badge: "bg-gray-100 text-gray-800",
        border: "border-gray-500",
        buttonDisabled: true,
    },
    Cancelled: {
        badge: "bg-red-100 text-red-800",
        border: "border-red-500",
        buttonDisabled: true,
    },
    Unknown: {
        badge: "bg-yellow-100 text-gray-800",
        border: "border-yellow-500",
    },
};

const activeTab = ref("All Bookings");

const filteredRentals = computed(() => {
    if (activeTab.value === "All Bookings") {
        return props.rentals;
    }

    return props.rentals.filter(
        (rental) => getRentalStatus(rental) === activeTab.value
    );
});

const handleTabClick = (tab) => {
    activeTab.value = tab;
};

const tabLabels = {};
</script>

<template>
    <div class="container mx-auto px-4 py-8">
        <!-- Logout button -->
        <Link
            href="/logout"
            class="inline-flex items-center bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded mb-6 text-sm font-medium transition-all"
            ><ArrowLeftOnRectangleIcon class="h-4 w-4 mr-2" /> Logout</Link
        >
        <!-- Booking Status Tabs -->
        <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex space-x-8">
                <a
                    v-for="tab in [
                        'All Bookings',
                        'Upcoming',
                        'Ongoing',
                        'Completed',
                        'Cancelled',
                    ]"
                    :key="tab"
                    href="#"
                    :class="[
                        'whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm',
                        activeTab === tab
                            ? 'border-blue-500 text-blue-600'
                            : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                    ]"
                    @click.prevent="handleTabClick(tab)"
                >
                    {{ tab }}
                </a>
            </nav>
        </div>

        <!-- Booking Cards -->
        <div class="space-y-6">
            <!-- Upcoming Booking -->

            <div
                v-for="rental in filteredRentals"
                :key="rental.id"
                :class="[
                    'bg-white rounded-xl shadow-md overflow-hidden border-l-4',
                    statusStyles[getRentalStatus(rental)]?.border ||
                        statusStyles.Unknown.border,
                ]"
            >
                <div class="md:flex">
                    <div class="md:w-1/4 p-4">
                        <img
                            :src="rental.car.image"
                            :alt="rental.car.name"
                            class="w-full h-full object-cover rounded-lg"
                        />
                    </div>
                    <div class="md:w-2/4 p-4">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ rental.car.name }}
                                </h3>
                                <div class="flex items-center mt-1">
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded mr-2"
                                        >{{ rental.car.year }}</span
                                    >
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded"
                                        >{{ rental.car.car_type }}</span
                                    >
                                </div>
                            </div>
                            <span
                                :class="[
                                    'text-xs font-medium px-2.5 py-0.5 rounded',
                                    statusStyles[getRentalStatus(rental)]
                                        ?.badge || statusStyles.Unknown.badge,
                                ]"
                                >{{ getRentalStatus(rental) }}</span
                            >
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <p class="text-sm text-gray-500">Pickup Date</p>
                                <p class="font-medium">
                                    {{ formatDate(rental.start_date) }}
                                </p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Return Date</p>
                                <p class="font-medium">
                                    {{ formatDate(rental.end_date) }}
                                </p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500">
                                    Total Amount
                                </p>
                                <p class="font-medium">
                                    ${{ rental.total_cost }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-1/4 p-4 flex flex-col justify-between">
                        <div class="flex justify-end space-x-2">
                            <button class="text-gray-500 hover:text-gray-700">
                                <!-- <PrinterIcon class="h-5 w-5" /> -->
                            </button>
                        </div>
                        <div class="flex space-x-2 mt-4">
                            <button
                                class="flex-1 bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded text-sm font-medium"
                                :disabled="
                                    statusStyles[getRentalStatus(rental)]
                                        ?.buttonDisabled
                                "
                                :class="{
                                    'opacity-50 cursor-not-allowed':
                                        statusStyles[getRentalStatus(rental)]
                                            ?.buttonDisabled,
                                }"
                            >
                                Modify
                            </button>
                            <Link
                                :href="`/rentals/${rental.id}/cancel`"
                                class="flex-1 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-medium"
                                :disabled="
                                    statusStyles[getRentalStatus(rental)]
                                        ?.buttonDisabled
                                "
                                :class="{
                                    'opacity-50 cursor-not-allowed':
                                        statusStyles[getRentalStatus(rental)]
                                            ?.buttonDisabled,
                                }"
                            >
                                Cancel
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
            <div
                v-if="filteredRentals.length === 0"
                class="text-center py-10 text-gray-500"
            >
                No bookings found in this category.
                <br />
                Try selecting a different tab or check back later!
            </div>
        </div>
    </div>
</template>

<style scoped></style>
