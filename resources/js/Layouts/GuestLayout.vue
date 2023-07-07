<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {Link} from '@inertiajs/vue3';
</script>

<template>
    <v-app>
        <v-main class="bg-gray-100">
            <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                <div>
                    <Link href="/">
                        <ApplicationLogo class="w-20 h-20 fill-current text-gray-500"/>
                    </Link>
                </div>

                <div class="text-center my-2 px-5 w-full sm:max-w-md">
                    <h1 class="text-2xl text-gray-700 font-bold mb-1">
                        <slot name="header"/>
                    </h1>
                    <p class="text-lg text-gray-500">
                        <slot name="subheader"/>
                    </p>
                </div>

                <div
                    class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-md overflow-hidden sm:rounded-lg"
                >
                    <slot/>
                </div>
                <div>
                    <slot name="footer"/>
                </div>
            </div>
        </v-main>
    </v-app>
</template>

