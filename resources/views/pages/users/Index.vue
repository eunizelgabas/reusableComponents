<template layout>
    <ConfirmDialog v-if="showConfirm"
    title="Delete User?"
    message="Are you sure about deleting this office file?"
    @cancel="cancelDelete()"
    @confirm="confirmDelete()">
    </ConfirmDialog>

    <ErrorMessage v-if="errorConfirm"
    title="General Error"
    :message="errors.GeneralErrors"
    @confirm="deleteUser()">
    </ErrorMessage>

    <InfoMessage v-if="infoConfirm"
    title="Delete Successfully"
    :message="message"
    @confirm="deleteUser()"
    >
    </InfoMessage>

    <div class="flex justify-between">
        <h1>List of Users</h1>
        <Link href="/users/create" class="btn-primary">Create User</Link>
    </div>
    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>Serial #</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user of users" :key="user.id">
                <td>
                    {{ ('00000000' + user.id).slice(-8) }}
                </td>
                <td>{{ user.fullname }}</td>
                <td>{{ user.designation }}</td>
                <td>{{ user.department }}</td>
                <td>
                    <Link :href=" '/users/edit/' + user.id " class="btn-primary p-3">Edit</Link>
                    <button class="bg-red-700 px-2 rounded p-2 text-white ml-4" @click="remove(user)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

</template>

<script setup>
import {Link, useForm} from '@inertiajs/inertia-vue3'
import { ref } from 'vue'
import ConfirmDialog from '@/views/components/confirm-dialog.vue';
import ErrorMessage from '@/views/components/error-message.vue';
import InfoMessage from '@/views/components/info-message.vue';

let showConfirm = ref(false);
let selectedUserForDelete = null

let errorConfirm = ref(false)
let infoConfirm = ref(false);

 let errorMessage = ref(false);


defineProps({
    users: Array,
    errors: null,
})

let form = useForm({
    username: '',
    password: '',
    fullname: '',
    designation: '',
    department: ''
})

function remove(user){
    selectedUserForDelete = user
    showConfirm.value = true;
 }

 function cancelDelete() {
    showConfirm.value = false;
 }

 function confirmDelete(){
    form.delete('/users/' +selectedUserForDelete.id);
    errorConfirm.value = true;

 }

 function deleteUser(){
    errorConfirm.value = false;
    showConfirm.value = false;
    infoConfirm.value = false;

 }
</script>
