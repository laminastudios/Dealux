<template>
    <div class="flex flex-col">
        <!-- Product Image -->
        <img
            :src="mainImage"
            alt="Product Image"
            class="border border-primary-700 w-[525px] h-[344px] mb-[38px] object-contain"
        />
        <!-- Thumbnails -->
        <ProductImageThumbnail
            :thumbnails="thumbnailImages"
            @thumbnail-click="updateMainImage"
        />
    </div>
</template>

<script>
import ProductImageThumbnail from './ProductImageThumbnail.vue';

export default {
    name: 'ProductImage',
    components: { ProductImageThumbnail },
    props: {
        mainImage: String,
        thumbnailImages: Array,
    },
    methods: {
        updateMainImage(image) {
            this.$emit('updateMainImage', image);
        },
    },
};
</script>
<style scoped></style>
