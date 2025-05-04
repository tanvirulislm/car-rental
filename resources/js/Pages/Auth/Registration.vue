<script setup>
import { Link, router, useForm } from "@inertiajs/vue3";
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster();

const form = useForm({
    name: "",
    email: "",
    role: "",
    password: "",
    confirmPassword: "",
});

function submit() {
    if (!form.name) {
        toaster.error("Username is required");
        return;
    }
    if (!form.email) {
        toaster.error("Email is required");
        return;
    }
    if (!form.password) {
        toaster.error("Password is required");
        return;
    }
    if (form.password !== form.confirmPassword) {
        toaster.error("Passwords do not match");
        return;
    }

    form.post("/user-registration", {
        onSuccess: () => {
            toaster.success("Registration successful! Redirecting to login...");
            router.push("/user-login");
        },
        onError: (errors) => {
            if (errors.username) toaster.error(errors.username[0]);
            if (errors.email) toaster.error(errors.email[0]);
            if (errors.password) toaster.error(errors.password[0]);
        },
    });
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
                Register for Car Rental
            </h2>
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label
                        for="fullName"
                        class="block text-sm font-medium text-gray-700"
                        >Full Name</label
                    >
                    <div class="mt-1 relative">
                        <input
                            type="text"
                            id="fullName"
                            name="fullName"
                            required
                            class="w-full px-3 py-1.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                            v-model="form.name"
                        />
                        <UserIcon
                            class="h-5 w-5 text-gray-400 absolute right-3 top-2.5"
                        />
                    </div>
                </div>
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                        >Email Address</label
                    >
                    <div class="mt-1 relative">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="w-full px-3 py-1.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                            v-model="form.email"
                        />
                        <at-symbol-icon
                            class="h-5 w-5 text-gray-400 absolute right-3 top-2.5"
                        />
                    </div>
                </div>
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                        >Role</label
                    >
                    <div class="mt-1 relative">
                        <select
                            id="role"
                            name="role"
                            class="w-full px-3 py-1.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                            v-model="form.role"
                        >
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >Password</label
                    >
                    <div class="mt-1 relative">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            class="w-full px-3 py-1.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                            v-model="form.password"
                        />
                        <LockClosedIcon
                            class="h-5 w-5 text-gray-400 absolute right-3 top-2.5"
                        />
                    </div>
                </div>
                <div class="mb-6">
                    <label
                        for="confirmPassword"
                        class="block text-sm font-medium text-gray-700"
                        >Confirm Password</label
                    >
                    <div class="mt-1 relative">
                        <input
                            type="password"
                            id="confirmPassword"
                            name="confirmPassword"
                            required
                            class="w-full px-3 py-1.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500"
                            v-model="form.confirmPassword"
                        />
                        <LockClosedIcon
                            class="h-5 w-5 text-gray-400 absolute right-3 top-2.5"
                        />
                    </div>
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-1.5 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Register
                </button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Already have an account?
                <Link href="/login" class="text-blue-600 hover:underline"
                    >Log in</Link
                >
            </p>
        </div>
    </div>
</template>

<style scoped></style>
