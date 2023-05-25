<template>
    <section class="bg-primary">
        <div class="wrapper flex justify-between">
            <div id="brand" class="text-lg text-white font-bold font-mono py-4">
                Inventory System
            </div>
            <nav class="main-nav">
                <Link class="main-link font-mono" href="/">Home</Link>
                <Link v-if="user" class="main-link font-mono" href="/users">Users</Link>
                <Link v-if="user" class="main-link font-mono" href="/offices">Offices</Link>
                <Link v-if="user" class="main-link font-mono" href="/items">Items</Link>
            </nav>
            <div class="flex">
                <Link v-if="!user" class="font-mono py-4 text-purple-100 font-semibold hover:bg-[#1f0025] duration-300 px-2" href="/login">Log In</Link>
                <Link v-if="user" class="font-mono py-4 text-purple-100 font-semibold hover:bg-[#1f0025] duration-300 px-2" href="/logout" method="post" as="button">Log Out</Link>
            </div>
        </div>
    </section>

    </template>

    <script setup>
    import { Link } from '@inertiajs/inertia-vue3'
    import { defineProps } from 'vue'

    defineProps({
        user: ''
    })
    </script>
