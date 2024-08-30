<template>
    <section class="min-h-screen">
        <div class="container border border-blue-500 h-full flex flex-col items-center justify-center">
            <h1 class="text-2xl font-bold mb-4">Maayong gabii</h1>
            <h2 class="text-xl mb-6">This page's development has started!</h2>
            <!-- Add more content here -->
            <button
                @click="initiateCheckout"
                class="btn-primary"
            >
                Checkout
            </button>
        </div>
    </section>
</template>

<script>
import axios from 'axios';

export default {
    name: 'CheckoutPage',
    methods: {
        async initiateCheckout() {
            try {
                const response = await axios.post('/api/checkout');
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
};
</script>

<style scoped>
h1,
h2 {
    color: #333;
    text-align: center;
}
.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 0.375rem;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.btn-primary:hover {
    background-color: #0056b3;
}
</style>
