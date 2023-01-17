<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Dropdown from "@/Components/Dropdown.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { nextTick, ref } from "vue";

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

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="p-6">
            <form @submit.prevent="submit" class=" ">
                <div class="grid grid-cols-3 gap-2 w-full">
                    <div class="mt-4">
                        <InputLabel for="first_name" value="First Name" />

                        <TextInput
                            id="first_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.first_name"
                            required
                            autofocus
                            autocomplete="first_name"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.first_name"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="middle_name" value="Middle Name" />

                        <TextInput
                            id="middle_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.middle_name"
                            required
                            autofocus
                            autocomplete="middle_name"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.middle_name"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="last_name" value="Last Name" />

                        <TextInput
                            id="last_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.last_name"
                            required
                            autofocus
                            autocomplete="last_name"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.last_name"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="bday" value="Birthday" />

                        <TextInput
                            id="bday"
                            type="date"
                            class="mt-1 block w-full"
                            v-model="form.bday"
                            required
                            autofocus
                        />

                        <InputError class="mt-2" :message="form.errors.bday" />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="brgy" value="Barangay" />

                        <TextInput
                            id="brgy"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.brgy"
                            required
                            autofocus
                        />

                        <InputError class="mt-2" :message="form.errors.brgy" />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="city_mun"
                            value="City or Municipality"
                        />

                        <TextInput
                            id="city_mun"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.city_mun"
                            required
                            autofocus
                            autocomplete=""
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.city_mun"
                        />
                    </div>
                    <div class="mt-4">
                        <InputLabel for="prov" value="Province" />

                        <TextInput
                            id="prov"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.prov"
                            required
                            autofocus
                        />

                        <InputError class="mt-2" :message="form.errors.prov" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="contact_no" value="Contact Number" />

                        <TextInput
                            id="contact_no"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.contact_no"
                            required
                            autofocus
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.contact_no"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Email" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
                            autocomplete="username"
                        />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="dept" value="Department" />

                        <!-- <Dropdown
                    id="dept"
                    class="mt-1 block w-full"
                    v-model="form.dept"
                >
                    <div v-for="(dept,index) in departments" :key="index" id="content" class="h-20 w-20">
                        {{ dept }}
                    </div>

                </Dropdown> -->
                        <select
                            name="dept"
                            id="dept"
                            v-model="form.dept"
                            class="w-full"
                        >
                            <option
                                v-for="(dept, index) in departments"
                                :key="index"
                                :value="dept"
                            >
                                {{ dept }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.dept" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="sss" value="SSS Number" />

                        <TextInput
                            id="sss"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.sss"
                            required
                            autofocus
                        />

                        <InputError class="mt-2" :message="form.errors.sss" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="tin" value="TIN" />

                        <TextInput
                            id="tin"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.tin"
                            required
                            autofocus
                        />

                        <InputError class="mt-2" :message="form.errors.tin" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="philhealth" value="Philhealth" />

                        <TextInput
                            id="philhealth"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="form.philhealth"
                            required
                            autofocus
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.philhealth"
                        />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="user_type" value="User Type" />

                        <!-- <Dropdown
                    id="user_type"
                    class="mt-1 block w-full"
                    v-model="form.user_type"
                    required
                /> -->
                        <select
                            name="user_type"
                            id="user_type"
                            v-model="form.type"
                            class="w-full"
                        >
                            <option
                                v-for="(role, index) in user_roles"
                                :key="index"
                                :value="role"
                            >
                                {{ role.toUpperCase() }}
                            </option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.type" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password"
                            required
                            autocomplete="new-password"
                        />

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

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />

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
        </div>
    </GuestLayout>
</template>
