<template>
    <div class="bg-white text-neutral-700 custom-shadow">
        <div class="px-12 py-3 flex gap-5 items-center border-b-neutral-700 border-b-[1.2px] justify-between">
            <div class="font-medium text-neutral-700">
                Package{{ totalItems > 1 ? 's' : '' }} {{ totalItems }} of {{ totalItems }}
            </div>
            <Button
                variant="filled"
                size="xs"
                class="px-0"
            >
                <a
                    :href="storeLink"
                    class="font-medium text-neutral-700"
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
                class="border border-black"
            />
            <div class="flex flex-1 flex-col gap-2 justify-center">
                <div class="font-extrabold">{{ item.name }}</div>
                <div>{{ item.details }}</div>
            </div>
            <div class="px-10">₱{{ item.price }}</div>
            <div>Qty: {{ item.quantity }}</div>
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
