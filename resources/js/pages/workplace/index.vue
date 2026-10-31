<script setup>
import {ref, watch} from 'vue'
import {Head, useForm, router} from '@inertiajs/vue3'
import Title from '../../components/title.vue'
import Breadcrumbs from '../../components/breadcrumbs.vue'
import PrimaryButton from '../../components/primary-button.vue'
import Offcanvas from '../../components/offcanvas.vue'
import Modal from '../../components/modal.vue'
import WorkplacesTable from './partials/workplaces-table.vue'
import WorkplaceForm from './partials/workplace-form.vue'
import useToast from '../../composables/useToast.js'
import SecondaryButton from "../../components/secondary-button.vue";
import DangerButton from "../../components/danger-button.vue";

defineProps({
    workplaces: Object,
})

const {_toast} = useToast()

// --- Offcanvas ---
const isPanelOpen = ref(false)
const isEditing = ref(false)
const editingId = ref(null)

const statusOptions = [
    {id: true, name: 'Активне'},
    {id: false, name: 'Неактивне'},
]

const selectedStatus = ref(statusOptions[0])
const selectedCity = ref(null)
const selectedStreet = ref(null)

const form = useForm({
    name: '',
    city: '',
    street: '',
    house: '',
    housing: '',
    apartment: '',
    is_active: true,
})

const openCreate = () => {
    isEditing.value = false
    editingId.value = null
    form.reset()
    form.clearErrors()
    form.is_active = true

    selectedStatus.value = statusOptions[0]
    selectedCity.value = null
    selectedStreet.value = null

    isPanelOpen.value = true
}

const openEdit = (workplace) => {
    isEditing.value = true
    editingId.value = workplace.id
    form.clearErrors()

    form.name = workplace.name
    form.city = workplace.city ?? ''
    form.street = workplace.street ?? ''
    form.house = workplace.house ?? ''
    form.housing = workplace.housing ?? ''
    form.apartment = workplace.apartment ?? ''
    form.is_active = workplace.is_active

    selectedStatus.value = workplace.is_active ? statusOptions[0] : statusOptions[1]

    selectedCity.value = workplace.city
        ? {ref: null, text: workplace.city}
        : null

    selectedStreet.value = workplace.street
        ? {ref: null, text: workplace.street}
        : null

    isPanelOpen.value = true
}

const closePanel = () => {
    isPanelOpen.value = false
}

const submit = () => {
    if (isEditing.value) {
        form.put(route('workplaces.update', editingId.value), {
            onSuccess: () => {
                closePanel()
                _toast('Робоче місце змінено')
            },
        })
    } else {
        form.post(route('workplaces.store'), {
            onSuccess: () => {
                closePanel()
                _toast('Робоче місце додано')
            },
        })
    }
}


watch(selectedCity, (val) => {
    form.city = val?.text ?? null
})
watch(selectedStreet, (val) => {
    form.street = val?.text ?? null
})
watch(selectedStatus, (val) => {
    form.is_active = val?.id ?? true
})


const showDeleteModal = ref(false)
const deletingId = ref(null)
const deletingName = ref('')
const isDeleting = ref(false)

const openDelete = (workplace) => {
    deletingId.value = workplace.id
    deletingName.value = workplace.name
    showDeleteModal.value = true
}

const deleteWorkplace = () => {
    isDeleting.value = true

    router.delete(route('workplaces.destroy', deletingId.value), {
        onSuccess: () => {
            showDeleteModal.value = false
            _toast('Робоче місце видалено')
        },
        onFinish: () => {
            isDeleting.value = false
        },
    })
}
</script>

<template>
    <Head title="Робочі місця"/>

    <Breadcrumbs :items="[{ title: 'Робочі місця' }]"/>

    <div class="mb-6 flex flex-col gap-4 items-center sm:flex-row sm:items-center sm:justify-between">
        <div>
            <Title title="Робочі місця" description="Список філій, бібліотек і хабів"/>
        </div>
        <PrimaryButton @click="openCreate">
            <template #icon>
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </template>
            Додати робоче місце
        </PrimaryButton>
    </div>

    <WorkplacesTable
        :workplaces="workplaces"
        @edit="openEdit"
        @delete="openDelete"
    />


    <Modal
        :show="showDeleteModal"
        title="Підтвердження видалення"
        @close="showDeleteModal = false"
    >
        <template #content>
            <div class="flex items-start gap-4">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-base font-semibold text-slate-900">Видалити робоче місце?</h3>
                    <p class="mt-2 text-sm  text-slate-500">
                        Ви впевнені, що хочете видалити
                        <span class="font-bold text-slate-900">«{{ deletingName }}»</span>?
                    </p>
                </div>
            </div>
        </template>

        <template #footer>
            <div class="flex justify-end gap-3">
                <SecondaryButton @click="showDeleteModal = false" :disabled="isDeleting">
                    Скасувати
                </SecondaryButton>
                <DangerButton @click="deleteWorkplace" :loading="isDeleting">
                    Видалити
                </DangerButton>
            </div>
        </template>
    </Modal>


    <Offcanvas
        :show="isPanelOpen"
        :title="isEditing ? 'Редагувати робоче місце' : 'Додати робоче місце'"
        @close="closePanel"
    >
        <template #content>
            <WorkplaceForm
                :form="form"
                :status-options="statusOptions"

                v-model:selected-status="selectedStatus"
                v-model:selected-city="selectedCity"
                v-model:selected-street="selectedStreet"

                @submit-form="submit"
            />
        </template>

        <template #footer>
            <div class="flex items-center justify-between gap-3">
                <SecondaryButton @click="closePanel">
                    Скасувати
                </SecondaryButton>

                <PrimaryButton form="workplaceForm" :loading="form.processing">
                    <template #icon>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                        </svg>
                    </template>
                    Зберегти
                </PrimaryButton>
            </div>
        </template>
    </Offcanvas>
</template>
