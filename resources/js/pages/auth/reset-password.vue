<script setup>
import AuthLayout from "../../layouts/auth-layout.vue";
import {Head, useForm, usePage} from '@inertiajs/vue3';
import InputError from "../../components/input-error.vue";
import TextInput from "../../components/text-input.vue";
import PrimaryButton from "../../components/primary-button.vue";
import InputLabel from "../../components/input-label.vue";
import Alert from "../../components/alert.vue";
import PasswordInput from "../../components/password-input.vue";

defineOptions({ layout: AuthLayout });

const page = usePage();

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});




</script>

<template>
    <Head title="Створення нового пароля"/>

    <div class="mb-8 text-center">

        <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-blue-600 text-white shadow-sm">
            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4v-3.286a2 2 0 01.586-1.414l9.753-9.753A6 6 0 0121 9z" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">Створення нового пароля</h2>
        <p class="mt-2 text-sm text-slate-500">Введіть вашу електронну адресу та новий безпечний пароль</p>
    </div>

    <form class="space-y-6" @submit.prevent="form.post(route('password.update'))">


        <Alert  :message="page.props.flash?.status"
                type="error" />


        <div>
            <InputLabel value="Електронна пошта"/>

            <TextInput
                v-model.trim="form.email"
                type="email"
                placeholder="admin@library.ua"
                :hasError="!!form.errors.email"
                required
                readonly
                class="bg-slate-50 text-slate-500 cursor-not-allowed"
            >

                <template #icon>
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                    </svg>
                </template>
            </TextInput>

            <InputError :message="form.errors.email"/>
        </div>


        <div>
            <InputLabel value="Новий пароль"/>
            <PasswordInput
                v-model.trim="form.password"
                :hasError="!!form.errors.password"
                required
                autofocus
            />
            <InputError :message="form.errors.password"/>
        </div>

        <div>
            <InputLabel value="Підтвердження пароля"/>
            <PasswordInput
                v-model.trim="form.password_confirmation"
                placeholder="Повторіть новий пароль"
                :hasError="!!form.errors.password_confirmation"
                required
            />
            <InputError :message="form.errors.password_confirmation"/>
        </div>

        <div>
            <div>
                <PrimaryButton
                    class="w-full"
                    :loading="form.processing"
                >
                    Зберегти новий пароль
                </PrimaryButton>
            </div>
        </div>
    </form>
</template>
