<template>
    <section class="min-h-screen">
        <div class="container flex gap-4 justify-center my-10">
            <div class="flex flex-col gap-4 flex-1">
                <ShippingInfoSection />
                <CheckoutItems
                    v-for="store in stores"
                    :key="id"
                    :storeName="store.name"
                    :storeLink="store.link"
                    :items="store.items"
                />
            </div>
            <BillingInfoSection
                :priceSubtotal="priceSubtotal"
                :shippingFee="totalShippingFee"
            />
        </div>
    </section>
</template>

<script>
import axios from 'axios';

import ShippingInfoSection from '../components/ui/ShippingInfoSection.vue';
import CheckoutItems from '../components/ui/CheckoutItems.vue';
import BillingInfoSection from '../components/ui/BillingInfoSection.vue';

export default {
    name: 'CheckoutPage',
    data() {
        return {
            stores: [
                {
                    id: 1,
                    name: 'Store 1',
                    link: '#',
                    items: [
                        {
                            id: 1,
                            name: 'Product 1.1',
                            details: 'Color, size',
                            price: 123,
                            shippingFee: 10,
                            quantity: 1,
                            image: 'https://placehold.co/84x67',
                        },
                        {
                            id: 2,
                            name: 'Product 1.2',
                            details: 'Color, size',
                            price: 456,
                            shippingFee: 10,
                            quantity: 2,
                            image: 'https://placehold.co/84x67',
                        },
                    ],
                },
                {
                    id: 2,
                    name: 'Store 2',
                    items: [
                        {
                            id: 1,
                            name: 'Product 2.1',
                            details: 'Color, size',
                            price: 123,
                            shippingFee: 10,
                            quantity: 2,
                            image: 'https://placehold.co/84x67',
                        },
                    ],
                },
            ],
        };
    },
    methods: {
        async initiateCheckout() {
            try {
                const response = await axios.post('/api/post/checkout');
                const checkoutUrl = response.data.url;

                if (checkoutUrl) {
                    // Redirect to the Stripe Checkout page
                    window.location.href = checkoutUrl;
                }
            } catch (error) {
                console.error('Error during checkout:', error.response || error.message);
                alert('There was an error initiating the checkout. Please try again.');
            }
        },
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
        ShippingInfoSection,
        CheckoutItems,
        BillingInfoSection,
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
