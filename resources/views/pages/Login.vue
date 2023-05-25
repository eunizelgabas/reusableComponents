<template layout="default">
    <div class="w-full max-w-xs mx-auto mt-6">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
          <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Username
                </label>
                <input  v-model="form.username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
                <div class="text-sm text-red-500 italic" v-if="form.errors.username">{{ form.errors.username }}</div>
            </div>
          <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
                </label>
                <input v-model="form.password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
                <div class="text-sm text-red-500 italic" v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>
          <div class="flex items-center justify-between">
                <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Log In
                </button>
                <a class="inline-block align-baseline font-bold text-sm text-purple-500 hover:text-purple-800" href="#">
                Forgot Password?
                </a>
          </div>
          <div class="text-sm text-red-500 italic" v-if="form.errors.authentication">{{ form.errors.authentication }}</div>
        </form>
      </div>

</template>

<script setup>
import {useForm} from '@inertiajs/inertia-vue3'

let form = useForm({
    'username': '',
    'password': ''
})

let submit = () => {
    form.post('/login')
}

</script>

