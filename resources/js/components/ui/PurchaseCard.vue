<template>
    <div class="mb-[2rem] custom-shadow">
        <!-- Store name -->
        <div
            class="flex items-center justify-between gap-[10px] w-[1006px] h-[39px] px-[32px] bg-primary-800 border-b border-neutral-500"
        >
            <!-- Leftmost content -->
            <div class="flex items-center gap-2">
                <input
                    :id="'checkbox' + storeName"
                    type="checkbox"
                    v-model="checked"
                    class="w-[21px] h-[21px] text-blue-600 bg-neutral-300 border-neutral-300 focus:ring-blue-500 focus:ring-2"
                />
                <p class="label-4 font-semibold text-white">{{ storeName }}</p>
            </div>

            <!-- Rightmost content -->
            <div class="flex flex-row gap-5 items-center">
                <p class="label-4 font-semibold text-white">{{ parcelStatus }}</p>
                <div class="w-[1px] h-[26px] bg-neutral-400"></div>
                <p class="label-4 font-semibold text-white">{{ orderStatus }}</p>
            </div>
        </div>

        <!-- Product Listing -->
        <div
            v-for="product in products"
            :key="product.id"
            class="flex items-center justify-between gap-[10px] w-[1006px] h-[102px] px-[32px] bg-primary-800"
        >
            <div class="flex items-center gap-[20px]">
                <img
                    :src="product.image"
                    alt="Product Image"
                    class="w-[52px] h-[52px]"
                />
                <div>
                    <p class="label-4 font-bold mb-[6px] text-white">{{ product.name }}</p>
                    <p class="label-4 font-medium text-white">{{ product.details }}</p>
                </div>
            </div>
            <p class="label-4 font-medium text-white">{{ product.price }}</p>
        </div>

        <!-- Total Price -->
        <div class="h-[160px] w-[1006px] bg-white px-[35px] py-[25px] flex flex-col gap-[20px]">
            <div class="flex items-center justify-end gap-10 h-[45px]">
                <p class="label-2">Order Total:</p>
                <p class="label-1 font-bold">{{ orderTotal }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <p class="label-5 font-medium text-neutral-400">Last Action</p>
                    <p class="label-5 font-medium text-neutral-400">Action at {{ lastActionDate }}</p>
                </div>
                <div class="flex items-center justify-end gap-[12px] h-[45px]">
                    <template v-if="isActivePurchase">
                        <custom-button
                            :variant="'filled'"
                            :size="'sm'"
                            :color="'green'"
                            class="gap-[10px]"
                        >
                            <i class="bx bxs-crown text-[15px]"></i>
                            <p class="label-4 font-semibold">Visit Store</p>
                        </custom-button>
                        <custom-button
                            :variant="'outline'"
                            :size="'sm'"
                            :color="'red'"
                            class="gap-[10px]"
                        >
                            <p class="label-4 font-semibold">Cancel/Refund</p>
                        </custom-button>
                    </template>
                    <template v-else>
                        <custom-button
                            :variant="'filled'"
                            :size="'sm'"
                            :color="'yellow'"
                            class="gap-[10px]"
                        >
                            <p class="label-3 font-semibold">Rate</p>
                        </custom-button>
                        <custom-button
                            :variant="'filled'"
                            :size="'sm'"
                            :color="'gray'"
                            class="gap-[10px] w-[170px]"
                        >
                            <p class="label-3 font-semibold">Buy Again</p>
                        </custom-button>
                        <custom-button
                            :variant="'filled'"
                            :size="'sm'"
                            :color="'green'"
                            class="gap-[10px] w-[170px]"
                        >
                            <i class="bx bxs-crown text-[15px]"></i>
                            <p class="label-4 font-semibold">Visit Store</p>
                        </custom-button>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Button from './Button.vue';
import { useRoute } from 'vue-router';

export default {
    name: 'PurchaseCard',
    components: {
        'custom-button': Button,
    },
    props: {
        storeName: String,
        parcelStatus: String,
        orderStatus: String,
        products: Array,
        orderTotal: String,
        lastActionDate: String,
    },
    data() {
        return {
            checked: false,
        };
    },
    computed: {
        isActivePurchase() {
            const route = useRoute();
            return route.path === '/purchase/active';
        },
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
