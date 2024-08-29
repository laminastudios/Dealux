<template>
    <div class="flex flex-col items-center">
        <img
            :src="product.image"
            alt="Product Image"
            class="h-[140px] w-full object-cover"
        />
        <div class="bg-neutral-100 p-[12px] w-full">
            <h6>{{ product.name }}</h6>
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
};
</script>
