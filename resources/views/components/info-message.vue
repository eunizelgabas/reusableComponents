<template>
    <div class="ol">

    </div>

    <div class="di-wrapper">

        <div class="dialog">
            <h3 class="text-3xl">{{title}}</h3>
            <hr class="border-blue-700">
            <div class="mt-4 text-center">
                {{message}}
            </div>
            <div class="flex justify-center space-x-2 mt-4">
                <button class="bg-blue-800 rounded p-2 text-white hover:bg-blue-700" @click="$emit('confirm')">Confirm</button>
            </div>
        </div>
    </div>
</template>

<script setup>

 let props = defineProps({
    title: Object,
    message: String,
})
</script>
