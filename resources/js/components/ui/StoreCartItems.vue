<template>
    <div class="flex flex-col leading-4">
        <div class="p-4 flex gap-5 items-center bg-neutral-100 border-b-neutral-700 border-b-[1.2px]">
            <div class="flex gap-5 flex-1">
                <input
                    type="checkbox"
                    class="accent-neutral-300 bg-neutral-300"
                />
                <div class="font-semibold w-full">
                    {{ storeName }}
                </div>
            </div>

            <custom-button
                variant="filled"
                color="neutral-600"
                hover-color="neutral-400"
                size="xs"
            >
                <div class="font-semibold flex items-center gap-2">
                    <i class="bx bxs-crown"></i>
                    <a :href="storeURL">Visit Store</a>
                </div>
            </custom-button>
        </div>

        <div class="flex flex-col">
            <CartItem
                v-for="item in items"
                :itemName="item.name"
                :description="item.description"
                :price="item.price"
                :quantity="item.quantity"
            />
        </div>
    </div>
</template>

<script>
import CartItem from './CartItem.vue';
import Button from './Button.vue';

export default {
    name: 'StoreCartItems',
    props: {
        items: {
            type: Array,
            default: [],
        },
        storeName: {
            type: String,
            default: 'None',
        },
        storeURL: {
            type: String,
            default: '',
        },
    },
    methods: {},
    components: {
        'custom-button': Button,
        CartItem,
    },
};
</script>
