<script setup>
import {useRowNumber} from "../../../composables/useRowNumber.js";
import WorkplaceStatus from "./workplace-status.vue";
import EditButton from "../../../components/edit-button.vue";
import DeleteButton from "../../../components/delete-button.vue";
import Pagination from "../../../components/pagination.vue";

defineProps({
   workplaces: Object
});

const emit = defineEmits(['edit', 'delete'])

const { getRowNumber } = useRowNumber();
</script>

<template>
    <div v-if="workplaces.data" class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="custom-scrollbar overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="border-b border-slate-200 bg-slate-50/50 text-xs font-semibold text-slate-500 uppercase">
                <tr>
                    <th class="px-6 py-4">#</th>
                    <th class="px-6 py-4">Назва</th>
                    <th class="px-6 py-4">Місто</th>
                    <th class="px-6 py-4">Адреса</th>
                    <th class="px-6 py-4 text-center">Співробітники</th>
                    <th class="px-6 py-4 text-center">Статус</th>
                    <th class="px-6 py-4 text-center">Дії</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">

                <tr v-for="(workplace, index) in workplaces.data" :key="workplace.id"
                    class="transition-colors hover:bg-slate-50">
                    <td class="px-6 py-4">{{ getRowNumber(workplaces, index) }}</td>
                    <td class="px-6 py-4 font-medium text-slate-900">{{ workplace.name }}</td>
                    <td class="px-6 py-4">{{ workplace.city }}</td>
                    <td class="px-6 py-4">{{ workplace.address }}</td>
                    <td class="px-6 py-4 text-center">3</td>
                    <td class="px-6 py-4 text-center">
                        <WorkplaceStatus :status="workplace.is_active" />
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-1.5">
                            <EditButton @click="emit('edit', workplace)" />
                            <DeleteButton @click="emit('delete', workplace)" />
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

        <Pagination :paginator="workplaces" />
    </div>
</template>
