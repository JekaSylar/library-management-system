<script setup>
import InputLabel from '../../../components/input-label.vue'
import TextInput from '../../../components/text-input.vue'
import InputError from '../../../components/input-error.vue'
import SelectInput from '../../../components/select-input.vue'
import CitySelect from '../../../components/city-select.vue'
import StreetSelect from '../../../components/street-select.vue'


defineProps({
    form: { type: Object, required: true },
    statusOptions: { type: Array, required: true },
})


const selectedStatus = defineModel('selectedStatus')
const selectedCity = defineModel('selectedCity')
const selectedStreet = defineModel('selectedStreet')


const emit = defineEmits(['submitForm'])
</script>

<template>

    <form id="workplaceForm" class="space-y-6 p-6" @submit.prevent="emit('submitForm')">

        <div class="space-y-4">
            <div>
                <InputLabel>
                    Назва <span class="text-red-500">*</span>
                </InputLabel>
                <TextInput
                    v-model="form.name"
                    type="text"
                    placeholder="Наприклад, Філія №9"
                    class="mt-1.5"
                    :hasError="!!form.errors.name"
                />
                <InputError :message="form.errors.name" class="mt-1" />
            </div>

            <div>
                <InputLabel>
                    Статус <span class="text-red-500">*</span>
                </InputLabel>
                <!-- Тепер тут просто v-model, як у звичайних інпутах! -->
                <SelectInput
                    v-model="selectedStatus"
                    :options="statusOptions"
                    :searchable="false"
                    placeholder="Оберіть статус"
                    :hasError="!!form.errors.is_active"
                />
                <InputError :message="form.errors.is_active" class="mt-1" />
            </div>
        </div>

        <div class="border-t border-slate-100 pt-4">
            <h3 class="text-sm font-bold text-slate-800 mb-4">Адреса</h3>

            <div class="space-y-4">
                <div>
                    <InputLabel>
                        Населений пункт <span class="text-red-500">*</span>
                    </InputLabel>
                    <!-- Просто v-model -->
                    <CitySelect
                        v-model="selectedCity"
                        :hasError="!!form.errors.city"
                    />
                    <InputError :message="form.errors.city" class="mt-1" />
                </div>

                <div>
                    <InputLabel>
                        Вулиця <span class="text-red-500">*</span>
                    </InputLabel>
                    <!-- Просто v-model -->
                    <StreetSelect
                        v-model="selectedStreet"
                        :cityRef="selectedCity?.ref"
                        :cityName="selectedCity?.text"
                        :hasError="!!form.errors.street"
                    />
                    <InputError :message="form.errors.street" class="mt-1" />
                </div>

                <div class="grid grid-cols-3 gap-3">
                    <div>
                        <InputLabel>
                            Буд. <span class="text-red-500">*</span>
                        </InputLabel>
                        <TextInput
                            v-model="form.house"
                            type="text"
                            placeholder="№"
                            class="mt-1.5"
                            :hasError="!!form.errors.house"
                        />
                        <InputError :message="form.errors.house" class="mt-1" />
                    </div>

                    <div>
                        <InputLabel>Корпус</InputLabel>
                        <TextInput
                            v-model="form.housing"
                            type="text"
                            placeholder="Літера/№"
                            class="mt-1.5"
                            :hasError="!!form.errors.housing"
                        />
                        <InputError :message="form.errors.housing" class="mt-1" />
                    </div>

                    <div>
                        <InputLabel>Квартира</InputLabel>
                        <TextInput
                            v-model="form.apartment"
                            type="text"
                            placeholder="Офіс/Кв"
                            class="mt-1.5"
                            :hasError="!!form.errors.apartment"
                        />
                        <InputError :message="form.errors.apartment" class="mt-1" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>
