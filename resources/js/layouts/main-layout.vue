<script setup>
import Sidebar from "./main-layout/sidebar.vue";
import Profile from "./main-layout/profile.vue";
</script>

<template>
    <div class="flex h-screen w-full overflow-hidden">

        <Sidebar />


        <div class="flex flex-1 flex-col overflow-hidden">

            <header class="flex h-16 shrink-0 items-center justify-end border-b border-slate-200 bg-white px-4 md:px-6">

               <Profile />
            </header>


            <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:px-8">
              <slot />
            </main>
        </div>
    </div>
</template>

<style scoped>

</style>
