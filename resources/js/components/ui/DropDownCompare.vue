<template>
    <div class="inline-flex relative">
        <button
            ref="dropDownButton"
            @click="openDropDown"
            class="flex items-center justify-between gap-[10px] cursor-pointer w-full h-full transition-colors px-[33px] py-[7px] text-black bg-blue-100 hover:bg-blue-200"
        >
            <slot>{{ selected }}</slot>
        </button>
        <transition>
            <div
                v-if="open"
                class="absolute top-full translate-x-1/2 right-1/2 text-center min-w-[7.5rem] w-full"
                :class="variantClassesDropDown"
            >
                <div class="h-[33px] w-full bg-blue-300 flex items-center justify-center">
                    <p class="label-3 font-semibold text-white">{{ items.length }} Items Found</p>
                </div>
                <ul class="flex flex-col bg-blue-100 label-3 font-semibold">
                    <li
                        v-for="(item, index) in items"
                        :key="index"
                        href="#"
                        @click.prevent="selectOption(item)"
                        class="transition-colors p-2 whitespace-nowrap cursor-pointer hover:bg-blue-200 py-[15px]"
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
        items: {
            type: Array,
            required: true,
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
