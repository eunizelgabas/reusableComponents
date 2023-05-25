<template layout>
    <div class="py-4">
        <h1>List of Items</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Serial #</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Office</th>
                    <th>Value</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item of items" :key="item.id">
                    <td>{{ ('00000000' + item.id).slice(-8) }}</td>
                    <td>{{ item.name }}</td>
                    <td>{{ item.description }}</td>
                    <td>{{ item.office.name }}</td>
                    <td>{{ item.value }}</td>
                    <td>{{ item.status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>

defineProps({
    'items':Array
})

</script>
