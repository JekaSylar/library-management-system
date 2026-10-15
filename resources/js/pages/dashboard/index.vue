<script setup>

</script>

<template>
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Головна</h1>
            <p class="mt-1 text-sm text-slate-500">Огляд системи та основні показники</p>
        </div>
        <div class="flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-600 shadow-sm hover:bg-slate-50">
            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            01.10.2026 - 31.10.2026
            <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </div>

    <!-- Блок 4 карточек статистики -->
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Картка 1: Усього читачів -->
        <div class="relative overflow-hidden rounded-xl border border-blue-100 bg-blue-50/80 p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                        />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-blue-900/70">Усього читачів</p>
                    <p class="mt-1 text-3xl font-bold text-blue-950">1 613</p>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-end text-sm font-medium text-blue-600">
                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
                +12 <span class="ml-1 font-normal text-blue-900/50">за місяць</span>
            </div>
        </div>

        <!-- Картка 2: Нових реєстрацій -->
        <div class="relative overflow-hidden rounded-xl border border-emerald-100 bg-emerald-50/80 p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-emerald-900/70">Нових реєстрацій</p>
                    <p class="mt-1 text-3xl font-bold text-emerald-950">48</p>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-end text-sm font-medium text-emerald-600">
                <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
                +8% <span class="ml-1 font-normal text-emerald-900/50">за період</span>
            </div>
        </div>

        <!-- Картка 3: Інвалідність -->
        <div class="relative overflow-hidden rounded-xl border border-orange-100 bg-orange-50/80 p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-orange-100 text-orange-600">
                    <!-- Wheelchair icon placeholder -->
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-3-3m0 0l-3 3m3-3v8m-5-8H7a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-orange-900/70">Читачі з інвалідністю</p>
                    <p class="mt-1 text-3xl font-bold text-orange-950">72</p>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-end text-sm font-medium text-orange-600">4.5% <span class="ml-1 font-normal text-orange-900/50">від загальної кількості</span></div>
        </div>

        <!-- Картка 4: ВПО -->
        <div class="relative overflow-hidden rounded-xl border border-rose-100 bg-rose-50/80 p-5">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-rose-100 text-rose-600">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-rose-900/70">ВПО</p>
                    <p class="mt-1 text-3xl font-bold text-rose-950">96</p>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-end text-sm font-medium text-rose-600">6.0% <span class="ml-1 font-normal text-rose-900/50">від загальної кількості</span></div>
        </div>
    </div>

    <!-- Основная таблица: Читачі -->
    <div class="mb-6 flex flex-col rounded-xl border border-slate-200 bg-white shadow-sm">
        <!-- Шапка таблицы -->
        <div class="border-b border-slate-200 px-6 py-5">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-slate-900">Читачі</h2>
                        <p class="text-sm text-slate-500">Список зареєстрованих читачів</p>
                    </div>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <button class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Імпорт
                    </button>
                    <button class="flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Експорт
                    </button>
                    <button class="flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                        Додати читача
                    </button>
                </div>
            </div>

            <!-- Фильтры -->
            <div class="mt-5 grid grid-cols-1 gap-4 md:grid-cols-12">
                <div class="relative md:col-span-4 lg:col-span-5">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        placeholder="Пошук за ПІБ, № формуляра, адресою..."
                        class="block w-full rounded-lg border border-slate-200 bg-slate-50 py-2 pr-3 pl-9 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:ring-1 focus:ring-blue-500"
                    />
                </div>

                <div class="md:col-span-2 lg:col-span-2">
                    <select class="block w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:ring-1 focus:ring-blue-500">
                        <option>Усі філії</option>
                    </select>
                </div>
                <div class="md:col-span-2 lg:col-span-2">
                    <select class="block w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:ring-1 focus:ring-blue-500">
                        <option>Усі відділи</option>
                    </select>
                </div>
                <div class="md:col-span-2 lg:col-span-1">
                    <select class="block w-full rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-900 focus:border-blue-500 focus:bg-white focus:ring-1 focus:ring-blue-500">
                        <option>Усі</option>
                    </select>
                </div>
                <div class="flex justify-end md:col-span-2 lg:col-span-2">
                    <button class="flex w-full items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"
                            />
                        </svg>
                        Більше фільтрів
                    </button>
                </div>
            </div>
        </div>

        <!-- Сама таблица (с горизонтальным скроллом на мобильных) -->
        <div class="custom-scrollbar overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="border-b border-slate-200 bg-slate-50/50 text-xs font-semibold text-slate-500 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-4">#</th>
                    <th scope="col" class="px-6 py-4">ПІБ</th>
                    <th scope="col" class="px-6 py-4">Домашня адреса</th>
                    <th scope="col" class="px-6 py-4">№ формуляра</th>
                    <th scope="col" class="px-6 py-4 text-center">Інвалід</th>
                    <th scope="col" class="px-6 py-4 text-center">ВПО</th>
                    <th scope="col" class="flex items-center gap-1 px-6 py-4">
                        Дата реєстрації
                        <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </th>
                    <th scope="col" class="px-6 py-4">Відділ</th>
                    <th scope="col" class="px-6 py-4">Рік народження</th>
                    <th scope="col" class="px-6 py-4">Стать</th>
                    <th scope="col" class="px-6 py-4 text-center">Дії</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                <!-- Ряд 1 -->
                <tr class="transition-colors hover:bg-slate-50">
                    <td class="px-6 py-4 font-medium whitespace-nowrap text-slate-900">1</td>
                    <td class="px-6 py-4 font-medium text-slate-900">Літвінова Ганна<br /><span class="font-normal text-slate-500">В'ячеславівна</span></td>
                    <td class="px-6 py-4">Дніпро, вул. Набережна<br />Перемоги 134, корп. 3, кв. 70</td>
                    <td class="px-6 py-4">1613</td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600 ring-1 ring-slate-500/10 ring-inset">Ні</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600 ring-1 ring-slate-500/10 ring-inset">Ні</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">2026-10-09</td>
                    <td class="px-6 py-4 text-slate-500">Читальний<br />зал</td>
                    <td class="px-6 py-4">1982</td>
                    <td class="px-6 py-4">Жіноча</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-1.5">
                            <button class="rounded bg-blue-500 p-1.5 text-white shadow-sm transition hover:bg-blue-600" title="Перегляд">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
                                </svg>
                            </button>
                            <button class="rounded bg-emerald-500 p-1.5 text-white shadow-sm transition hover:bg-emerald-600" title="Редагувати">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                    />
                                </svg>
                            </button>
                            <button class="rounded bg-rose-500 p-1.5 text-white shadow-sm transition hover:bg-rose-600" title="Видалити">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Ряд 2 -->
                <tr class="transition-colors hover:bg-slate-50">
                    <td class="px-6 py-4 font-medium whitespace-nowrap text-slate-900">2</td>
                    <td class="px-6 py-4 font-medium text-slate-900">Андреєва Олена<br /><span class="font-normal text-slate-500">Миколаївна</span></td>
                    <td class="px-6 py-4">Дніпро, Батумська 34/75</td>
                    <td class="px-6 py-4">1612</td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600 ring-1 ring-slate-500/10 ring-inset">Ні</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600 ring-1 ring-slate-500/10 ring-inset">Ні</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">2026-10-09</td>
                    <td class="px-6 py-4 text-slate-500">Читальний<br />зал</td>
                    <td class="px-6 py-4">1973</td>
                    <td class="px-6 py-4">Жіноча</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-1.5">
                            <button class="rounded bg-blue-500 p-1.5 text-white shadow-sm transition hover:bg-blue-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
                                </svg>
                            </button>
                            <button class="rounded bg-emerald-500 p-1.5 text-white shadow-sm transition hover:bg-emerald-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                    />
                                </svg>
                            </button>
                            <button class="rounded bg-rose-500 p-1.5 text-white shadow-sm transition hover:bg-rose-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Ряд 3 -->
                <tr class="transition-colors hover:bg-slate-50">
                    <td class="px-6 py-4 font-medium whitespace-nowrap text-slate-900">3</td>
                    <td class="px-6 py-4 font-medium text-slate-900">Капаніцина Любов<br /><span class="font-normal text-slate-500">Петрівна</span></td>
                    <td class="px-6 py-4">Дніпро, вул. Набережна<br />Перемоги 126/10</td>
                    <td class="px-6 py-4">1611</td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600 ring-1 ring-slate-500/10 ring-inset">Ні</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center rounded-md bg-slate-100 px-2 py-1 text-xs font-medium text-slate-600 ring-1 ring-slate-500/10 ring-inset">Ні</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">2026-10-09</td>
                    <td class="px-6 py-4 text-slate-500">Читальний<br />зал</td>
                    <td class="px-6 py-4">1956</td>
                    <td class="px-6 py-4">Жіноча</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-1.5">
                            <button class="rounded bg-blue-500 p-1.5 text-white shadow-sm transition hover:bg-blue-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />
                                </svg>
                            </button>
                            <button class="rounded bg-emerald-500 p-1.5 text-white shadow-sm transition hover:bg-emerald-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
                                    />
                                </svg>
                            </button>
                            <button class="rounded bg-rose-500 p-1.5 text-white shadow-sm transition hover:bg-rose-600">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <!-- Пагинация -->
        <div class="flex items-center justify-between border-t border-slate-200 bg-white px-6 py-4">
            <span class="text-sm text-slate-500">Показано 1–5 з 1 613 записів</span>
            <div class="flex items-center gap-4">
                <select
                    class="hidden rounded-lg border border-slate-200 bg-white px-2 py-1.5 text-sm text-slate-700 shadow-sm outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 sm:block"
                >
                    <option>5 на сторінці</option>
                    <option>10 на сторінці</option>
                </select>

                <nav class="flex items-center gap-1">
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-400 hover:bg-slate-50 hover:text-slate-600 disabled:opacity-50" disabled>
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                    </button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-sm font-medium text-white shadow-sm">1</button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-transparent text-sm font-medium text-slate-600 hover:bg-slate-50">2</button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-transparent text-sm font-medium text-slate-600 hover:bg-slate-50">3</button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-transparent text-sm font-medium text-slate-600 hover:bg-slate-50">4</button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-transparent text-sm font-medium text-slate-600 hover:bg-slate-50">5</button>
                    <span class="flex h-8 w-8 items-center justify-center text-slate-400">...</span>
                    <button class="flex hidden h-8 w-8 items-center justify-center rounded-lg border border-transparent text-sm font-medium text-slate-600 hover:bg-slate-50 sm:flex">323</button>
                    <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-slate-200 text-slate-400 hover:bg-slate-50 hover:text-slate-600">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </button>
                </nav>
            </div>
        </div>
    </div>

    <!-- Нижние быстрые действия -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <a href="#" class="group flex items-center justify-between rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:border-blue-300 hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-50 text-blue-600 transition-colors group-hover:bg-blue-100">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"
                        />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800">Швидке додавання</h3>
                    <p class="mt-0.5 text-xs text-slate-500">Зареєструвати нового читача</p>
                </div>
            </div>
            <svg class="h-5 w-5 text-slate-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <a href="#" class="group flex items-center justify-between rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:border-blue-300 hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 transition-colors group-hover:bg-indigo-100">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800">Пошук дублей</h3>
                    <p class="mt-0.5 text-xs text-slate-500">Перевірити існуючих читачів</p>
                </div>
            </div>
            <svg class="h-5 w-5 text-slate-400 group-hover:text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <a href="#" class="group flex items-center justify-between rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:border-blue-300 hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-50 text-emerald-600 transition-colors group-hover:bg-emerald-100">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"
                        />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800">Звіти та статистика</h3>
                    <p class="mt-0.5 text-xs text-slate-500">Аналітика та експорт даних</p>
                </div>
            </div>
            <svg class="h-5 w-5 text-slate-400 group-hover:text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>

        <a href="#" class="group flex items-center justify-between rounded-xl border border-slate-200 bg-white p-5 shadow-sm transition-all hover:border-blue-300 hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-cyan-50 text-cyan-600 transition-colors group-hover:bg-cyan-100">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                        />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-800">Довідники</h3>
                    <p class="mt-0.5 text-xs text-slate-500">Керування довідковою інформацією</p>
                </div>
            </div>
            <svg class="h-5 w-5 text-slate-400 group-hover:text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </a>
    </div>
</template>

<style scoped>

</style>
