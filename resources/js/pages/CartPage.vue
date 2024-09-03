<template>
    <section class="min-h-screen mx-auto">
        <div class="flex gap-5 justify-center container my-10">
            <div class="flex-1 h-full flex flex-col gap-5">
                <div class="bg-neutral-100 px-4 py-2 flex justify-between">
                    <div class="flex items-center gap-2 text-sm">
                        <input
                            type="checkbox"
                            class="accent-neutral-300 bg-neutral-300"
                        />
                        <span class="font-medium leading-4">
                            Select All ({{ allItems.length }} item{{ allItems.length > 1 ? 's' : '' }})
                        </span>
                    </div>
                    <Button
                        variant="filled"
                        class="gap-1 px-0"
                    >
                        <i class="bx bx-trash font-semibold text-neutral-700 text-sm"></i>
                        <span class="font-semibold leading-4 text-sm text-neutral-700">Delete</span>
                    </Button>
                </div>

                <StoreCartItems
                    v-for="store in stores"
                    v-show="store.items.length > 0"
                    :key="store.id"
                    :storeName="store.name"
                    :storeURL="store.link"
                    :items="store.items"
                />
            </div>

            <OrderSummary
                :totalItems="allItems.length"
                :priceSubtotal="priceSubtotal"
                :totalShippingFee="totalShippingFee"
            />
        </div>
    </section>
</template>

<script>
import StoreCartItems from '../components/ui/StoreCartItems.vue';
import OrderSummary from '../components/ui/OrderSummary.vue';
import Button from '../components/ui/Button.vue';

export default {
    name: 'CartPage',
    data() {
        return {
            stores: [
                {
                    id: 1,
                    name: 'Store A',
                    link: '#',
                    items: [
                        {
                            id: 1,
                            name: 'Product A',
                            details: '128x128, round',
                            price: 69,
                            shippingFee: 10,
                            quantity: 2,
                            image: 'https://placehold.co/84x67',
                        },
                        {
                            id: 2,
                            name: 'Product A1',
                            details: '128x128, round',
                            price: 420,
                            shippingFee: 10,
                            quantity: 1,
                            image: 'https://placehold.co/84x67',
                        },
                    ],
                },
                {
                    id: 2,
                    name: 'Store B',
                    link: '#',
                    items: [
                        {
                            id: 1,
                            name: 'Product B',
                            details: '128x128, round',
                            price: 69_420,
                            shippingFee: 10,
                            quantity: 2,
                            image: 'https://placehold.co/84x67',
                        },
                    ],
                },
            ],
        };
    },
    computed: {
        priceSubtotal() {
            return this.allItems.reduce((total, item) => total + item.price, 0);
        },
        totalShippingFee() {
            return this.allItems.reduce((shippingFee, item) => shippingFee + item.shippingFee, 0);
        },
        allItems() {
            return Array.from(this.stores, (store) => store.items).flat();
        },
    },
    components: {
        StoreCartItems,
        OrderSummary,
        Button,
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
