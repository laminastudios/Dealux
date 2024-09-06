<template>
    <!-- TODO: w-380px might change for better responsiveness -->
    <div class="flex w-[380px] flex-col gap-5 bg-white px-5 py-6 h-fit custom-shadow text-black">
        <div class="font-bold label-2">Order Summary</div>

        <div class="flex flex-col gap-6 px-6 w-full">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-4">
                    <div class="flex justify-between">
                        <div class="font-medium label-4">
                            Subtotal ({{ totalItems }} item{{ totalItems > 1 ? 's' : '' }})
                        </div>
                        <div class="font-semibold label-4">₱{{ priceSubtotal }}</div>
                    </div>
                    <div class="flex justify-between">
                        <div class="font-medium label-4">Shipping Fee</div>
                        <div class="font-semibold label-4">₱{{ totalShippingFee }}</div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-7 pt-5 border-t border-t-black">
                <div class="flex justify-between gap-3">
                    <div class="font-medium label-4">Total</div>
                    <div class="font-semibold label-4">₱{{ totalPrice() }}</div>
                </div>

                <RouterLink
                    class="w-full"
                    to="/checkout"
                >
                    <Button
                        color="yellow"
                        class="w-full"
                    >
                        <span class="label-4 font-semibold"> Proceed to Checkout </span>
                    </Button>
                </RouterLink>
            </div>
        </div>
    </div>
</template>

<script>
import { RouterLink } from 'vue-router';
import Button from './Button.vue';
import Input from './Input.vue';

export default {
    name: 'OrderSummary',
    props: {
        totalItems: Number,
        priceSubtotal: Number,
        totalShippingFee: Number,
    },
    components: {
        Button,
        Input,
    },
    computed: {},
    methods: {
        totalPrice() {
            return `${this.priceSubtotal + this.totalShippingFee}`;
        },
    },
};
</script>
