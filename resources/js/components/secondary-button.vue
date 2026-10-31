<script setup>
defineProps({
    type: { type: String, default: 'button' },
    disabled: { type: Boolean, default: false },
});
</script>

<template>
    <button
        :type="type"
        :disabled="disabled"
        class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-300 bg-white px-6 py-2.5 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50 focus:outline-none disabled:opacity-75 disabled:cursor-not-allowed"
    >
        <slot />
    </button>
</template>
