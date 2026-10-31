<script setup>
import { ref, watch, onMounted } from 'vue';
import debounce from 'lodash.debounce';
import SelectInput from './select-input.vue';
import TextInput from './text-input.vue';

const model = defineModel({
    type: Object,
    default: null,
});

defineProps({
    hasError: {
        type: Boolean,
        default: false,
    },
});

const options = ref([]);
const loading = ref(false);
const isManual = ref(false);
const manualText = ref('');
const apiAvailable = ref(true);

watch(manualText, (newVal) => {
    const trimmed = newVal?.trim() || '';
    model.value = trimmed
        ? { ref: null, text: trimmed }
        : null;
});


watch(
    () => model.value,
    (val) => {
        if (isManual.value && val?.text) {
            manualText.value = val.text;
        }
    },
    { immediate: true }
);

const enableManual = (reason = '') => {
    if (isManual.value) return;

    isManual.value = true;
    apiAvailable.value = false;

    manualText.value = model.value?.text || '';

    if (reason) {
        console.warn('[CityInput]', reason);
    }
};

/**
 * Проверка доступности API при монтировании.
 * Делаем лёгкий запрос (пустой или с очень коротким q).
 * Если упало — сразу включаем ручной режим.
 */
const checkApiAvailability = async () => {
    try {
        await axios.get(route('api.cities'), {
            params: { q: 'ки' },
            timeout: 4000,
        });
        apiAvailable.value = true;
    } catch (e) {
      console.log(e)
    }
};

const search = debounce(async (query) => {
    if (!apiAvailable.value || isManual.value) return;
    if (!query || query.length < 3) {
        options.value = [];
        return;
    }

    loading.value = true;
    try {
        const { data } = await axios.get(route('api.cities'), {
            params: { q: query },
            timeout: 5000,
        });
        options.value = Array.isArray(data) ? data : [];
    } catch (e) {
        enableManual('Помилка під час пошуку міст. Переключено на ручний ввід.');
    } finally {
        loading.value = false;
    }
}, 300);

onMounted(() => {
    checkApiAvailability();
});
</script>

<template>
    <div class="city-input">
        <SelectInput
            v-if="!isManual"
            v-model="model"
            :options="options"
            track-by="ref"
            label="text"
            placeholder="Введіть назву міста..."
            :internal-search="false"
            :loading="loading"
            :has-error="hasError"
            @search-change="search"
        />

        <TextInput
            v-else
            v-model="manualText"
            type="text"
            placeholder="Введіть назву міста (напр. м. Київ)"
            class="w-full mt-1.5"
            :has-error="hasError"
        />


    </div>
</template>
