<script setup>
import { Link, router, useForm } from "@inertiajs/vue3";
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster();
const form = useForm({
    email: "",
    password: "",
});

function submit() {
    form.post("/user-login", form.value, {
        onSuccess: () => {
            toaster.success("Login successful!");
            router.push("/");
        },
        onError: (errors) => {
            if (errors.message) {
                toaster.error(errors.message);
            } else {
                toaster.error("Something went wrong!");
            }
        },
    });
}
</script>

<template>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-semibold text-gray-800 text-center mb-6">
                Login to rent a Car
            </h2>
            <form @submit.prevent="submit">
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
                        ></at-symbol-icon>
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
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-1.5 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    Login
                </button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Don't have an account?
                <Link href="/registration" class="text-blue-600 hover:underline"
                    >Sign Up</Link
                >
            </p>
        </div>
    </div>
</template>

<style scoped></style>
