<template>
    <div class="bg-white w-[380px] h-fit py-10 px-7 flex flex-col gap-7 custom-shadow">
        <div>
            <div class="flex justify-between items-center">
                <div class="font-extrabold label-2">Payment Method</div>
            </div>

            <!-- temporary -->
            <div class="mt-3 flex flex-col gap-0">
                <div class="bg-neutral-200 flex justify-between px-4 items-center py-4">
                    <div class="font-medium leading-4">Credit/Debit Card</div>
                    <div class="bg-neutral-100 w-5 h-5 rounded-full"></div>
                </div>
                <div class="bg-neutral-200 mt-3 flex justify-between px-4 items-center py-4">
                    <div class="font-medium leading-4">Credit/Debit Card</div>
                    <div class="bg-neutral-100 w-5 h-5 rounded-full"></div>
                </div>
            </div>
        </div>

        <div>
            <div class="font-bold label-2">Voucher</div>
            <div class="flex gap-2 justify-stretch mt-3 px-4">
                <input
                    type="text"
                    placeholder="Enter Voucher Code"
                    class="w-full bg-primary-50 custom-shadow border-0 label-4 font-semibold placeholder-neutral-400"
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
            <div class="font-bold label-2">Order Summary</div>
            <div class="flex flex-col gap-3 mt-3 px-4">
                <div class="flex justify-between">
                    <div class="font-medium label-4">
                        Subtotal ({{ totalItems }} item{{ totalItems > 1 ? 's' : '' }})
                    </div>
                    <div class="font-semibold label-4">₱{{ priceSubtotal }}</div>
                </div>
                <div class="flex justify-between">
                    <div class="font-medium label-4">Shipping Fee</div>
                    <div class="font-semibold label-4">₱{{ shippingFee }}</div>
                </div>
            </div>
        </div>

        <div class="border-t border-t-neutral-500 pt-3 px-4 flex flex-col gap-3">
            <div class="flex justify-between">
                <div class="font-medium label-4">Total</div>
                <div class="font-semibold label-4">₱{{ shippingFee + priceSubtotal }}</div>
            </div>
            <Button
                variant="filled"
                color="neutral-200"
                hoverColor="neutral-300"
                @click="initiateCheckout"
            >
                <span class="font-semibold">Place Order</span>
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
        totalItems: Number,
        priceSubtotal: Number,
        shippingFee: Number,
    },
    methods: {
        initiateCheckout() {
            this.$emit('initiateCheckout');
        },
    },
};
</script>
