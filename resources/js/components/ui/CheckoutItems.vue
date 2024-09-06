<template>
    <div class="bg-white custom-shadow">
        <div class="px-12 py-3 flex gap-5 items-center border-b-neutral-500 border-b justify-between">
            <div class="font-semibold label-4">
                Package{{ totalItems > 1 ? 's' : '' }} {{ totalItems }} of {{ totalItems }}
            </div>
            <Button
                variant="filled"
                size="xs"
                class="px-0"
            >
                <a
                    :href="storeLink"
                    class="font-medium label-4"
                >
                    Shipped by {{ storeName }}
                </a>
            </Button>
        </div>

        <div
            class="px-12 py-5 flex gap-5 items-center"
            v-for="item in items"
        >
            <img
                :src="item.image"
                :alt="`Photo of ${item.name}`"
            />
            <div class="flex flex-1 flex-col gap-2 justify-center">
                <div class="font-extrabold label-4">{{ item.name }}</div>
                <div class="font-medium label-4">{{ item.details }}</div>
            </div>
            <div class="px-10 font-medium label-4">₱{{ item.price }}</div>
            <div class="font-medium label-4">Qty: {{ item.quantity }}</div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CheckoutItems',
    props: {
        storeName: String,
        storeLink: String,
        items: Array,
    },
    computed: {
        totalItems() {
            return this.items.length;
        },
    },
};
</script>
