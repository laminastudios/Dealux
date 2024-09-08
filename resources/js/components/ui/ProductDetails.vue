<template>
    <div>
        <!-- Product Name and Visit Store Button -->
        <div class="flex justify-between items-center mb-4">
            <h6 class="font-semibold text-neutral-800 mr-[11px]">{{ product.name }}</h6>
            <custom-button
                variant="filled"
                color="green"
                size="xs"
                class="gap-2 ml-[5px]"
            >
                <i class="bx bxs-crown"></i> Visit Store
            </custom-button>
        </div>

        <!-- Ratings and Reviews -->
        <div class="flex items-center mb-4">
            <span class="text-neutral-800 label-3 font-semibold mr-[8px] underline">{{ averageRating || 0 }}</span>
            <span class="text-yellow-300">
                <i
                    v-for="n in 5"
                    :key="n"
                    :class="{
                        'bx bxs-star': n <= Math.floor(averageRating),
                        'bx bxs-star-half': n === Math.ceil(averageRating) && averageRating % 1 !== 0,
                        'bx bx-star': n > averageRating,
                    }"
                ></i>
            </span>

            <span class="text-black w-[1px] h-[21px] ml-[11px]">|</span>
            <span class="text-neutral-800 label-3 font-semibold ml-[15px]">
                <span class="underline">{{ totalRatings || 0 }}</span> Ratings
            </span>

            <span class="text-black w-[1px] h-[21px] ml-[11px]">|</span>
            <span class="text-neutral-800 label-3 font-semibold ml-[15px]">
                <span class="underline">{{ totalSold || 0 }}</span> Sold
            </span>
        </div>

        <!-- Horizontal Line -->
        <hr class="border-neutral-500 w-[455px] h-[1px] mt-[21px] mb-[21px]" />

        <!-- Product Price and Compare Button -->
        <div class="mb-4">
            <div class="flex items-center justify-between">
                <h6 class="text-red-500 font-semibold">{{ product.price }}</h6>

                <ComparePopup
                    :initialProduct="initialProduct"
                    :remainingProducts="remainingProducts"
                    class="bg-blue-100 rounded-[5px] flex items-center justify-center w-[170px] h-[28px] gap-2 mt-8"
                >
                    <p class="label-4 font-semibold">Compare Me</p>
                    <i class="bx bx-git-compare text-[18px]"></i>
                </ComparePopup>
            </div>

            <!-- Original Price and Discount -->
            <div class="flex items-center mt-2">
                <label class="text-neutral-300 label-3 font-medium line-through mr-4">{{
                    product.originalPrice
                }}</label>
                <label class="text-neutral-300 label-3 font-medium">{{ product.discount }}</label>
            </div>
        </div>

        <!-- Horizontal Line -->
        <hr class="border-neutral-500 w-[455px] h-[1px] mt-[21px] mb-[21px]" />

        <!-- Product Specifications -->
        <div class="flex flex-col space-y-4 mb-4">
            <div
                v-for="(spec, index) in product.specifications"
                :key="index"
            >
                <div class="flex items-start">
                    <span class="font-semibold text-black label-4 w-[160px] mr-[53px]">{{ spec.label }}</span>
                    <div class="flex flex-wrap gap-2 ml-[3px]">
                        <span
                            v-for="(item, idx) in spec.values"
                            :key="idx"
                            class="text-neutral-600 font-semibold label-4 border border-neutral-400 rounded-[5px] w-[150px] h-[28px] inline-flex items-center justify-center ml-[5px] border-[1px]"
                        >
                            {{ item }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quantity and Availability -->
        <div class="flex items-center gap-4 mt-[29px] mb-[43px]">
            <label
                for="quantity"
                class="text-neutral-400 label-4 font-semibold"
                >Quantity</label
            >
            <InputSpinner
                :quantity="quantity"
                @update:quantity="updateQuantity"
                class="flex-shrink-0"
            />
            <label
                for="quantity"
                class="text-neutral-400 label-4 font-semibold"
                >936 Pieces Available</label
            >
        </div>

        <!-- Buy and Add to Cart Buttons -->
        <div class="flex space-x-4 mb-[38px]">
            <custom-button
                variant="filled"
                color="yellow"
                size="xs"
                class="font-semibold px-6 py-2 w-[137px]"
            >
                Buy Now
            </custom-button>

            <custom-button
                variant="outline"
                color="yellow"
                size="xs"
                class="font-semibold px-6 py-2"
            >
                Add to Cart
            </custom-button>
        </div>
    </div>
</template>

<script>
import InputSpinner from './InputSpinner.vue';
import ComparePopup from './ComparePopup.vue';
import CustomButton from './Button.vue';

export default {
    name: 'ProductDetails',
    components: {
        ComparePopup,
        InputSpinner,
        CustomButton,
    },
    props: {
        product: {
            type: Object,
            required: true,
        },
        averageRating: {
            type: Number,
            default: 0,
        },
        totalRatings: {
            type: Number,
            default: 0,
        },
        totalSold: {
            type: Number,
            default: 0,
        },
        quantity: {
            type: Number,
            default: 1,
        },
        remainingProducts: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            showComparePopup: false, // Control visibility
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
            remainingProducts: [
                {
                    Name: 'iPhone 15 Pro Max 2',
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
                {
                    Name: 'iPhone 15 Pro Max 3',
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
                {
                    Name: 'iPhone 15 Pro Max 4',
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
            ],
        };
    },
    methods: {
        updateQuantity(newQuantity) {
            this.$emit('update:quantity', newQuantity);
        },
    },
};
</script>

<style scoped>
/* Add any component-specific styles here */
</style>
