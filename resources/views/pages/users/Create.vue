<template layout="default">
    <h1>Create User</h1>
    <hr>
     <div class="w-[600px] shadow p-4 mx-auto mt-5">
         <form @submit.prevent="submit">

                 <div class="w-full  px-3 mb-3">
                     <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="username" >
                     User Name
                     </label>
                     <input v-model="form.username" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="username" type="text">
                     <div class="text-sm text-red-500 italic" v-if="form.errors.username">{{ form.errors.username }}</div>
                 </div>

                    <div class="w-full  px-3 mb-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                            Password
                        </label>
                        <input v-model="form.password" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="password" type="password">
                        <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}</div>
                    </div>

                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="fullname">
                        Full Name
                        </label>
                        <input v-model="form.fullname"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="fullname" type="text">
                        <div class="text-sm text-red-500 italic" v-if="form.errors.fullname">{{ form.errors.fullname }}</div>
                    </div>

                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="designation">
                    Designation
                    </label>
                    <input v-model="form.designation" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="designation" type="text">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.designation">{{ form.errors.designation }}</div>
                </div>

                 <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="department">
                        Department
                    </label>
                    <input v-model="form.department"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="department" type="text">
                    <div class="text-sm text-red-500 italic" v-if="form.errors.department">{{ form.errors.department }}</div>
                 </div>

             <div>
                 <button class="btn-primary " type="submit">
                     Create User
                 </button>
             </div>
           </form>
     </div>
 </template>
 <script setup>
 import {useForm} from '@inertiajs/inertia-vue3'

 let form = useForm({
     username: '',
     password:'',
     fullname:'',
     designation:'',
     department:''
 })

 const submit = () =>{
     form.post('/users')
 }
 </script>
