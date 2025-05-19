<template>
    <div>
        <div class="relative max-w-xs mb-2">
            <input
                v-model="searchTerm"
                type="text"
                placeholder="Search customers..."
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white dark:bg-gray-800 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
            />
            <div
                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
            >
                <MagnifyingGlassIcon class="h-5 w-5 text-gray-400" />
            </div>
        </div>

        <!-- Debugging info -->
        <div
            v-if="debug"
            class="mb-4 p-4 bg-yellow-100 border border-yellow-400 rounded"
        >
            <p>Customers received: {{ customerData.length }}</p>
            <p>
                First customer:
                {{
                    customerData.length > 0
                        ? JSON.stringify(customerData[0])
                        : "None"
                }}
            </p>
        </div>

        <!-- Manual table implementation instead of EasyDataTable -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            ID
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Name
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Email
                        </th>
                        <th
                            scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                        >
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr
                        v-for="customer in filteredCustomers"
                        :key="customer.id"
                    >
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                        >
                            {{ customer.id }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                        >
                            {{ customer.name }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                        >
                            {{ customer.email }}
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                        >
                            <div class="flex space-x-2">
                                <button
                                    @click="openEditModalDebug(customer)"
                                    class="text-indigo-600 hover:text-indigo-900"
                                    title="Edit"
                                >
                                    <PencilSquareIcon class="w-5 h-5" />
                                </button>
                                <button
                                    @click="confirmDeleteDebug(customer.id)"
                                    class="text-red-600 hover:text-red-900"
                                    title="Delete"
                                >
                                    <TrashIcon class="w-5 h-5" />
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div
            v-if="showEditModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
        >
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl w-full max-w-md mx-4 overflow-hidden border border-gray-200 dark:border-gray-700"
            >
                <div
                    class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600"
                >
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                        Edit Customer Details
                    </h2>
                </div>

                <form @submit.prevent="updateCustomer" class="p-6">
                    <div class="space-y-4">
                        <div>
                            <label
                                for="name"
                                class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                >Name</label
                            >
                            <input
                                v-model="form.name"
                                type="text"
                                id="name"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
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
                                for="email"
                                class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300"
                                >Email</label
                            >
                            <input
                                v-model="form.email"
                                type="email"
                                id="email"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            />
                            <div
                                v-if="form.errors.email"
                                class="text-red-500 text-sm mt-1"
                            >
                                {{ form.errors.email }}
                            </div>
                        </div>
                    </div>

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
                            :disabled="form.processing"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition disabled:opacity-75"
                        >
                            {{ form.processing ? "Saving..." : "Save Changes" }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, router, useForm } from "@inertiajs/vue3";
import { ref, computed, onMounted } from "vue";
import {
    MagnifyingGlassIcon,
    PencilSquareIcon,
    TrashIcon,
} from "@heroicons/vue/24/solid";

// Props
const props = defineProps({
    customers: Array,
});

// Debug mode
const debug = ref(false);

// Data
const searchTerm = ref("");
const showEditModal = ref(false);
const currentCustomerId = ref(null);
const customerData = ref([]);

const form = useForm({
    name: "",
    email: "",
});

// Process customers data on mount
onMounted(() => {
    // Make a copy of the customer data to avoid reactive issues
    customerData.value = props.customers ? [...props.customers] : [];
    console.log("Customer data loaded:", customerData.value);
});

// Computed
const filteredCustomers = computed(() => {
    if (!searchTerm.value || !customerData.value) {
        return customerData.value;
    }

    const term = searchTerm.value.toLowerCase();
    return customerData.value.filter(
        (customer) =>
            customer.name.toLowerCase().includes(term) ||
            customer.email.toLowerCase().includes(term)
    );
});

// Debug Methods
const openEditModalDebug = (customer) => {
    console.log("Opening edit modal for customer:", customer);
    if (!customer || !customer.id) {
        console.error("Invalid customer object:", customer);
        return;
    }

    currentCustomerId.value = customer.id;
    form.name = customer.name;
    form.email = customer.email;
    showEditModal.value = true;
};

const confirmDeleteDebug = (id) => {
    console.log("Confirming delete for ID:", id);
    if (!id) {
        console.error("Invalid ID for delete:", id);
        return;
    }

    if (confirm("Are you sure you want to delete this customer?")) {
        router.delete(`/customers/${id}`, {
            preserveScroll: true,
            onSuccess: () => {
                console.log("Customer deleted successfully");
                window.location.reload();
            },
            onError: (error) => {
                console.error("Delete error:", error);
                alert("Failed to delete customer. Please try again.");
            },
        });
    }
};

const closeModal = () => {
    showEditModal.value = false;
    form.reset();
    form.clearErrors();
};

const updateCustomer = () => {
    console.log("Updating customer:", currentCustomerId.value, form);

    form.put(`/customers/${currentCustomerId.value}`, {
        preserveScroll: true,
        onSuccess: () => {
            console.log("Customer updated successfully");
            closeModal();
            window.location.reload();
        },
        onError: (errors) => {
            console.error("Update errors:", errors);
        },
    });
};
</script>

<style scoped>
/* Optional: You can style modal transition here if needed */
</style>
