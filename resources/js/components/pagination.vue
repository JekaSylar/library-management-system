<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    paginator: {
        type: Object,
        required: true,
    }
});
</script>

<template>

    <div v-if="paginator.meta && paginator.meta.links.length > 3" class="flex items-center justify-between border-t border-slate-200 px-6 py-4">

        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">

            <div>
                <p class="text-sm text-slate-500">
                    Показано
                    <span class="font-medium text-slate-900">{{ paginator.meta.from }}</span>–<span class="font-medium text-slate-900">{{ paginator.meta.to }}</span>
                    з
                    <span class="font-medium text-slate-900">{{ paginator.meta.total }}</span>
                    результатів
                </p>
            </div>

            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                    <template v-for="(link, index) in paginator.meta.links" :key="index">


                        <div v-if="link.url === null"
                             class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-400 ring-1 ring-inset ring-slate-200 cursor-not-allowed bg-slate-50"
                             :class="{
                                 'rounded-l-md': index === 0,
                                 'rounded-r-md': index === paginator.meta.links.length - 1
                             }"
                             v-html="link.label"
                        ></div>


                        <Link v-else
                              preserve-scroll
                              :href="link.url"
                              class="relative inline-flex items-center px-4 py-2 text-sm font-semibold focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 transition-colors"
                              :class="[
                                  link.active
                                      ? 'z-10 bg-blue-600 text-white focus-visible:outline-blue-600'
                                      : 'text-slate-900 ring-1 ring-inset ring-slate-200 hover:bg-slate-50 focus:outline-offset-0',
                                  {
                                      'rounded-l-md': index === 0,
                                      'rounded-r-md': index === paginator.meta.links.length - 1
                                  }
                              ]"
                              v-html="link.label"
                        ></Link>

                    </template>

                </nav>
            </div>
        </div>

    </div>
</template>
