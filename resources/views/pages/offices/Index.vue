<template layout>

    <ConfirmDialog v-if="showConfirm"
            title="Delete Office?"
            message="Are you sure about deleting this office file?"
            @cancel="cancelDelete()"
            @confirm="confirmDelete()">

    </ConfirmDialog>

    <ErrorMessage v-if="errorConfirm"
        title="General Error"
        :message="errors.GeneralErrors"
        @confirm="deleteOffice()">
    </ErrorMessage>

    <!-- <div class="bg-red-700 text-white p-4 rounded-lg my-3" v-if="errors.GeneralErrors">
        {{ errors.GeneralErrors }}
    </div> -->

    <div class="flex justify-between">
     <h1>List of Offices</h1>
     <Link href="/offices/create" class="btn-primary" >Add Office</Link>
    </div>
     <hr>

     <table class="table">
         <thead>
             <tr>
                 <th>Serial #</th>
                 <th>Name</th>
                 <th>Building</th>
                 <th>In-charge</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>
             <tr v-for="office in offices" :key="office.id">
                 <td>{{ ('00000000' + office.id) }}</td>
                 <td>{{ office.name }}</td>
                 <td>{{ office.building }}</td>
                 <td>{{ office.user.fullname }}</td>
                 <td class="text-center">
                    <Link :href=" '/offices/edit/' + office.id " class="btn-primary p-3">Edit</Link>
                    <button class="bg-red-700 px-2 rounded p-2 text-white ml-4" @click="remove(office)">Delete</button>
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
let selectedOfficeForDelete = null

let errorConfirm = ref(false)
let infoConfirm = ref(false)

 let errorMessage = ref(false);

 defineProps({
     offices: Array,
     errors: null,
 })

 let deleteForm =  useForm();
 let confirmForm = useForm();

 function remove(office){
    selectedOfficeForDelete = office
    showConfirm.value = true;
 }

 function cancelDelete() {
    showConfirm.value = false;
 }

 function confirmDelete(){
    confirmForm.delete('/offices/' +selectedOfficeForDelete.id);
    errorConfirm.value = true;

    // if(offices.items_count>0){
    //     errorConfirm.value = true;
    // }
 }

 function deleteOffice(){
    errorConfirm.value = false;
    showConfirm.value = false;

 }

//  function confirmOffice(){
//     showConfirm.value = false;
//     infoConfirm.value = false;
//  }
 </script>
