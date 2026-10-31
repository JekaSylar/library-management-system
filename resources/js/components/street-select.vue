<script setup>
import { ref, watch, onMounted } from 'vue';
import debounce from 'lodash.debounce';
import SelectInput from './select-input.vue';
import TextInput from './text-input.vue';

const props = defineProps({
    cityRef: {
        type: String,
        default: null,
    },
    hasError: {
        type: Boolean,
        default: false,
    },
});

const model = defineModel({
    type: Object,
    default: null,
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

watch(
    () => props.cityRef,
    () => {
        model.value = null;
        options.value = [];
        manualText.value = '';
        isManual.value = false;
        apiAvailable.value = true;
    }
);

const enableManual = (reason = '') => {
    if (isManual.value) return;

    isManual.value = true;
    apiAvailable.value = false;
    manualText.value = model.value?.text || '';

    if (reason) {
        console.warn('[StreetInput]', reason);
    }
};

const checkApiAvailability = async () => {
    if (!props.cityRef) return;

    try {
        await axios.get(route('api.streets'), {
            params: { q: 'хр', city_ref: props.cityRef },
            timeout: 4000,
        });
        apiAvailable.value = true;
    } catch (e) {
        enableManual('API вулиць недоступне. Увімкнено ручний режим.');
    }
};

const search = debounce(async (query) => {
    if (!apiAvailable.value || isManual.value || !props.cityRef) return;
    if (!query || query.length < 2) {
        options.value = [];
        return;
    }

    loading.value = true;
    try {
        const { data } = await axios.get(route('api.streets'), {
            params: {
                q: query,
                city_ref: props.cityRef,
            },
            timeout: 5000,
        });
        options.value = Array.isArray(data) ? data : [];
    } catch (e) {
        console.error(e)
    } finally {
        loading.value = false;
    }
}, 300);

onMounted(() => {
    checkApiAvailability();
});

watch(
    () => props.cityRef,
    (newRef) => {
        if (newRef) {
            checkApiAvailability();
        }
    }
);
</script>

<template>
    <div class="street-input">
        <SelectInput
            v-if="!isManual"
            v-model="model"
            :options="options"
            track-by="ref"
            label="text"
            :placeholder="cityRef ? 'Введіть назву вулиці...' : 'Спочатку оберіть місто'"
            :internal-search="false"
            :loading="loading"
            :has-error="hasError"
            :disabled="!cityRef"
            @search-change="search"
        />

        <TextInput
            v-else
            v-model="manualText"
            type="text"
            placeholder="Введіть назву вулиці"
            class="w-full mt-1.5"
            :has-error="hasError"
            :disabled="!cityRef"
        />
    </div>
</template>
