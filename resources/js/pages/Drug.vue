<script setup>
import AuthBase from '@/layouts/auth/AuthSimpleLayout.vue';
import { Head } from   '@inertiajs/vue3';
defineProps({ data: Object })
</script>

<template>
    <AuthBase title="" description="">
    <head title="Drugs" />
    <h1>Welcome</h1>
    <br/>
    <p>{{ data }}</p>
    <br/>
    </AuthBase>
</template>