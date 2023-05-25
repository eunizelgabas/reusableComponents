<script setup lang="ts">
import NavBar from '../components/nav-bar.vue'
import { defineProps } from 'vue'

defineProps({
    'auth': Object
})

</script>

<template>
    <NavBar :user="auth.user"></NavBar>
	<div class="wrapper py-8">
        <slot />
    </div>
</template>

