<template>
    <section class="py-10 bg-white mx-lg flex justify-center items-center">
        <div class="bg-neutral-100 w-[1216px] h-[624px] grid grid-cols-12 gap-6 w-3/4 mt-[80px] mb-[354px]">
            <!-- Product Image-->
            <div class="col-span-8 mt-[44px] mb-[236px] ml-[91px] mr-[85px]">
                <img
                    src="/assets/image_placeholder.jpg"
                    alt="Product Image"
                    class="border border-primary-700 mb-4 w-full h-[400px]"
                />

                <!--Thumbnails -->
                <ProductImageThumbnail :thumbnails="thumbnailImages" />
            </div>

            <!-- Product Details -->
            <div class="col-span-4 mt-[44px] mb-[44px] flex flex-col justify-start">
                <div class="flex justify-between items-center mb-4">
                    <h6 class="font-semibold text-neutral-800 mr-[11px]">Product Name</h6>

                    <button
                        class="flex items-center justify-center w-[100px] h-[28px] bg-neutral-600 label-4 font-semibold text-white px-33 py-3 gap-2 mr-[66px] ml-[5px]"
                    >
                        <i class="bx bxs-crown w-[12px] h-[12px]"></i>
                        Visit Store
                    </button>
                </div>

                <div class="flex items-center mb-4">
                    <span class="text-neutral-800 label-3 font-semibold mr-[8px]">4.5</span>
                    <span class="text-black">
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star"></i>
                        <i class="bx bxs-star-half"></i>
                    </span>

                    <span class="text-black w-[1px] h-[21px] ml-[11px]">|</span>
                    <span class="text-neutral-800 label-3 font-semibold ml-[15px]">538 Ratings</span>
                    <span class="text-black w-[1px] h-[21px] ml-[11px]">|</span>
                    <span class="text-neutral-800 label-3 font-semibold ml-[15px]">2.2k Sold</span>
                </div>
                <!-- Horizontal Line -->
                <hr class="border-neutral-500 w-[318px] h-[1px] mt-[8px] mb-[18px]" />

                <div class="mb-4">
                    <h6 class="text-red-500 font-semibold">₱256</h6>

                    <label class="text-neutral-300 label-3 font-medium ml-2">₱699</label>
                    <label class="text-neutral-300 label-3 font-medium ml-2">-57%</label>
                </div>
                <!-- Horizontal Line -->
                <hr class="border-neutral-500 w-[318px] h-[1px] mt-[21px] mb-[21px]" />

                <div class="mb-4 flex items-center justify-between mb-[148px]">
                    <label class="text-neutral-500 label-2 font-semibold">Specifications</label>

                    <button
                        class="flex items-center justify-center mr-[66px] w-[138px] h-[32px] bg-neutral-300 label-4 font-semibold text-black px-33 py-3 gap-2"
                        @click="openFilterModal"
                    >
                        Compare Me <i class="bx bx-git-compare"></i>
                    </button>
                </div>

                <!-- Inline styling for quantity and availability -->
                <div class="flex items-center gap-4 mb-4 mb-[38px]">
                    <label
                        for="quantity"
                        class="text-neutral-400 label-4 font-semibold"
                        >Quantity</label
                    >

                    <InputSpinner
                        :quantity="quantity"
                        @update:quantity="updateQuantity"
                        class="flex-shrink-0"
                    />

                    <label
                        for="quantity"
                        class="text-neutral-400 label-4 font-semibold"
                        >936 Pieces Available</label
                    >
                </div>

                <div class="flex space-x-4">
                    <button class="bg-neutral-300 text-black label-4 font-semibold px-6 py-2 w-[138px] h-[32px]">
                        Buy Now
                    </button>
                    <button class="bg-neutral-300 text-black label-4 font-semibold px-6 py-2 w-[138px] h-[32px]">
                        Add to Cart
                        <i class="bx bx-cart w-[12px] h-[12]px"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import ProductImageThumbnail from '../components/ui/ProductImageThumbnail.vue';
import InputSpinner from '../components/ui/InputSpinner.vue';

export default {
    name: 'ProductPage',
    components: {
        ProductImageThumbnail,
        InputSpinner,
    },
    data() {
        return {
            quantity: 2,
            thumbnailImages: [
                { src: '/assets/image_placeholder.jpg', alt: 'Thumbnail 1' },
                { src: '/assets/image_placeholder.jpg', alt: 'Thumbnail 2' },
                { src: '/assets/image_placeholder.jpg', alt: 'Thumbnail 3' },
                { src: '/assets/image_placeholder.jpg', alt: 'Thumbnail 4' },
                { src: '/assets/image_placeholder.jpg', alt: 'Thumbnail 5' },
                { src: '/assets/image_placeholder.jpg', alt: 'Thumbnail 6' },
            ],
        };
    },
    methods: {
        updateQuantity(newQuantity) {
            this.quantity = newQuantity;
        },
        openFilterModal() {},
    },
};
</script>

<style scoped>
/* Add Styles Here */
</style>
