<script setup>
import Multiselect from 'vue-multiselect'

const model = defineModel();

defineProps({
    options: {
        type: Array,
        default: () => []
    },
    trackBy: {
        type: String,
        default: 'id'
    },
    label: {
        type: String,
        default: 'name'
    },
    placeholder: {
        type: String,
        default: 'Оберіть...'
    },
    searchable: {
        type: Boolean,
        default: true
    },
    loading: {
        type: Boolean,
        default: false
    },
    hasError: {
        type: Boolean,
        default: false
    },
    internalSearch: {
        type: Boolean,
        default: true
    },

});

defineEmits(['search-change']);
</script>

<template>
    <div :class="['relative', { 'is-invalid': hasError }]">
        <Multiselect
            v-model="model"
            :options="options"
            :track-by="trackBy"
            :label="label"
            :placeholder="placeholder"
            :searchable="searchable"
            :loading="loading"
            :internal-search="internalSearch"
            :allow-empty="false"
            select-label=""
            selected-label=""
            deselect-label=""
            @search-change="$emit('search-change', $event)"
        >
            <template #noResult>
                Нічого не знайдено. Змініть пошуковий запит.
            </template>
            <template #noOptions>
                Список порожній.
            </template>
        </Multiselect>
    </div>
</template>


<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>


<style scoped>

@reference "../../css/app.css";

:deep(.multiselect) {
    @apply min-h-0 text-slate-900 text-sm;
}


:deep(.multiselect__tags) {
    @apply block w-full  py-2.5 mt-1.5 rounded-xl border border-slate-300 bg-white py-2.5 px-3 text-slate-900 shadow-none transition-colors min-h-[42px] flex items-center pr-10;
}


:deep(.multiselect--active .multiselect__tags) {
    @apply border-blue-600 ring-1 ring-blue-600 outline-none;
}


.is-invalid :deep(.multiselect__tags) {
    @apply border-red-500 ring-1 ring-red-500;
}


:deep(.multiselect__single),
:deep(.multiselect__input),
:deep(.multiselect__placeholder) {
    @apply m-0 p-0 text-sm leading-normal text-slate-900 bg-transparent border-none focus:ring-0 focus:outline-none inline-block w-full;
}

:deep(.multiselect__placeholder) {
    @apply text-slate-400;
}


:deep(.multiselect__select) {
    @apply absolute right-0 top-0 bottom-0 h-full w-10 flex items-center justify-center p-0 m-0 bg-transparent transition-transform duration-200 z-10;
}

:deep(.multiselect__select::before) {
    @apply relative top-0 border-slate-400 border-t-[5px] border-x-[4px] border-b-0 border-x-transparent border-t-slate-400 m-0;
}

:deep(.multiselect--active .multiselect__select) {
    @apply transform rotate-180;
}


:deep(.multiselect__content-wrapper) {
    @apply rounded-xl border border-slate-200 bg-white shadow-lg mt-1 overflow-hidden z-50;
}

:deep(.multiselect__option) {
    @apply px-4 py-2.5 text-sm text-slate-700 transition-colors min-h-0 flex items-center;
}

:deep(.multiselect__option--highlight) {
    @apply bg-blue-600 text-white font-normal;
}

:deep(.multiselect__option--selected) {
    @apply bg-slate-100 text-slate-900 font-semibold;
}

:deep(.multiselect__option--selected.multiselect__option--highlight) {
    @apply bg-rose-500 text-white font-normal;
}


:deep(.multiselect__spinner) {
    @apply h-full w-10 bg-white right-0 top-0 flex items-center justify-center rounded-r-xl;
}

:deep(.multiselect__spinner::before),
:deep(.multiselect__spinner::after) {
    @apply border-blue-600 border-t-transparent;
}
</style>
