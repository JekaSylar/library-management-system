<script setup>
// 1. Забороняємо Vue вішати атрибути (і класи) на кореневий <div>
defineOptions({
    inheritAttrs: false
});

const model = defineModel();

defineProps({
    hasError: {
        type: Boolean,
        default: false,
    }
});
</script>

<template>
    <div class="relative mt-2">

        <div v-if="$slots.icon" class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            <slot name="icon" />
        </div>

        <input
            v-model="model"
            :class="[
                'block w-full rounded-xl border bg-white py-2.5 text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-1 sm:text-sm transition-colors',
                $slots.icon ? 'pl-10' : 'pl-3',
                $slots.action ? 'pr-10' : 'pr-3',
                hasError ? 'border-red-500 focus:border-red-500 focus:ring-red-500' : 'border-slate-300 focus:border-blue-600 focus:ring-blue-600',
                $attrs.class
            ]"
            v-bind="$attrs"

        />

        <div v-if="$slots.action" class="absolute inset-y-0 right-0 flex items-center pr-3">
            <slot name="action" />
        </div>
    </div>
</template>
