<template>
    <div class="w-fit py-1 flex h-fit justify-center text-center">
        <button
            class="px-2 py-0 font-semibold text-xl bg-primary-100 text-black flex-2"
            @click="decrementQuantity"
        >
            -
        </button>
        <span class="bg-primary-50 text-black flex items-center label-4 font-semibold px-3">
            {{ itemQuantity }}
        </span>
        <button
            class="bg-primary-100 text-black px-2 py-0 font-semibold text-xl hover:bg-primary-100"
            @click="incrementQuantity"
        >
            +
        </button>
    </div>
</template>

<script>
export default {
    name: 'InputSpinner',
    data() {
        return {
            itemQuantity: this.quantity,
        };
    },
    props: {
        quantity: {
            type: Number,
            default: 0,
        },
    },
    methods: {
        decrementQuantity() {
            return this.itemQuantity === 0 ? 0 : this.itemQuantity--;
        },
        incrementQuantity() {
            return this.itemQuantity++;
        },
    },
};
</script>

<style scoped></style>
