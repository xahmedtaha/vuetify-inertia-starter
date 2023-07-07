<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, Link, router, useForm} from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const passwordVisible = ref(false);

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <template #header>Login</template>
        <template #subheader>Login to your account dashboard</template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <v-form @submit.prevent="submit">
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
                autocomplete="current-password"
                @click:append-inner="passwordVisible = !passwordVisible"
            ></v-text-field>

            <div class="flex flex-wrap items-center mb-5">
                <v-checkbox-btn
                    color="teal"
                    v-model:checked="form.remember"
                    density="compact"
                >
                    <template #label>
                        <span class="text-sm whitespace-nowrap">Remember me</span>
                    </template>
                </v-checkbox-btn>
                <v-btn v-if="canResetPassword" density="compact" :to="route('password.request')" class="link-btn" variant="plain">
                    Forgot password?
                </v-btn>
            </div>
            <v-btn type="submit" color="teal" block :loading="form.processing">
                Login
            </v-btn>
        </v-form>

        <template #footer v-if="canRegister">
            <p class="text-sm px-5 text-center pt-12 items-center flex">
                <span class="text-gray-400">Don't have an account?</span> <v-btn class="link-btn ms-2" variant="text" color="teal" density="compact" :to="route('register')">Register</v-btn>
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
