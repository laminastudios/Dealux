<template>
    <div class="flex w-[380px] flex-col gap-5 bg-neutral-100 px-5 py-6 h-fit">
        <div class="font-bold text-md leading-4">Order Summary</div>

        <div class="flex flex-col gap-10 px-6 w-full text-neutral-700">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-4">
                    <div class="flex justify-between">
                        <div class="font-medium leading-4">
                            Subtotal ({{ totalItems }} item{{ totalItems > 1 ? 's' : '' }})
                        </div>
                        <div class="font-semibold leading-4">₱{{ priceSubtotal }}</div>
                    </div>
                    <div class="flex justify-between">
                        <div class="font-medium leading-4">Shipping Fee</div>
                        <div class="font-semibold leading-4">₱{{ shippingFee }}</div>
                    </div>
                </div>

                <div class="flex gap-2 justify-stretch">
                    <Input
                        type="text"
                        label="Voucher Code"
                        placeholder="Enter Voucher Code"
                        class="w-full text-center bg-neutral-200"
                    />
                    <Button
                        variant="filled"
                        color="neutral-400"
                        class="font-semibold leading-4"
                        hoverColor="neutral-600"
                        >Apply</Button
                    >
                </div>
            </div>

            <div class="flex flex-col gap-7">
                <div class="flex justify-between gap-3">
                    <div class="font-medium leading-4">Total</div>
                    <div class="font-semibold leading-4">₱{{ totalPrice() }}</div>
                </div>

                <Button
                    variant="filled"
                    color="neutral-200"
                    hoverColor="neutral-400"
                    class="font-semibold leading-4 text-neutral-700"
                    >Proceed to Checkout</Button
                >
            </div>
        </div>
    </div>
</template>

<script>
import Button from './Button.vue';
import Input from 'postcss/lib/input';

export default {
    name: 'OrderSummary',
    props: {
        totalItems: {
            type: Number,
            default: 1,
        },
        priceSubtotal: {
            type: Number,
            default: 0,
        },
        shippingFee: {
            type: Number,
            default: 0,
        },
    },
    components: {
        Button,
    },
    computed: {},
    methods: {
        totalPrice() {
            return `${this.priceSubtotal + this.shippingFee}`;
        },
    },
};
</script>
