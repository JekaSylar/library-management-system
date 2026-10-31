<script setup>
defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    title: {
        type: String,
        default: '',
    },
    maxWidth: {
        type: String,
        default: 'max-w-lg',
        validator(value) {
            return [
                'max-w-sm',
                'max-w-md',
                'max-w-lg',
                'max-w-xl',
                'max-w-2xl',
                'max-w-3xl',
                'max-w-4xl',
                'max-w-5xl',
                'max-w-6xl',
                'max-w-7xl',
                'max-w-full'
            ].includes(value);
        }
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
            enter-active-class="transition ease-out duration-300"
            enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            enter-to-class="opacity-100 translate-y-0 sm:scale-100"
            leave-active-class="transition ease-in duration-200"
            leave-from-class="opacity-100 translate-y-0 sm:scale-100"
            leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >

            <div v-show="show" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6 pointer-events-none">


                <div :class="['w-full rounded-2xl bg-white shadow-2xl pointer-events-auto overflow-hidden flex flex-col max-h-full', maxWidth]">


                    <div class="flex shrink-0 items-center justify-between border-b border-slate-100 px-6 py-4" v-if="title">
                        <h2 class="text-lg font-bold text-slate-900">{{ title }}</h2>
                        <button @click="$emit('close')" type="button" class="rounded-lg p-1.5 text-slate-400 transition hover:bg-slate-100 hover:text-slate-600 focus:outline-none">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>


                    <div class="custom-scrollbar overflow-y-auto p-6">
                        <slot name="content" />
                    </div>


                    <div class="shrink-0 border-t border-slate-100 bg-slate-50/50 px-6 py-4">
                        <slot name="footer" />
                    </div>

                </div>
            </div>
        </transition>
    </teleport>
</template>
