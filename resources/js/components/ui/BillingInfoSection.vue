<template>
    <div class="bg-white w-[380px] h-fit py-10 px-7 text-neutral-700 flex flex-col gap-7 custom-shadow">
        <div>
            <div class="flex justify-between items-center">
                <div class="font-bold text-neutral-800">Payment Method</div>
                <div class="font-medium text-sm leading-4">
                    <a href="#"> View all methods > </a>
                </div>
            </div>

            <!-- temporary -->
            <div class="mt-3 flex flex-col gap-0">
                <div class="bg-neutral-200 flex justify-between px-4 items-center py-4">
                    <div class="text-neutral-700 font-medium leading-4">Credit/Debit Card</div>
                    <div class="bg-neutral-100 w-5 h-5 rounded-full"></div>
                </div>
                <div class="bg-neutral-200 mt-3 flex justify-between px-4 items-center py-4">
                    <div class="text-neutral-700 font-medium leading-4">Credit/Debit Card</div>
                    <div class="bg-neutral-100 w-5 h-5 rounded-full"></div>
                </div>
            </div>
        </div>

        <div>
            <div class="font-bold text-neutral-800">Voucher</div>
            <div class="flex gap-2 justify-stretch mt-3 px-4">
                <Input
                    type="text"
                    label="Voucher Code"
                    placeholder="Enter Voucher Code"
                    class="w-full bg-neutral-200 h-fit"
                />
                <Button
                    variant="filled"
                    color="neutral-400"
                    class="font-semibold leading-4"
                    hoverColor="neutral-600"
                >
                    Apply
                </Button>
            </div>
        </div>

        <div>
            <div class="font-bold text-neutral-800">Order Summary</div>
            <div class="flex flex-col gap-3 mt-3 px-4">
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
        </div>

        <div class="border-t border-t-neutral-500 pt-3 px-4 flex flex-col gap-3">
            <div class="flex justify-between">
                <div class="font-medium leading-4">Total</div>
                <div class="font-semibold leading-4">₱{{ shippingFee + priceSubtotal }}</div>
            </div>
            <Button
                variant="filled"
                color="neutral-200"
                hoverColor="neutral-300"
                @click="initiateCheckout"
            >
                <span class="font-semibold text-sm text-black">Place Order</span>
            </Button>
        </div>
    </div>
</template>

<script>
import Button from './Button.vue';
import Input from './Input.vue';
export default {
    name: 'BillingInfoSection',
    components: {
        Button,
        Input,
    },
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
    methods: {
        initiateCheckout() {
            this.$emit('initiateCheckout');
        },
    },
};
</script>
