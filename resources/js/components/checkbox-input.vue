<script setup>
import { useId } from 'vue';

const model = defineModel({ type: Boolean });

defineProps({
    label: {
        type: String,
        required: true,
    }
});


const id = useId();

</script>

<template>

        <input
            :id="id"
            v-model="model"
            type="checkbox"
            class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-600 transition-colors"
        />
        <label :for="id" class="ml-2 block text-sm text-slate-700 cursor-pointer">
            {{ label }}
        </label>
</template>
