<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />
        <template #header>Forgot your password?</template>
        <template #subheader>
            We will email you a password reset
            link.
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <v-text-field
                autofocus
                density="compact"
                placeholder="Enter your email address"
                variant="outlined"
                label="Email"
                v-model="form.email"
                :error-messages="form.errors.email"
                type="email"
                required
                autocomplete="username"
            ></v-text-field>
            <v-btn type="submit" color="teal" block :loading="form.processing" class="mt-2">
                Email Password Reset Link
            </v-btn>
        </form>

        <template #footer>
            <p class="text-sm px-5 text-center pt-12 items-center flex">
                <span class="text-gray-400">Remembered your password?</span> <v-btn class="link-btn ms-2" variant="text" color="teal" density="compact" :to="route('login')">Login</v-btn>
            </p>
        </template>
    </GuestLayout>
</template>

<style>
.link-btn {
    text-transform: none !important;
    letter-spacing: normal !important;
    font-size: 0.875rem !important;
    padding: 0 !important;
}
</style>
