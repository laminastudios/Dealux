<template>
    <div class="bg-white leading-4 custom-shadow">
        <div class="px-12 py-3 flex gap-5 items-center border-b-neutral-500 border-b justify-between">
            <div class="font-semibold label-4">Shipping Address</div>
            <button class="flex items-center">
                <span class="font-medium label-4">Edit</span>
            </button>
        </div>

        <div class="flex flex-col gap-5 px-12 py-5">
            <div class="flex gap-8">
                <span class="font-semibold label-4">{{ userName }}</span>
                <span class="font-medium label-4">{{ contactNumber }}</span>
            </div>
            <span class="font-medium label-4">{{ address }}</span>
        </div>
    </div>
</template>

<script>
import Button from '../ui/Button.vue';

export default {
    name: 'ShippingInfoSection',
    components: {
        Button,
    },
    props: {
        userName: {
            type: String,
            default: 'Person A',
        },
        address: {
            type: String,
            default: '123 Street',
        },
        contactNumber: {
            type: String,
            default: '+63123456789',
        },
    },
};
</script>
