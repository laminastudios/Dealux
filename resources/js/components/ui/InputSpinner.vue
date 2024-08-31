<template>
    <div class="w-fit py-1 flex h-fit justify-center text-center">
        <button
            class="px-2 py-0 font-semibold text-xl bg-neutral-400 text-neutral-600 flex-2 hover:bg-neutral-500 hover:text-neutral-50"
            @click="decrementQuantity"
        >
            -
        </button>
        <span class="bg-neutral-300 text-neutral-50 flex items-center px-3">
            {{ itemQuantity }}
        </span>
        <button
            class="bg-neutral-400 text-neutral-600 px-2 py-0 font-semibold text-xl hover:bg-neutral-500 hover:text-neutral-50"
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
