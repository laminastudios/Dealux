<template>
    <div class="inline-flex relative">
        <button
            ref="dropDownButton"
            @click="openDropDown"
            class="flex items-center justify-center gap-[10px] cursor-pointer w-full h-full transition-colors"
            :class="variantClassesContainer"
        >
            <slot v-if="!selected">{{ selected }}</slot>
            <span v-else>{{ selected }}</span>
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
                class="absolute top-full mt-[11px] translate-x-1/2 right-1/2 text-center rounded-[15px]"
                :class="variantClassesDropDown"
            >
                <ul class="flex flex-col">
                    <li
                        v-for="(item, index) in items"
                        :key="index"
                        href="#"
                        @click.prevent="selectOption(item.text, item.value)"
                        class="first:rounded-t-[15px] last:rounded-b-[15px] transition-colors p-2"
                        :class="variantClassesItems"
                    >
                        {{ item.text }}
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
                light: 'bg-neutral-50 hover:bg-neutral-100 rounded-md text-neutral-400',
                dark: 'bg-neutral-500 hover:bg-neutral-300 rounded-md text-white',
                bare: 'hover:bg-neutral-100 rounded-md p-2',
            };
            return variants[this.variant] || variants['light'];
        },
        variantClassesDropDown() {
            const variants = {
                light: 'bg-neutral-50 w-full label-4',
                dark: 'bg-neutral-500 text-white w-full label-3',
                bare: 'bg-neutral-500 text-white w-full label-3 font-semibold',
            };
            return variants[this.variant] || variants['light'];
        },
        variantClassesItems() {
            const variants = {
                light: 'hover:bg-neutral-100',
                dark: 'hover:bg-neutral-300',
                bare: 'hover:bg-neutral-300',
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
