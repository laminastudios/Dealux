<template>
    <div class="inline-flex relative">
        <button
            ref="dropDownButton"
            @click="openDropDown"
            class="flex items-center cursor-pointer w-full h-full transition-colors px-[24px] rounded-[5px]"
            :class="variantClassesContainer"
        >
            <slot v-if="!selected">{{ selected }}</slot>
            <span v-else>{{ selected }}</span>
            <i
                v-if="variant === 'refund'"
                :class="open ? 'bx bxs-up-arrow' : 'bx bxs-down-arrow'"
                class="ml-2"
            ></i>
        </button>
        <input
            type="hidden"
            :name="name"
            :value="selectedValue"
            :required="required"
        />
        <transition>
            <div
                v-if="open"
                class="absolute top-full translate-x-1/2 right-1/2 text-center min-w-[7.5rem]"
                :class="variantClassesDropDown"
            >
                <ul class="flex flex-col">
                    <li
                        v-for="(item, index) in items"
                        :key="index"
                        href="#"
                        @click.prevent="selectOption(item.text, item.value)"
                        class="transition-colors p-2 whitespace-nowrap cursor-default flex justify-between items-center"
                        :class="[
                            variantClassesItems,
                            { 'label-1 font-medium text-black': item.value === selectedValue && variant === 'refund' },
                        ]"
                    >
                        <span>{{ item.text }}</span>
                        <i
                            v-if="item.value === selectedValue && variant === 'refund'"
                            class="bx bx-check text-yellow-600 text-2xl font-extrabold ml-2"
                        ></i>
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: 'DropDownLink',
    data() {
        return {
            open: false,
            selected: null, // Store the selected option text
            selectedValue: null, // Store the selected option value
        };
    },
    methods: {
        openDropDown() {
            this.open = !this.open;
        },
        closeDropDown(event) {
            if (!this.$refs.dropDownButton.contains(event.target)) {
                this.open = false;
            }
        },
        selectOption(text, value) {
            this.selected = text; // Update the selected option
            this.selectedValue = value; // Update the hidden input value
            this.open = false; // Close the dropdown after selection
            this.$emit('change', { value }); // Emit the selected value
        },
    },
    mounted() {
        document.addEventListener('click', this.closeDropDown);
    },
    beforeDestroy() {
        document.removeEventListener('click', this.closeDropDown);
    },
    props: {
        variant: {
            type: String,
            default: 'light',
        },
        name: {
            type: String,
            required: true,
        },
        items: {
            type: Array,
            required: true,
        },
        required: {
            type: Boolean,
            default: false,
        },
    },
    computed: {
        variantClassesContainer() {
            const variants = {
                variant1: 'bg-yellow-400 hover:bg-yellow-600 text-white justify-center gap-2.5',
                variant2: 'bg-neutral-50 hover:bg-neutral-100 text-neutral-400 justify-between',
                refund: 'label-1 font-semibold bg-white hover:bg-neutral-100 text-neutral-600 justify-between px-[10px]',
                navbar: 'hover:text-yellow-400 p-2',
            };
            return variants[this.variant] || variants['light'];
        },
        variantClassesDropDown() {
            const variants = {
                variant1: 'bg-background text-primary-600 min-w-full label-4 border border-yellow-200',
                variant2: 'bg-background text-primary-600 min-w-full label-4 border border-neutral-100',
                refund: 'label-1 font-medium bg-white border text-neutral-600 min-w-full',
                navbar: 'bg-primary-700 text-white min-w-full label-3 font-semibold',
            };
            return variants[this.variant] || variants['light'];
        },
        variantClassesItems() {
            const variants = {
                variant1: 'hover:bg-neutral-100',
                variant2: 'hover:bg-neutral-100',
                refund: 'hover:bg-neutral-100',
                navbar: 'hover:text-yellow-400',
            };
            return variants[this.variant] || variants['light'];
        },
    },
};
</script>

<style>
/* Transition Styling */
.v-enter-active,
.v-leave-active {
    transition: opacity 100ms ease-in-out;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
