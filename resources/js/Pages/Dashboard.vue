<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineOptions({
    layout: (h, page) => h(AuthenticatedLayout, {title: 'Dashboard'}, () => page),
});
</script>

<template>
    <Head title="Dashboard" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">You're logged in!</div>
            </div>
        </div>
    </div>
</template>
