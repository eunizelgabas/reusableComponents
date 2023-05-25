<template layout="default">
    <MessageBox v-if="showMessage"
        title="Message"
        :message="mess"
        @confirm="show()">

    </MessageBox>
    <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">Input any text:</div>
          <input v-model="mess" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-dark" id="name" type="text">
          <button class="bg-purple-700 px-4 rounded p-2 text-white ml-4 mt-2" @click="start">Show Message</button>

        </div>
      </div>
</template>

<script setup>
import { ref } from 'vue'
import { Link, usePage } from '@inertiajs/inertia-vue3'
import MessageBox from '@/views/components/message-box.vue';
import {useForm} from '@inertiajs/inertia-vue3'


const props = defineProps({
    mess:''
})

const user = usePage().props.auth

console.log(user)
let showMessage = ref(false)
let mess = ref('');

function start(){
    showMessage.value = true;
 }

 function show() {
    showMessage.value = false;
    mess.value = ''
 }
</script>
