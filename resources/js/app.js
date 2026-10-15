import { createInertiaApp } from '@inertiajs/vue3'
import MainLayout from "./layouts/main-layout.vue"
import { ZiggyVue } from 'ziggy-js'

const appName = import.meta.env.VITE_APP_NAME

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    layout: () => MainLayout,

    withApp(app) {
        app.use(ZiggyVue)
    },
})
