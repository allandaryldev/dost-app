<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);
const show = ref(false);
const show1 = ref(false);
const show2 = ref(false);

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const updatePassword = () => {
    form.put(route("password.update"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset("current_password");
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
                Ensure your account is using a long, random password to stay
                secure.
            </p>
        </header>

        <form @submit.prevent="updatePassword" class="mt-6 space-y-6">
            <div class="mt-4">
                <InputLabel for="current_password" value="Current Password" />
                <v-text-field
                    density="compact"
                    variant="outlined"
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="show1 ? 'text' : 'password'"
                    @click:append="show1 = !show1"
                    autocomplete="current-password"
                ></v-text-field>

                <InputError class="mt-2" :message="form.errors.current_password" />
            </div>
            <div class="mt-4">
                <InputLabel for="password" value="New Password" />
                <v-text-field
                    density="compact"
                    variant="outlined"
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="show1 ? 'text' : 'password'"
                    @click:append="show1 = !show1"
                    autocomplete="new-password"
                ></v-text-field>

                <InputError class="mt-2" :message="form.errors.current_password" />
            </div>
            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <v-text-field
                    density="compact"
                    variant="outlined"
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                    :type="show1 ? 'text' : 'password'"
                    @click:append="show1 = !show1"
                    autocomplete="new-password"
                ></v-text-field>

                <InputError class="mt-2" :message="form.errors.current_password" />
            </div>


            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Saved.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
