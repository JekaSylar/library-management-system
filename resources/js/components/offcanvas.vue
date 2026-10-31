<script setup>
defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    title: {
        type: String,
        required: true,
    }
});

defineEmits(['close']);
</script>

<template>
    <teleport to="body">
        <transition
            enter-active-class="transition ease-out duration-300"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition ease-in duration-200"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div v-show="show" class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm" @click="$emit('close')"></div>
        </transition>


        <transition
            enter-active-class="transform transition ease-in-out duration-300"
            enter-from-class="translate-x-full"
            enter-to-class="translate-x-0"
            leave-active-class="transform transition ease-in-out duration-300"
            leave-from-class="translate-x-0"
            leave-to-class="translate-x-full"
        >
            <div v-show="show" class="fixed inset-y-0 right-0 z-50 flex w-full max-w-[440px] flex-col bg-white shadow-2xl">


                <div class="flex shrink-0 items-center justify-between border-b border-slate-100 px-6 py-4">
                    <h2 class="text-lg font-bold text-slate-900">{{ title }}</h2>
                    <button @click="$emit('close')" type="button" class="rounded-lg p-1.5 text-slate-400 transition hover:bg-slate-100 hover:text-slate-600 focus:outline-none">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <div class="custom-scrollbar flex-1 overflow-y-auto">
                    <slot name="content" />
                </div>

                <div class="shrink-0 border-t border-slate-100 bg-slate-50/50 p-6">
                    <slot name="footer" />
                </div>

            </div>
        </transition>
    </teleport>
</template>

