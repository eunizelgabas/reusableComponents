<template>
    <div class="overlay">

    </div>

    <div class="dialog-wrapper">

        <div class="dialog">
            <h3 class="text-3xl">{{title}}</h3>
            <hr class="border-purple-700">
            <div class="mt-4 text-center">
                {{message}}
            </div>
            <div class="flex justify-center space-x-2 mt-4">
                <button class="bg-purple-800 rounded p-2 text-white hover:bg-purple-700" @click="$emit('confirm')">Confirm</button>
                <button class="bg-red-800 rounded p-2 text-white hover:bg-red-700" @click="$emit('cancel')">Cancel</button>
            </div>
        </div>
    </div>
</template>

<script setup>

 let props = defineProps({
    title: '',
    message: ''
})
</script>
