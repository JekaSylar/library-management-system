<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message" class="mt-1.5 text-sm  text-red-500">
        {{ message }}
    </div>
</template>


