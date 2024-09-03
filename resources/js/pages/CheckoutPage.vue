<template>
    <section class="min-h-screen">
        <div class="container border flex gap-4 justify-center my-10">
            <div class="flex flex-col gap-4 flex-1">
                <ShippingInfoSection />
                <!-- TODO: <CheckoutItems /> -->
            </div>
            <!-- TODO: <BillingInfoSection /> -->
        </div>
    </section>
</template>

<script>
import axios from 'axios';

import ShippingInfoSection from '../components/ui/ShippingInfoSection.vue';

export default {
    name: 'CheckoutPage',
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
    components: {
        ShippingInfoSection,
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
