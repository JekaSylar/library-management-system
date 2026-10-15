<script setup>
import { ref } from 'vue';
import AuthLayout from "../../layouts/auth-layout.vue";
import {Head, useForm, usePage} from '@inertiajs/vue3';
import InputError from "../../components/input-error.vue";
import TextInput from "../../components/text-input.vue";
import PrimaryButton from "../../components/primary-button.vue";
import InputLabel from "../../components/input-label.vue";
import Alert from "../../components/alert.vue";

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


const showPassword = ref(false);
const showPasswordConfirm = ref(false);


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

            <TextInput
                v-model.trim="form.password"
                :type="showPassword ? 'text' : 'password'"
                placeholder="••••••••"
                :hasError="!!form.errors.password"
                required
                autofocus
            >
                <template #icon>
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </template>

                <template #action>
                    <button type="button" @click="showPassword = !showPassword" class="text-slate-400 hover:text-slate-600 focus:outline-none">
                        <svg v-if="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg v-else class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </template>
            </TextInput>

            <InputError :message="form.errors.password"/>
        </div>


        <div>
            <InputLabel value="Підтвердження пароля"/>

            <TextInput
                v-model.trim="form.password_confirmation"
                :type="showPasswordConfirm ? 'text' : 'password'"
                placeholder="••••••••"
                :hasError="!!form.errors.password_confirmation"
                required
            >
                <template #icon>
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </template>

                <template #action>
                    <button type="button" @click="showPasswordConfirm = !showPasswordConfirm" class="text-slate-400 hover:text-slate-600 focus:outline-none">
                        <svg v-if="!showPasswordConfirm" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <svg v-else class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                        </svg>
                    </button>
                </template>
            </TextInput>

            <InputError :message="form.errors.password_confirmation"/>
        </div>

        <div>
            <PrimaryButton
                class="w-full"
                :disabled="form.processing"
            >
                Зберегти новий пароль
            </PrimaryButton>
        </div>
    </form>
</template>
