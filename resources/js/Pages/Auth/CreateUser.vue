<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Dropdown from "@/Components/Dropdown.vue";
import Card from "@/Components/Card.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { nextTick,  onMounted, onUnmounted,ref } from "vue";

defineProps({
    user_data: Array,
});

const el = ref()


const form = useForm({
    first_name: "",
    last_name: "",
    middle_name: "",
    bday: "",
    brgy: "",
    city_mun: "",
    dept: "",
    prov: "",
    contact_no: "",
    email: "",
    password: "",
    password_confirmation: "",
    sss: "",
    tin: "",
    philhealth: "",
    type: "",
    terms: false,
});



const departments = ref(["ITSM", "RSTL", "FAS", "ORD", "COA"]);
const user_roles = ref(["admin", "regular"]);
const show = ref(false);
const show1 = ref(false);

const submit = () => {
    form.post(route("store.user"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};


</script>

<template>
    <AuthenticatedLayout>
        <Head title="Create" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create User
            </h2>
        </template>

        <Card>
            <form @submit.prevent="submit" class=" ">
                <div class="grid sm:grid-cols-1 md:grid-cols-3 gap-2 w-full">
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
                            v-model="form.brgy"
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
                        ></v-select>

                        <InputError class="mt-2" :message="form.errors.type" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" value="Password" />
                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.password"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show1 ? 'text' : 'password'"
                            id="password"
                            @click:append="show1 = !show1"
                            autocomplete="new-password"
                        ></v-text-field>

                        <InputError
                            class="mt-2"
                            :message="form.errors.password"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="password_confirmation"
                            value="Confirm Password"
                        />

                        <v-text-field
                            density="compact"
                            variant="outlined"
                            v-model="form.password_confirmation"
                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show1 ? 'text' : 'password'"
                            id="password_confirmation"
                            @click:append="show1 = !show1"
                            autocomplete="new-password"
                        ></v-text-field>


                        <InputError
                            class="mt-2"
                            :message="form.errors.password_confirmation"
                        />
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton
                        class="ml-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Create User
                    </PrimaryButton>
                </div>
            </form>
        </Card>
        {{ user_data }}
    </AuthenticatedLayout>
</template>
