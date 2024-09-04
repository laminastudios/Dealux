<template>
    <DropDownCompare
        :items="remainingProducts"
        @pass="openPopup"
    >
        <slot></slot>
    </DropDownCompare>
    <transition>
        <div
            v-if="open"
            class="fixed top-0 left-0 h-screen w-screen bg-gray-900 bg-opacity-50"
        >
            <div
                class="absolute w-[1218px] translate-x-1/2 right-1/2 z-[1000] top-1/2 -translate-y-1/2 bg-white h-[800px] overflow-y-scroll"
            >
                <button
                    @click="closePopup"
                    class="absolute top-0 right-0"
                >
                    <i class="bx bx-x bx-md text-neutral-500 hover:text-neutral-900 transition-colors duration-100"></i>
                </button>
                <h1 class="font-semibold text-center mt-[30px]">Compare Me</h1>
                <div class="flex flex-row m-[66px] gap-[68px]">
                    <div class="w-full flex flex-col">
                        <img
                            src="https://nazimco.com/wp-content/uploads/2015/06/placeholder-2-500x320.jpg"
                            alt="placeholder"
                            class="w-full h-[234px] object-cover"
                        />
                        <h5 class="font-semibold text-center mt-[19px]">{{ initialProduct.Name }}</h5>
                        <table
                            class="table-fixed label-1 font-semibold mt-[32px] border-separate border-spacing-[20px]"
                        >
                            <tbody>
                                <tr
                                    v-for="(value, key) in filteredInitialProduct"
                                    :key="key"
                                >
                                    <th class="text-left text-neutral-600 w-[100px]">{{ key }}</th>
                                    <td class="text-neutral-400">{{ value }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full flex flex-col">
                        <img
                            src="https://nazimco.com/wp-content/uploads/2015/06/placeholder-2-500x320.jpg"
                            alt="placeholder"
                            class="w-full h-[234px] object-cover"
                        />
                        <h5 class="font-semibold text-center mt-[19px]">{{ comparedProduct.Name }}</h5>
                        <table
                            class="table-fixed label-1 font-semibold mt-[32px] border-separate border-spacing-[20px]"
                        >
                            <tbody>
                                <tr v-for="(value, key) in filteredComparedProduct">
                                    <th class="text-left text-neutral-600 w-[100px]">{{ key }}</th>
                                    <td class="text-neutral-400">{{ value }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>
<script>
import DropDownCompare from '@/components/ui/DropDownCompare.vue';
export default {
    name: 'ComparePopup',
    data() {
        return {
            open: false,
            comparedProduct: {},
        };
    },
    methods: {
        openPopup(product) {
            this.open = true;
            this.comparedProduct = product;
        },
        closePopup() {
            this.open = false;
        },
    },
    components: {
        DropDownCompare,
    },
    props: {
        initialProduct: {
            type: Object,
            required: true,
        },
        remainingProducts: {
            type: Array,
            required: true,
        },
    },
    computed: {
        filteredInitialProduct() {
            return Object.keys(this.initialProduct)
                .filter((key) => key.toLowerCase() !== 'name')
                .reduce((obj, key) => {
                    obj[key] = this.initialProduct[key];
                    return obj;
                }, {});
        },
        filteredComparedProduct() {
            return Object.keys(this.comparedProduct)
                .filter((key) => key.toLowerCase() !== 'name')
                .reduce((obj, key) => {
                    obj[key] = this.comparedProduct[key];
                    return obj;
                }, {});
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
