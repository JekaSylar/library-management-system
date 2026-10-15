<script setup>
import {Head} from "@inertiajs/vue3";


import Alert from "../../components/alert.vue";
import Breadcrumbs from "../../components/breadcrumbs.vue";
import ProfileInfo from "./partials/profile-info.vue";
import Title from "../../components/title.vue";
import ProfileEdit from "./partials/profile-edit.vue";


defineProps({
    user: {
        type: Object,
        required: true,
    },
});




</script>

<template>
    <Head title="Мій профіль"/>

    <div>
        <Breadcrumbs :items="[
                                { title: 'Мій профіль' }
                           ]"/>

        <Title title="Мій профіль" />
    </div>

    <Alert/>


    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">


        <ProfileInfo
            :user="{
                        name: user.data.name,
                        initials: user.data.initials,
                        role: user.data.role,
                        email: user.data.email,
                        date: user.data.date,
                        workplace: 'Філія №9',
                }"
        />


       <ProfileEdit :name="user.data.name" />
    </div>

</template>


