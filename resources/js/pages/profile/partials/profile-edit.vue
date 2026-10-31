<script setup>
import {ref} from "vue";
import { useForm} from "@inertiajs/vue3";
import InputLabel from "../../../components/input-label.vue";
import TextInput from "../../../components/text-input.vue";
import InputError from "../../../components/input-error.vue";
import PrimaryButton from "../../../components/primary-button.vue";
import useToast from "../../../composables/useToast.js";
import PasswordInput from "../../../components/password-input.vue";


const props = defineProps({
    name: {
        required: true,
        type: String,
    }
});

const  {_toast} = useToast();

const form = useForm({
    name: props.name,
    current_password: null,
    password: null,
    password_confirmation: null

});

const showCurrentPassword = ref(false);
const showNewPassword = ref(false);
const showConfirmPassword = ref(false);


const submit = () => {
    form.put(route('profile.update'), {
        onSuccess: () => {
            _toast('Дані профілю оновлено!');
        }
    });
}

</script>

<template>
    <form class="lg:col-span-8 space-y-6" @submit.prevent="submit">


        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 border-b border-slate-100 pb-4 mb-6">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="text-base font-bold text-slate-900">Особисті дані</h3>
            </div>

            <div class="space-y-4">

                <div>
                    <InputLabel>
                        Прізвище та ім'я <span class="text-rose-500">*</span>
                    </InputLabel>
                    <div class="relative mt-2">
                        <TextInput
                            v-model.trim="form.name"
                            type="text"
                            class="block w-full rounded-xl border border-slate-300 bg-white py-2.5 px-3 text-slate-900 placeholder-slate-400 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 focus:outline-none sm:text-sm"
                        />
                    </div>
                </div>

                <InputError :message="form.errors.name"/>

            </div>
        </div>


        <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
            <div class="flex items-center gap-3 border-b border-slate-100 pb-4 mb-6">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4v-3.286a2 2 0 01.586-1.414l9.753-9.753A6 6 0 0121 9z"/>
                    </svg>
                </div>
                <h3 class="text-base font-bold text-slate-900">Зміна пароля</h3>
            </div>


            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                <div class="flex items-center gap-3 border-b border-slate-100 pb-4 mb-6">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4v-3.286a2 2 0 01.586-1.414l9.753-9.753A6 6 0 0121 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900">Зміна пароля</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <InputLabel>Поточний пароль <span class="text-rose-500">*</span></InputLabel>
                        <PasswordInput
                            v-model.trim="form.current_password"
                            placeholder="Введіть поточний пароль"
                            :hasError="!!form.errors.current_password"
                        />
                        <InputError :message="form.errors.current_password"/>
                    </div>

                    <div>
                        <InputLabel>Новий пароль <span class="text-rose-500">*</span></InputLabel>
                        <PasswordInput
                            v-model.trim="form.password"
                            placeholder="Введіть новий пароль"
                            :hasError="!!form.errors.password"
                        />
                        <InputError :message="form.errors.password"/>
                    </div>

                    <div>
                        <InputLabel>Підтвердіть новий пароль <span class="text-rose-500">*</span></InputLabel>
                        <PasswordInput
                            v-model.trim="form.password_confirmation"
                            placeholder="Повторіть новий пароль"
                            :hasError="!!form.errors.password_confirmation"
                        />
                        <InputError :message="form.errors.password_confirmation"/>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex justify-end">
            <PrimaryButton
                class="gap-2"
                :loading="form.processing"
            >
                <template #icon>
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                    </svg>
                </template>
                Зберегти зміни
            </PrimaryButton>
        </div>

    </form>
</template>


