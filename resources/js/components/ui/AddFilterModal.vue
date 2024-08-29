<template>
    <transition name="fade">
        <div
            v-if="visible"
            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50"
        >
            <div class="bg-white w-[500px] h-[780px]">
                <!-- Modal Header -->
                <header class="flex justify-between items-center h-16 px-8 bg-neutral-200">
                    <h6 class="font-semibold">Add Filter</h6>
                    <button
                        @click="close"
                        aria-label="Close filter"
                        class="text-neutral-900 text-2xl"
                    >
                        <i class="bx bx-x-circle"></i>
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
                        <div class="flex justify-between mb-2">
                            <span class="label-4 font-medium">1</span>
                            <span class="label-4 font-medium">5</span>
                        </div>
                        <input
                            id="default-range"
                            type="range"
                            v-model="selectedValue"
                            min="1"
                            max="5"
                            step="0.1"
                            class="w-full h-2 bg-neutral-100 rounded-lg appearance-none cursor-pointer"
                        />
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
                                class="w-48"
                            />
                            <p class="label-4 font-medium">to</p>
                            <float-input
                                v-model="maxPrice"
                                type="input"
                                label="Max"
                                id="max_price"
                                class="w-48"
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
                                class="w-full"
                                color="neutral-500"
                            >
                                <p class="label-3">{{ location }}</p>
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
                            class="w-full"
                            label=""
                        />
                        <hr class="mt-[1rem]" />
                    </div>
                </section>

                <!-- Modal Footer -->
                <footer class="px-8 py-6 flex justify-end space-x-8">
                    <custom-button
                        variant="filled"
                        size="md"
                        class="w-[150px]"
                        color="neutral-500"
                    >
                        <p class="label-3 font-medium">Reset</p>
                    </custom-button>
                    <custom-button
                        variant="filled"
                        size="md"
                        class="w-[150px]"
                        color="neutral-500"
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
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>
