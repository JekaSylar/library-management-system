<script setup>
    defineProps({
        title: {
            required: true,
            type: String,
        }
    });
</script>

<template>
    <h1 class="my-8 text-2xl font-bold tracking-tight text-slate-900">
        {{ title }}
    </h1>
</template>


