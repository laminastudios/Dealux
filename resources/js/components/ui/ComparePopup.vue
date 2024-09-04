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
                                    v-for="(value, key) in initialProduct"
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
                                <tr v-for="(value, key) in comparedProduct">
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
            initialProduct: {
                Name: 'iPhone 15 Pro Max',
                Network: 'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                Launch: '2023, September 12',
                Dimension: '159.9 x 76.7 x 8.3 mm (6.30 x 3.02 x 0.33 in)',
                Weight: '221 g (7.80 oz)',
                Resolution: '1290 x 2796 pixels, 19.5:9 ratio (~460 ppi density)',
                Chipset: 'Apple A17 Pro (3 nm)',
                GPU: 'Apple GPU (6-core graphics)',
                Features: 'Dual-LED dual-tone flash, HDR (photo/panorama)',
                Modules: '12 MP, f/1.9, 23mm (wide), 1/3.6", PDAF, OIS',
                Sensors: 'Face ID, accelerometer, gyro, proximity, compass, barometer',
                Battery: 'Li-Ion 4441 mAh, non-removable',
                Colors: 'Black Titanium, White Titanium, Blue Titanium, Natural Titanium',
            },
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
        initialProducts: {
            type: Object,
            required: true,
        },
        remainingProducts: {
            type: Array,
            required: true,
        },
    },
    computed: {
        // filteredInitialProduct() {
        //     return Object.keys(this.initialProduct)
        //         .filter((key) => key.toLowerCase() !== 'name')
        //         .reduce((obj, key) => {
        //             obj[key] = this.initialProduct[key];
        //             return obj;
        //         }, {});
        // },
        // filteredComparedProduct() {
        //     return Object.keys(this.comparedProduct)
        //         .filter((key) => key.toLowerCase() !== 'name')
        //         .reduce((obj, key) => {
        //             obj[key] = this.comparedProduct[key];
        //             return obj;
        //         }, {});
        // },
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
