
<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const alerts = computed(() => {
    const flash = page.props.flash ?? {};

    const types = ['success', 'error', 'warning', 'info'];

    return types
        .filter((type) => flash[type])
        .map((type) => ({
            type,
            message: flash[type],
        }));
});

const styleClasses = {
    success: 'border-emerald-200 bg-emerald-50 text-emerald-600',
    warning: 'border-amber-200 bg-amber-50 text-amber-600',
    info: 'border-blue-200 bg-blue-50 text-blue-600',
    error: 'border-red-200 bg-red-50 text-red-600',
};
</script>

<template>
    <div
        v-for="alert in alerts"
        :key="alert.type"
        :class="[
            'mb-6 flex items-center gap-3 rounded-xl border p-4 text-sm shadow-sm',
            styleClasses[alert.type],
        ]"
    >
        <svg
            v-if="alert.type === 'error'"
            class="h-5 w-5 shrink-0"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
            />
        </svg>

        <svg
            v-else-if="alert.type === 'success'"
            class="h-5 w-5 shrink-0"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
            />
        </svg>

        <svg
            v-else
            class="h-5 w-5 shrink-0"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            />
        </svg>

        <p class="font-medium">{{ alert.message }}</p>
    </div>
</template>
