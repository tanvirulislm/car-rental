<template>
    <div class="flex h-screen overflow-hidden bg-gray-100 dark:bg-gray-900">
        <!-- Sidebar -->
        <TheSidebar :is-collapsed="isSidebarCollapsed" />

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <TheHeader @toggle-sidebar="toggleSidebar" />

            <!-- Main Content Area -->
            <DashboardContent />
        </div>
    </div>
</template>

<script setup>
import DashboardContent from "@/Components/Admin/DashboardContent.vue";
import TheHeader from "@/Components/Admin/TheHeader.vue";
import TheSidebar from "@/Components/Admin/TheSidebar.vue";
import { ref } from "vue";

const isSidebarCollapsed = ref(false);

const toggleSidebar = () => {
    isSidebarCollapsed.value = !isSidebarCollapsed.value;
};

// Add dark mode handling if needed, potentially using VueUse or a simple ref
// import { useDark, useToggle } from '@vueuse/core';
// const isDark = useDark();
// const toggleDark = useToggle(isDark);
</script>
