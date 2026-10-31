<script setup>
defineProps({
    status: {
        required: true,
        type: Boolean
    }
})
</script>

<template>
  <span
      :class="[status ? 'text-emerald-600 ring-1 ring-emerald-500/20 ring-inset' : 'bg-slate-100 text-slate-600 ring-1 ring-slate-500/20 ring-inset']"
      class="inline-flex rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium ">
      {{ status ? 'Активне' : 'Неактивне' }}
  </span>
</template>
