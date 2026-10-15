<script setup>


import {useDate} from "../../../composables/useDate.js";

defineProps({
    user: {
        type: Object,
        required: true,
    }
});

const { formatDate } = useDate();
</script>

<template>
    <div class="lg:col-span-4 rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm flex flex-col items-center text-center">

        <div class="flex h-32 w-32 items-center justify-center rounded-full bg-blue-100 text-3xl font-bold text-blue-600 shadow-inner">
            {{ user.initials }}
        </div>

        <h2 class="mt-4 text-xl font-bold text-slate-900">
            {{ user.name }}
        </h2>

        <span class="mt-2 inline-flex items-center rounded-full bg-rose-100 px-3 py-1 text-xs font-medium text-rose-600">
            {{ user.role }}
        </span>

        <div class="mt-6 w-full space-y-4 border-t border-slate-100 pt-6 text-left text-sm">


            <div v-if="user.workplace" class="flex  items-center gap-3">
                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h5m-5 0V11m0 5h5"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-slate-700">{{ user.workplace }}</p>

                </div>
            </div>


            <div class="flex items-center gap-3">
                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-slate-700">{{ user.email }}</p>
                </div>
            </div>


            <div class="flex items-start gap-3">
                <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-slate-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-slate-700">Приєднався до системи</p>
                    <p class="text-xs text-slate-400">{{ formatDate(user.date) }}</p>
                </div>
            </div>

        </div>
    </div>
</template>
