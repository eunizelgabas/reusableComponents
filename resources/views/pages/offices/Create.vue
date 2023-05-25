<template layout="default">
    <h1>Create Offices</h1>
    <hr>
     <div class="w-[600px] shadow p-4 mx-auto mt-5">
         <form @submit.prevent="submit">

                 <div class="w-full  px-3 mb-3">
                     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name" >
                     Name
                     </label>
                     <input v-model="form.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" type="text">
                     <div class="text-sm text-red-500 italic" v-if="form.errors.name">{{ form.errors.name }}</div>
                 </div>

                    <div class="w-full  px-3 mb-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="building">
                            Building
                        </label>
                        <input v-model="form.building" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="building" type="text">
                        <div class="text-sm text-red-500 italic" v-if="form.errors.building">{{ form.errors.builiding }}</div>
                    </div>
                    <div class="w-full px-3">
                        <label label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="user_id">Office In-charge</label>
                        <select id="user_id" name="user_id"  v-model="form.user_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text">
                            <option value="">Select a user</option>
                            <option v-for="user in users" :value="user.id" :key="user.id"> {{ user.fullname }}</option>
                        </select>
                        <div class="text-sm text-red-500 italic" v-if="form.errors.user_id">{{ form.errors.user_id }}</div>
                    </div>
                    <div class="w-full px-3">
                        <button class="btn-primary mt-2 py-3" type="submit">
                            Create Offices
                        </button>
                    </div>

           </form>
     </div>
 </template>
 <script setup>
 import {useForm} from '@inertiajs/inertia-vue3'

 let form = useForm({
     name: '',
     building:'',
     user_id:'',
 })

 let props = defineProps({
    offices: Array,
    users: Object
})

 const submit = () =>{
     form.post('/offices')
 }
 </script>
