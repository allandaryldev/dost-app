<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Card from "@/Components/Card.vue";
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
defineProps({
    data: Array,
});

const user_roles = ref(["admin", "regular"]);


let updateDialog = ref({
    active: false,
    data: [],
});
let deleteDialog = ref({
    active: false,
    data: [],
});
let updateD = ref(false);
let deleteD = ref(false);
const setUpdateDialog = async (active, data) => {
    setDialog("update", active);
    updateDialog = {
        active,
        data: { ...data },
    };
};

const setDeleteDialog = async (active, data) => {
    setDialog("delete", active);
    deleteDialog = {
        active,
        data: { ...data },
    };
};
const setDialog = (type, active) => {
    if (type === "update") updateD.value = active;
    if (type === "delete") deleteD.value = active;
};

const form = useForm({
    type: "",
});
const submitUpdate = () => {
    const { data } = updateDialog;

    form.patch(route("update.user",data.id)  , {
        // onFinish: () => form.reset("password", "password_confirmation"),
    });
    setDialog('update',false)
};
const submitDelete = () => {
    const { data } = deleteDialog;

    form.delete(route("delete.user",data.id)  , {
    });
    setDialog('delete',false)
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <Card  v-if="$page.props.auth.user.type === 'admin'">
            <v-table fixed-header height="300px">
                <thead>
                    <tr>
                        <th class="text-left">Name</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">User Role</th>
                        <th class="text-left"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in data" :key="index">
                        <td class="capitalize">
                            {{ user.last_name }} {{ user.first_name }}
                        </td>
                        <td class="">{{ user.email }}</td>
                        <td class="uppercase">{{ user.type }}</td>
                        <td class="space-x-2">
                            <v-btn
                                color="success"
                                size="small"
                                @click="setUpdateDialog(true, user)"
                                >Edit</v-btn
                            >
                            <v-btn color="red" size="small" @click="setDeleteDialog(true, user)">delete</v-btn>
                        </td>
                    </tr>
                </tbody>
            </v-table>
        </Card>
        <Card  v-else>
            You're logged In
        </Card>
    </AuthenticatedLayout>

    <Modal :show="updateD">
        <v-card>
            <v-card-text>
                <div class="mt-4">
                    <InputLabel
                        for="user_type"
                        :value="`Update ${updateDialog.data.last_name} ${updateDialog.data.first_name} User Type`"
                    />

                    <div class="text-lg py-4">
                        <p>
                            Current User Type
                            <span class="font-bold">
                                {{ updateDialog.data.type.toUpperCase() }}</span
                            >
                        </p>
                    </div>

                    <InputLabel
                        for="user_type"
                        value="Select User Type"
                    />
                    <v-select
                        density="compact"
                        :items="user_roles"
                        name="user_type"
                        id="user_type"
                        v-model="form.type"
                        class="w-full"
                        variant="outlined"
                    ></v-select>
                </div>
            </v-card-text>
            <v-card-actions>
                <v-btn color="red" @click="submitUpdate" variant="outlined"
                    >Update</v-btn
                >
                <v-btn color="orange" @click="setDialog('delete', false)"
                    >Close Dialog</v-btn
                >
            </v-card-actions>
        </v-card>
    </Modal>
    <Modal :show="deleteD">
        <v-card>
            <v-card-text>
                Are You Sure to <b>Delete</b> this user?
                This action cannot be undone
            </v-card-text>
            <v-card-actions>
                <v-btn color="red" @click="submitDelete" variant="outlined"
                    >Delete</v-btn
                >
                <v-btn color="orange" @click="setDialog('delete', false)"
                    >Close Dialog</v-btn
                >
            </v-card-actions>
        </v-card>
    </Modal>


</template>

<script>
//   export default {
//     data () {
//       return {
//         updateD: true,
//       }
//     },
//   }
</script>
