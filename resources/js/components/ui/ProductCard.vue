<template>
    <div
        class="flex flex-col items-center"
        @click="handleClick"
    >
        <img
            :src="product.image"
            alt="Product Image"
            class="h-[140px] w-full object-cover"
        />
        <div class="bg-neutral-100 p-[12px] w-full">
            <!-- Truncate product name if it exceeds the width -->
            <h6 class="truncate-text">{{ product.name }}</h6>
            <h6 class="text-red-500">{{ product.price }}</h6>
            <p class="label-4 text-neutral-300">
                <s>{{ product.oldPrice }}</s>
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProductCard',
    props: {
        product: {
            type: Object,
            required: true,
        },
    },
    methods: {
        handleClick() {
            this.$emit('click', this.product.name);
        },
    },
};
</script>

<style scoped>
.truncate-text {
    white-space: nowrap; /* Ensure the text stays in one line */
    overflow: hidden; /* Hide the overflow */
    text-overflow: ellipsis; /* Show "..." when text overflows */
    width: 100%; /* Adjust width as necessary */
}
</style>
