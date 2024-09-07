<template>
    <div class="bg-white w-[380px] h-fit py-10 px-7 flex flex-col gap-7 custom-shadow">
        <div>
            <div class="flex justify-between items-center">
                <div class="font-extrabold label-2">Payment Method</div>
            </div>

            <!--
            TODO: was about to make a component for each payment method
                  but this section might be temporary
            -->
            <div class="mt-3 flex flex-col gap-3">
                <div class="flex flex-col gap-0">
                    <div class="bg-blue-50 px-4 py-2 font-semibold label-4 flex gap-2 items-center">
                        <img
                            src="/assets/visa_inc_logo.png"
                            alt="MasterCard logo"
                        />
                        ************1234
                    </div>
                    <div class="bg-blue-100 flex items-center justify-end px-2 py-1">
                        <span class="font-medium label-5 text-neutral-600 italic"> Credit Card </span>
                    </div>
                </div>

                <div class="flex flex-col gap-0">
                    <div class="bg-blue-50 px-4 py-2 font-semibold label-4 flex gap-2 items-center">
                        <img
                            src="/assets/mastercard_logo_small.png"
                            alt="MasterCard logo"
                        />
                        ************1234
                    </div>
                    <div class="bg-blue-100 flex items-center justify-end px-2 py-1">
                        <span class="font-medium label-5 text-neutral-600 italic"> Debit Card </span>
                    </div>
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
                    color="yellow"
                    class="font-semibold leading-4"
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
                color="yellow"
                @click="initiateCheckout"
                class="w-fit mx-auto"
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
