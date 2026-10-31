<script setup>
    defineProps({
        title: {
            required: true,
            type: String,
        },
        description: {
            type: String,
        }
    });
</script>

<template>
    <h1 class="mt-8 text-2xl font-bold tracking-tight text-slate-900">
        {{ title }}
    </h1>
    <p class="mt-1 text-sm text-slate-500">
        {{ description }}
    </p>
</template>


