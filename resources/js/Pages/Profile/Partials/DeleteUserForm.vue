<script setup>
import { useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);
const passwordVisible = ref(false);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Delete Account</h2>

            <p class="mt-1 text-sm text-gray-600">
                Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
                your account, please download any data or information that you wish to retain.
            </p>
        </header>

        <v-btn color="red-darken-2" variant="flat" @click="confirmUserDeletion">Delete Account</v-btn>

        <v-dialog
            v-model="confirmingUserDeletion"
            class="max-w-2xl"
        >
            <v-card>
                <v-card-item>
                    <v-card-title>
                        Delete your account ?
                    </v-card-title>
                </v-card-item>
                <v-card-text>
                    <p class="text-sm text-gray-600">
                        Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
                        your account, please download any data or information that you wish to retain.
                    </p>
                    <v-text-field
                        class="my-5"
                        density="compact"
                        ref="passwordInput"
                        :append-inner-icon="passwordVisible ? 'mdi-eye-off' : 'mdi-eye'"
                        :type="passwordVisible ? 'text' : 'password'"
                        placeholder="Enter your password"
                        variant="outlined"
                        label="Password"
                        v-model="form.password"
                        :error-messages="form.errors.password"
                        required
                        @click:append-inner="passwordVisible = !passwordVisible"
                        @keyup.enter="deleteUser"
                    ></v-text-field>
                </v-card-text>

               <v-toolbar>
                   <v-card-actions class="w-full justify-end">
                       <v-btn variant="text" @click="closeModal">Cancel</v-btn>
                       <v-btn color="red-darken-2" variant="flat" @click="deleteUser" :loading="form.processing">Confirm</v-btn>
                   </v-card-actions>
               </v-toolbar>
            </v-card>
        </v-dialog>
    </section>
</template>
