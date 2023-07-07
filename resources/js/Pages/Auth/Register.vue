<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from "vue";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const passwordVisible = ref(false);
const passwordConfirmationVisible = ref(false);

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <template #header>Register</template>
        <template #subheader>Create a new account</template>

        <v-form @submit.prevent="submit">
            <v-text-field
                autofocus
                density="compact"
                placeholder="Enter your name"
                variant="outlined"
                label="Name"
                v-model="form.name"
                :error-messages="form.errors.name"
                required
                autocomplete="name"
            ></v-text-field>
            <v-text-field
                density="compact"
                class="mt-2"
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
            <v-btn class="mt-5" type="submit" color="teal" block :loading="form.processing">
                Create Account
            </v-btn>
        </v-form>

        <template #footer>
            <p class="text-sm px-5 text-center pt-12 items-center flex">
                <span class="text-gray-400">Already registered?</span> <v-btn class="link-btn ms-2" variant="text" color="teal" density="compact" :to="route('login')">Login</v-btn>
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
