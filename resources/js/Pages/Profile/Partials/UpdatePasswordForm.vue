<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const currentPasswordVisible = ref(false);
const passwordVisible = ref(false);
const passwordConfirmationVisible = ref(false);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('password.update'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Update Password</h2>

            <p class="mt-1 text-sm text-gray-600">
                Ensure your account is using a long, random password to stay secure.
            </p>
        </header>

        <form @submit.prevent="updatePassword" class="mt-6 space-y-3">
            <v-text-field
                ref="currentPasswordInput"
                density="compact"
                :append-inner-icon="currentPasswordVisible ? 'mdi-eye-off' : 'mdi-eye'"
                :type="currentPasswordVisible ? 'text' : 'password'"
                placeholder="Enter your current password"
                variant="outlined"
                label="Current Password"
                v-model="form.current_password"
                :error-messages="form.errors.current_password"
                required
                autocomplete="current-password"
                @click:append-inner="currentPasswordVisible = !currentPasswordVisible"
            ></v-text-field>

            <v-text-field
                density="compact"
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

            <div class="flex items-center gap-4">
                <v-btn variant="flat" type="submit" color="teal" :loading="form.processing">
                    Save
                </v-btn>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
