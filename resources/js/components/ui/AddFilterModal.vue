<template>
    <transition>
        <div
            v-if="visible"
            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
        >
            <div class="bg-background w-[500px] h-[780px]">
                <!-- Modal Header -->
                <header class="flex justify-between items-center h-16 px-8 bg-primary-800">
                    <h6 class="font-semibold text-white">Add Filter</h6>
                    <button
                        @click="close"
                        aria-label="Close filter"
                        class="text-white"
                    >
                        <i class="bx bx-x text-[1.5rem]"></i>
                    </button>
                </header>

                <!-- Modal Body -->
                <section class="px-8 py-4 space-y-4">
                    <!-- Rating Filter -->
                    <div>
                        <label
                            for="rating-range"
                            class="block mb-[1rem] label-1 font-semibold"
                            >Rating</label
                        >
                        <input
                            id="default-range"
                            type="range"
                            v-model="selectedValue"
                            min="1"
                            max="5"
                            step="0.1"
                            class="w-full h-2 bg-neutral-100 rounded-lg appearance-none cursor-pointer range-slider"
                        />
                        <div class="flex justify-between mb-3">
                            <span class="label-4 font-medium">1</span>
                            <span class="label-4 font-medium">5</span>
                        </div>
                        <p class="mt-2 label-3 font-medium">
                            Selected Rating: <strong>{{ selectedValue }}</strong>
                        </p>
                        <hr class="mt-[1rem]" />
                    </div>

                    <!-- Price Range Filter -->
                    <div>
                        <label class="block mb-[1rem] mt-[2rem] label-1 font-semibold">Price Range</label>
                        <div class="flex items-center space-x-2">
                            <float-input
                                v-model="minPrice"
                                type="input"
                                label="Min"
                                id="min_price"
                                class="w-48 bg-primary-50 custom-shadow"
                            />
                            <p class="label-4 font-medium">to</p>
                            <float-input
                                v-model="maxPrice"
                                type="input"
                                label="Max"
                                id="max_price"
                                class="w-48 bg-primary-50 custom-shadow"
                            />
                        </div>
                        <hr class="mt-[1rem]" />
                    </div>

                    <!-- Shipping Location Filter -->
                    <div>
                        <label class="block mb-[1rem] mt-[2rem] label-1 font-semibold">Shipped From</label>
                        <div class="grid grid-cols-3 gap-2">
                            <custom-button
                                v-for="(location, index) in shipLocations"
                                :key="index"
                                variant="filled"
                                size="md"
                                class="w-full bg-primary-50 custom-shadow"
                            >
                                <p class="label-3 font-medium">{{ location }}</p>
                            </custom-button>
                        </div>
                        <hr class="mt-[1rem]" />
                    </div>

                    <!-- Other Filters -->
                    <div>
                        <label class="block mb-[1rem] mt-[2rem] label-1 font-semibold">Others</label>
                        <float-input
                            v-model="otherFilter"
                            type="input"
                            class="w-full bg-primary-50 custom-shadow"
                            label=""
                        />
                        <hr class="mt-[1rem]" />
                    </div>
                </section>

                <!-- Modal Footer -->
                <footer class="px-8 py-6 flex justify-end space-x-8">
                    <custom-button
                        :variant="'filled'"
                        :size="'md'"
                        :color="'yellow'"
                        class="w-[150px]"
                    >
                        <p class="label-3 font-medium">Reset</p>
                    </custom-button>
                    <custom-button
                        :variant="'filled'"
                        :size="'md'"
                        :color="'yellow'"
                        class="w-[150px]"
                    >
                        <p class="label-3 font-medium">Apply Filter</p>
                    </custom-button>
                </footer>
            </div>
        </div>
    </transition>
</template>

<script>
import FloatingLabelInput from './Input.vue';
import Button from './Button.vue';

export default {
    name: 'AddFilterModal',
    components: {
        'float-input': FloatingLabelInput,
        'custom-button': Button,
    },
    props: {
        visible: {
            type: Boolean,
            required: true,
        },
    },
    data() {
        return {
            selectedValue: 3, // Default value for the rating range
            minPrice: '', // Default value for min price input
            maxPrice: '', // Default value for max price input
            otherFilter: '', // Default value for other filter
            shipLocations: ['Domestic', 'Metro Manila', 'Overseas', 'Luzon', 'Visayas', 'Mindanao'],
        };
    },
    methods: {
        close() {
            this.$emit('update:visible', false);
        },
    },
    watch: {
        selectedValue() {
            const slider = document.querySelector('#default-range');
            const max = slider.max;
            const min = slider.min;
            slider.style.setProperty('--thumbPos', slider.value);
        },
    },
};
</script>

<style scoped>
/* Transition Styling */
.v-enter-active,
.v-leave-active {
    transition: opacity 100ms ease-in-out;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}

.range-slider::-webkit-slider-runnable-track {
    height: 8px;
    border-radius: 9999px;
}

.range-slider::-webkit-slider-thumb {
    appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #1e3a8a; /* Optional: Add a border around the thumb */
    cursor: pointer;
    position: relative;
    top: -6px;
}

.range-slider::-moz-range-thumb {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #1e3a8a;
    cursor: pointer;
}

.range-slider::-ms-thumb {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #ffffff;
    border: 2px solid #1e3a8a;
    cursor: pointer;
}

/* Update the background as the slider moves */
.range-slider {
    --value: calc((var(--thumbPos) - 1) / 4 * 100%);
}

.range-slider::-webkit-slider-runnable-track {
    background: linear-gradient(to right, #1e3a8a 0%, #1e3a8a var(--value), #e5e7eb var(--value), #e5e7eb 100%);
}

.range-slider::-moz-range-track {
    background: linear-gradient(to right, #1e3a8a 0%, #1e3a8a var(--value), #e5e7eb var(--value), #e5e7eb 100%);
}

.range-slider::-ms-fill-lower {
    background: #1e3a8a;
}

.range-slider::-ms-fill-upper {
    background: #e5e7eb;
}
</style>
