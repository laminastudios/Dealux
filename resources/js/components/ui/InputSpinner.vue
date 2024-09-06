<template>
    <div class="w-fit py-1 flex h-fit justify-center text-center font-bold label-4 text-black">
        <button
            class="px-2 py-0 text-xl bg-primary-100 flex-2 hover:bg-primary-200"
            @click="decrementQuantity"
        >
            -
        </button>
        <span class="bg-primary-50 flex items-center px-5">
            {{ itemQuantity }}
        </span>
        <button
            class="bg-primary-100 px-2 py-0 hover:bg-primary-200"
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
