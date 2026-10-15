<script setup>
import { ref, computed } from "vue";
import { usePage, Link } from "@inertiajs/vue3";

const page = usePage();
const user = computed(() => page.props.auth.user);

const isOpen = ref(false);
</script>

<template>
    <div class="flex items-center gap-4 pl-4">




        <div class="hidden h-8 w-px bg-slate-200 sm:block"></div>


        <div class="relative">


            <button
                @click="isOpen = !isOpen"
                class="flex items-center gap-3 text-left transition-opacity hover:opacity-80 focus:outline-none"
            >
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-200 text-sm font-bold text-slate-600">
                    {{ user.data.initials }}
                </div>
                <div class="hidden sm:block">
                    <p class="text-sm font-semibold text-slate-700">{{ user.data.name }}</p>
                    <p class="text-xs text-slate-500">{{ user.data.role }}</p>
                </div>

                <svg
                    :class="isOpen ? 'rotate-180' : 'rotate-0'"
                    class="ml-1 h-4 w-4 text-slate-400 transition-transform duration-200 ease-in-out"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>


            <button
                v-if="isOpen"
                @click="isOpen = false"
                tabindex="-1"
                class="fixed inset-0 z-40 h-full w-full cursor-default focus:outline-none"
            ></button>


            <transition
                enter-active-class="transition ease-out duration-100"
                enter-from-class="transform opacity-0 scale-95"
                enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75"
                leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95"
            >
                <div
                    v-if="isOpen"
                    class="absolute right-0 z-50 mt-3 w-48 origin-top-right rounded-xl border border-slate-100 bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                >

                    <Link
                        :href="route('profile.edit')"
                        @click="isOpen = false"
                        class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-700 transition-colors hover:bg-slate-50 hover:text-blue-600"
                    >
                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Налаштування
                    </Link>

                    <div class="my-1 border-t border-slate-100"></div>


                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="flex w-full items-center gap-2 px-4 py-2.5 text-left text-sm text-rose-600 transition-colors hover:bg-rose-50"
                    >
                        <svg class="h-4 w-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        Вихід
                    </Link>
                </div>
            </transition>
        </div>
    </div>
</template>
