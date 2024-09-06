<template>
    <div class="bg-white text-neutral-700 leading-4 custom-shadow">
        <div class="px-12 py-3 flex gap-5 items-center border-b-neutral-700 border-b-[1.2px] justify-between">
            <div class="font-semibold">Shipping Address</div>
            <Button
                variant="filled"
                size="xs"
                class="px-0"
            >
                <span class="font-medium text-sm text-neutral-700">Edit</span>
            </Button>
        </div>

        <div class="flex flex-col gap-5 px-12 py-5">
            <div class="flex gap-8">
                <span class="font-semibold">{{ userName }}</span>
                <span>{{ contactNumber }}</span>
            </div>
            <span>{{ address }}</span>
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
