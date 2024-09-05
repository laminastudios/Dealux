<template>
    <div class="inline-flex relative">
        <button
            ref="dropDownButton"
            @click="openDropDown"
            class="flex items-center justify-between gap-[10px] cursor-pointer w-full h-full transition-colors rounded-[5px]"
            :class="variantClassesContainer"
        >
            <slot>{{ selected }}</slot>
        </button>
        <transition>
            <div
                v-if="open"
                class="absolute top-full translate-x-1/2 right-1/2 text-center min-w-full"
                :class="variantClassesDropDown"
            >
                <div class="h-[33px] w-full flex items-center justify-center">
                    <p class="label-3 font-semibold text-white">{{ items.length }} Items Found</p>
                </div>
                <ul class="flex flex-col bg-blue-100 label-3 font-semibold">
                    <li
                        v-for="(item, index) in items"
                        :key="index"
                        href="#"
                        @click.prevent="selectOption(item)"
                        class="transition-colors p-2 whitespace-nowrap cursor-pointer py-[15px]"
                        :class="variantClassesItems"
                    >
                        {{ item.Name }}
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: 'DropDownCompare',
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
            console.log(childClassContainer);
        },
        closeDropDown(event) {
            if (!this.$refs.dropDownButton.contains(event.target)) {
                this.open = false;
            }
        },
        selectOption(item) {
            this.open = false; // Close the dropdown after selection
            this.$emit('pass', item);
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
            default: 'compare',
        },
        items: {
            type: Array,
            required: true,
        },
        childClassContainer: {
            type: String,
            required: false,
        },
    },
    computed: {
        variantClassesContainer() {
            const variants = {
                variant1: 'bg-yellow-400 hover:bg-yellow-500 text-white',
                variant2: 'bg-neutral-50 hover:bg-neutral-100 text-neutral-400',
                navbar: 'hover:text-yellow-400',
                compare: 'text-black bg-blue-100 hover:bg-blue-200',
            };
            let style = `${variants[this.variant]} ${this.childClassContainer}`;
            return style || variants['light'];
        },
        variantClassesDropDown() {
            const variants = {
                variant1: 'bg-blue-300 text-primary-600 min-w-full label-4 border border-yellow-200 text-black',
                variant2: 'bg-blue-300 text-primary-600 min-w-full label-4 border border-neutral-100 text-black',
                navbar: 'bg-primary-700 text-black min-w-full label-3 font-semibold',
                compare: 'bg-blue-300 text-black',
            };
            return variants[this.variant] || variants['light'];
        },
        variantClassesItems() {
            const variants = {
                variant1: 'hover:bg-blue-200',
                variant2: 'hover:bg-blue-200',
                navbar: 'hover:bg-blue-200',
                compare: 'hover:bg-blue-200 ',
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
