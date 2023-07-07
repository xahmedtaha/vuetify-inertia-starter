<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import {ref} from "vue";

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const passwordVisible = ref(false);
const passwordConfirmationVisible = ref(false);

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Reset Password" />

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
            <v-text-field
                density="compact"
                class="mt-2"
                :append-inner-icon="passwordVisible ? 'mdi-eye-off' : 'mdi-eye'"
                :type="passwordVisible ? 'text' : 'password'"
                placeholder="Enter your password"
                variant="outlined"
                label="Password"
                v-model="form.password"
                :error-messages="form.errors.password"
                required
                autocomplete="new-password"
                @click:append-inner="passwordVisible = !passwordVisible"
            ></v-text-field>

            <v-text-field
                density="compact"
                class="mt-2"
                :append-inner-icon="passwordConfirmationVisible ? 'mdi-eye-off' : 'mdi-eye'"
                :type="passwordConfirmationVisible ? 'text' : 'password'"
                placeholder="Confirm your password"
                variant="outlined"
                label="Password confirmation"
                v-model="form.password_confirmation"
                :error-messages="form.errors.password_confirmation"
                required
                autocomplete="new-password"
                @click:append-inner="passwordConfirmationVisible = !passwordConfirmationVisible"
            ></v-text-field>

            <v-btn type="submit" color="teal" block :loading="form.processing" class="mt-2">
                Reset Password
            </v-btn>
        </form>
    </GuestLayout>
</template>
