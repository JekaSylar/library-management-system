<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    items: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <nav class="flex items-center gap-2 text-sm text-slate-500 flex-wrap">

        <Link
            :href="route('dashboard')"
            class="hover:text-slate-700 transition-colors"
        >
            Головна
        </Link>

        <template v-for="(item, index) in items" :key="index">
            <span class="text-slate-400 select-none">&gt;</span>

            <span
                v-if="index === items.length - 1 || !item.route"
                class="font-medium text-slate-800"
            >
                {{ item.title }}
            </span>

            <Link
                v-else
                :href="route(item.route, item.params || {})"
                class="hover:text-slate-700 transition-colors"
            >
                {{ item.title }}
            </Link>
        </template>
    </nav>
</template>
