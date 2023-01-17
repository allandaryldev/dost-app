<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';
import { nextTick, ref } from "vue";

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.value.auth.user;

const form = useForm({
    // name: user.name,
    // email: user.email,
    ...user
});

const departments = ref(["ITSM", "RSTL", "FAS", "ORD", "COA"]);
const user_roles = ref(["admin", "regular"]);
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Profile Information</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your account's profile information and email address.
            </p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
            <div class="grid sm:grid-cols-3 grid-cols-1 gap-2 w-full">
                    <div class="mt-4">
                        <InputLabel for="first_name" value="First Name" />

                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.first_name"
                            id="first_name"
                            autocomplete="first_name"
                        ></v-text-field>

                        <InputError
                            class="mt-2"
                            :message="form.errors.first_name"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="middle_name" value="Middle Name" />

                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.middle_name"
                            id="middle_name"
                            autocomplete="middle_name"
                        ></v-text-field>

                        <InputError
                            class="mt-2"
                            :message="form.errors.middle_name"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="last_name" value="Last Name" />

                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.last_name"
                            id="last_name"
                            autocomplete="last_name"
                        ></v-text-field>

                        <InputError
                            class="mt-2"
                            :message="form.errors.last_name"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="bday" value="Birthday" />
                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.bday"
                            id="bday"
                            type="date"
                            autocomplete="bday"
                        ></v-text-field>

                        <InputError class="mt-2" :message="form.errors.bday" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="brgy" value="Barangay" />

                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.city_mun"
                            id="brgy"
                            autocomplete="brgy"
                        ></v-text-field>

                        <InputError class="mt-2" :message="form.errors.brgy" />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="city_mun"
                            value="City or Municipality"
                        />

                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.city_mun"
                            id="city_mun"
                            autocomplete="city_mun"
                        ></v-text-field>

                        <InputError
                            class="mt-2"
                            :message="form.errors.city_mun"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="prov" value="Province" />

                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.prov"
                            id="prov"
                            autocomplete="prov"
                        ></v-text-field>


                        <InputError class="mt-2" :message="form.errors.prov" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="contact_no" value="Contact Number" />


                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.contact_no"
                            id="contact_no"
                            autocomplete="contact_no"
                        ></v-text-field>

                        <InputError
                            class="mt-2"
                            :message="form.errors.contact_no"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email" />
                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.email"
                            id="email"
                            type="email"
                            autocomplete="email"
                        ></v-text-field>


                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="dept" value="Department" />

                        <v-select
                            density="compact"
                            :items="departments"
                            v-model="form.dept"
                            name="dept"
                            id="dept"
                            class="w-full"
                            variant="outlined"
                            :readonly="form.type === 'regular'"
                        ></v-select>
                        <InputError class="mt-2" :message="form.errors.dept" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="sss" value="SSS Number" />
                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.sss"
                            id="sss"
                            type="number"
                        ></v-text-field>


                        <InputError class="mt-2" :message="form.errors.sss" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="tin" value="TIN" />
                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.tin"
                            id="tin"
                            type="number"
                        ></v-text-field>


                        <InputError class="mt-2" :message="form.errors.tin" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="philhealth" value="Philhealth" />


                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.philhealth"
                            id="philhealth"
                            type="number"
                            @click:append="show1 = !show1"
                        ></v-text-field>
                        <InputError
                            class="mt-2"
                            :message="form.errors.philhealth"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="user_type" value="User Type" />

                        <v-select
                            density="compact"
                            :items="user_roles"
                            name="user_type"
                            id="user_type"
                            v-model="form.type"
                            class="w-full"
                            variant="outlined"
                            :readonly="form.type === 'regular'"
                        ></v-select>

                        <InputError class="mt-2" :message="form.errors.type" />
                    </div>


                </div>

            <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-800">
                    Your email address is unverified.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Click here to re-send the verification email.
                    </Link>
                </p>

                <div
                    v-show="props.status === 'verification-link-sent'"
                    class="mt-2 font-medium text-sm text-green-600"
                >
                    A new verification link has been sent to your email address.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition enter-from-class="opacity-0" leave-to-class="opacity-0" class="transition ease-in-out">
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
