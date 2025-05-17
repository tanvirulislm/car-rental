<script setup>
import UserLayout from "../../Components/Customer/Layout/UserLayout.vue";
import { Link } from "@inertiajs/vue3";
import { defineProps, computed } from "vue";

const props = defineProps({
    rental: Object,
});

const formatDate = (dateString) => {
    if (!dateString) return "";
    const date = new Date(dateString);
    const options = { year: "numeric", month: "short", day: "numeric" };
    return date.toLocaleDateString(undefined, options);
};

const rentalDurationInDays = computed(() => {
    if (!props.rental || !props.rental.start_date || !props.rental.end_date) {
        console.warn(
            "Rental data, start_date, or end_date is missing for duration calculation."
        );
        return 0;
    }
    const startDate = new Date(props.rental.start_date);
    const endDate = new Date(props.rental.end_date);

    if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
        console.warn(
            "Invalid date(s) provided for rental duration calculation. Check rental.start_date or rental.end_date."
        );
        return 0;
    }
    if (endDate < startDate) {
        console.warn(
            "End date cannot be before start date for duration calculation."
        );
        return 0;
    }
    const timeDifference = endDate.getTime() - startDate.getTime();
    const daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));
    return daysDifference;
});
</script>

<template>
    <UserLayout>
        <div class="container mx-auto px-4 py-12">
            <!-- Confirmation Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-green-100 p-6 border-b border-green-200">
                    <div class="flex items-center">
                        <div
                            class="bg-green-500 text-white w-12 h-12 flex items-center justify-center rounded-full mr-4"
                        >
                            <!-- <i class="fas fa-check-circle text-2xl"></i> -->
                            <CheckCircleIcon class="w-6 h-6 text-white" />
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">
                                Booking Confirmed!
                            </h1>
                            <p class="text-gray-600">
                                Your reservation is complete. We've sent the
                                details to your email.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Booking Summary -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">
                        Your Rental Summary
                    </h2>

                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Car Info -->
                        <div class="md:w-1/3">
                            <div
                                class="h-48 bg-gray-100 rounded-lg overflow-hidden mb-3"
                            >
                                <img
                                    :src="`/${rental.car.image}`"
                                    :alt="rental.car.name"
                                    alt="Mercedes-Benz E-Class"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <h3 class="font-bold text-lg">
                                {{ rental.car.name }}
                            </h3>
                            <p class="text-gray-600">
                                {{ rental.car.year }} •
                                {{ rental.car.car_type }}
                            </p>
                        </div>

                        <!-- Rental Details -->
                        <div class="md:w-2/3">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h4 class="font-medium mb-2 text-gray-500">
                                        Rental Period
                                    </h4>
                                    <p class="text-lg">
                                        <span class="font-medium">{{
                                            formatDate(rental.start_date)
                                        }}</span>
                                        -
                                        <span class="font-medium">{{
                                            formatDate(rental.end_date)
                                        }}</span>
                                    </p>
                                    <p class="text-gray-600">
                                        {{ rentalDurationInDays }}
                                        {{
                                            rentalDurationInDays === 1
                                                ? "day"
                                                : "days"
                                        }}
                                    </p>
                                </div>

                                <div>
                                    <h4 class="font-medium mb-2 text-gray-500">
                                        Total Cost
                                    </h4>
                                    <p class="text-2xl font-bold text-blue-600">
                                        ${{ rental.total_cost }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        incl. taxes and fees
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">What's Next?</h2>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div
                                class="bg-blue-100 h-10 w-10 flex items-center justify-center rounded-full mr-4 mt-1"
                            >
                                <EnvelopeIcon class="w-6 h-6 text-blue-600" />
                            </div>
                            <div>
                                <h4 class="font-medium">Check your email</h4>
                                <p class="text-gray-600">
                                    We've sent your booking confirmation and
                                    receipt to your email address.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="bg-blue-100 h-10 w-10 flex items-center justify-center rounded-full mr-4 mt-1"
                            >
                                <CreditCardIcon class="w-6 h-6 text-blue-600" />
                            </div>
                            <div>
                                <h4 class="font-medium">
                                    Prepare your documents
                                </h4>
                                <p class="text-gray-600">
                                    Bring your driver's license, credit card,
                                    and booking confirmation when you pick up
                                    the vehicle.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div
                                class="bg-blue-100 h-10 w-10 flex items-center justify-center rounded-full mr-4 mt-1"
                            >
                                <TruckIcon class="w-6 h-6 text-blue-600" />
                            </div>
                            <div>
                                <h4 class="font-medium">
                                    Pick up your vehicle
                                </h4>
                                <p class="text-gray-600">
                                    Visit our rental center at your selected
                                    time. Our staff will assist you with the
                                    paperwork.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="p-6">
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button
                            class="flex justify-center items-center flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded font-medium transition-colors"
                        >
                            <ArrowDownTrayIcon class="w-6 h-6 mr-2" />
                            Download Receipt
                        </button>
                        <Link
                            href="/my-rentals"
                            class="flex justify-center items-center flex-1 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 py-3 px-4 rounded font-medium transition-colors"
                        >
                            <CalendarIcon class="w-6 h-6 mr-2" />
                            See your booking history
                        </Link>
                        <Link
                            href="/"
                            class="flex justify-center items-center flex-1 bg-white border border-gray-300 hover:bg-gray-50 text-gray-800 py-3 px-4 rounded font-medium transition-colors"
                        >
                            <HomeIcon class="w-6 h-6 mr-2" />
                            Back to Home
                        </Link>
                    </div>

                    <div class="mt-6 text-center">
                        <p class="text-gray-500 text-sm">
                            Need help?
                            <a href="#" class="text-blue-600 hover:underline"
                                >Contact our support team</a
                            >
                        </p>
                    </div>
                </div>
            </div>

            <!-- Rental Tips -->
            <div class="mt-8 bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-4">
                        Helpful Tips for Your Rental
                    </h2>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-medium mb-2 flex items-center">
                                <WrenchScrewdriverIcon
                                    class="w-4 h-4 text-blue-500 mr-2"
                                />
                                Fuel Policy
                            </h4>
                            <p class="text-gray-600">
                                Return the vehicle with the same amount of fuel
                                as when received. We provide a full tank at
                                pickup.
                            </p>
                        </div>
                        <div>
                            <h4 class="font-medium mb-2 flex items-center">
                                <ClockIcon class="w-4 h-4 text-blue-500 mr-2" />
                                Late Returns
                            </h4>
                            <p class="text-gray-600">
                                Please contact us if you'll be late. Additional
                                charges may apply for unauthorized late returns.
                            </p>
                        </div>
                        <div>
                            <h4 class="font-medium mb-2 flex items-center">
                                <NoSymbolIcon
                                    class="w-4 h-4 text-blue-500 mr-2"
                                />
                                Restrictions
                            </h4>
                            <p class="text-gray-600">
                                This vehicle cannot be driven outside the state
                                without prior authorization.
                            </p>
                        </div>
                        <div>
                            <h4 class="font-medium mb-2 flex items-center">
                                <QuestionMarkCircleIcon
                                    class="w-4 h-4 text-blue-500 mr-2"
                                />
                                Questions?
                            </h4>
                            <p class="text-gray-600">
                                Review our
                                <a
                                    href="#"
                                    class="text-blue-600 hover:underline"
                                    >FAQs</a
                                >
                                or
                                <a
                                    href="#"
                                    class="text-blue-600 hover:underline"
                                    >contact us</a
                                >
                                for assistance.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </UserLayout>
</template>

<style scoped></style>
