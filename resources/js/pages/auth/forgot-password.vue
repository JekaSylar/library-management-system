<script setup>
import AuthLayout from "../../layouts/auth-layout.vue";
import {Head, Link, useForm, usePage} from '@inertiajs/vue3';
import InputError from "../../components/input-error.vue";
import TextInput from "../../components/text-input.vue";
import PrimaryButton from "../../components/primary-button.vue";
import InputLabel from "../../components/input-label.vue";
import Alert from "../../components/alert.vue";

defineOptions({layout: AuthLayout});

const page = usePage();


const form = useForm({
    email: null,
});


</script>

<template>
    <Head title="Скидання пароля"/>
    <div class="mb-8 text-center">
        <div
            class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-xl bg-blue-600 text-white shadow-sm">
            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M4 4v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6H6a2 2 0 00-2 2zm14 16H6V4h8v4h4v12z"/>
            </svg>
        </div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">Скидання пароля</h2>
    </div>

    <Alert
        :message="page.props.flash?.status"
        type="success"
    />

    <form class="space-y-6" @submit.prevent="form.post(route('password.email'))">


        <div>
            <InputLabel value="Електронна пошта"/>

            <TextInput
                v-model.trim="form.email"
                type="email"
                placeholder="admin@library.ua"
                :hasError="!!form.errors.email"
            >
                <template #icon>
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                    </svg>
                </template>
            </TextInput>

            <InputError :message="form.errors.email"/>
        </div>


        <div>
            <PrimaryButton
                class="w-full"
                :loading="form.processing"
            >
                Скинути
            </PrimaryButton>
        </div>
    </form>
    <div class="mt-6 text-center">
        <Link
            :href="route('login')"
            class="inline-flex items-center gap-2 text-sm font-medium text-slate-600 transition-colors hover:text-blue-600"
        >
            <svg
                class="h-4 w-4"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18"
                />
            </svg>
            Повернутися до входу
        </Link>
    </div>
</template>
