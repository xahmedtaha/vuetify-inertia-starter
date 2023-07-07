<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from "vue";

const form = useForm({
    password: '',
});

const passwordVisible = ref(false);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Confirm Password" />

        <template #subheader>
            This is a secure area of the application. Please confirm your password before continuing.
        </template>

        <form @submit.prevent="submit">
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
            <v-btn type="submit" color="teal" block :loading="form.processing" class="mt-2">
                Confirm
            </v-btn>
        </form>
    </GuestLayout>
</template>
