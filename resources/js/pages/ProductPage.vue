<template>
    <section class="relative bg-background h-[auto]">
        <section class="py-10 mx-auto flex justify-center items-center">
            <div>
                <div class="bg-white w-[1216px] h-[auto] grid grid-cols-12 border shadow mt-[80px] mb-[30px]">
                    <!-- Product Image and Thumbnails -->
                    <div class="col-span-6 border-primary-700 w-[525px] mt-[44px] ml-[83px]">
                        <ProductImage
                            :mainImage="mainImage"
                            :thumbnailImages="thumbnailImages"
                            @updateMainImage="updateMainImage"
                        />
                    </div>

                    <!-- Product Details -->
                    <div class="col-span-6 mt-[44px] mb-[44px] flex flex-col justify-start w-[455px] ml-[79px] h-auto">
                        <ProductDetails
                            :product="product"
                            :averageRating="averageRating"
                            :totalRatings="totalRatings"
                            :totalSold="totalSold"
                        />
                    </div>
                </div>

                <!-- Product Specifications -->
                <ProductSpecifications :specifications="productSpecifications" />

                <!-- Ratings and Reviews -->
                <ProductRatingsReviews
                    :averageRating="averageRating"
                    :totalRatings="totalRatings"
                    :reviews="reviews"
                />
            </div>
        </section>
    </section>
</template>

<script>
import ProductImage from '../components/ui/ProductImage.vue';
import ProductDetails from '../components/ui/ProductDetails.vue';
import ProductSpecifications from '../components/ui/ProductSpecifications.vue';
import ProductRatingsReviews from '../components/ui/ProductRatingsReviews.vue';

export default {
    name: 'ProductPage',
    components: {
        ProductImage,
        ProductDetails,
        ProductSpecifications,
        ProductRatingsReviews,
    },
    data() {
        return {
            mainImage: '/assets/productMain.jpg',
            thumbnailImages: [
                { src: '/assets/productMain.jpg', alt: 'Main Image' },
                { src: '/assets/productImage1.jpg', alt: 'Thumbnail 1' },
                { src: '/assets/productImage2.jpg', alt: 'Thumbnail 2' },
                { src: '/assets/productImage3.jpg', alt: 'Thumbnail 3' },
                { src: '/assets/productImage4.jpg', alt: 'Thumbnail 4' },
                { src: '/assets/productImage5.jpg', alt: 'Thumbnail 5' },
            ],
            product: {
                name: 'Apple iPhone 15 Pro Max',
                price: '₱70,990.00',
                originalPrice: '₱84,990.00',
                discount: '-16%',
                specifications: [
                    {
                        label: 'Color Family',
                        values: ['White Titanium', 'Black Titanium', 'Blue Titanium', 'Natural Titanium'],
                    },
                    { label: 'Storage Capacity', values: ['256GB', '512GB', '1TB', '1000TB'] },
                ],
                availableQuantity: '936',
            },
            productSpecifications: [
                { label: 'Brand', value: 'Apple' },
                { label: 'SKU', value: '4554863725_PH-26135897734' },
                { label: 'Operating System', value: 'IOS' },
                { label: 'Battery Capacity', value: '4441 mAh' },
                { label: 'Model', value: '431915018985' },
                { label: 'Resolution', value: '2796x1290' },
                { label: 'Warranty Type', value: 'International Manufacturer Warranty' },
                { label: 'Warranty', value: '1 Year' },
                { label: 'Delivery Option Instant', value: 'Yes' },
                { label: "What's in the box", value: 'Device, USB-C Charge Cable' },
            ],
            averageRating: '4.0',
            totalRatings: 15,
            totalSold: '2.2k',
            reviews: [
                {
                    id: 1,
                    name: 'Diego Hargreeves',
                    rating: 4,
                    date: '2024-08-03',
                    variation: 'Natural Titanium, 256 GB',
                    quality: 'Legit Brand New and Sealed',
                    feature: 'Camera',
                    performance: 'Fast',
                    description: `I've been using the iPhone 15 Pro Max for a couple of weeks now, and it’s simply amazing. The performance is top-notch, thanks to the new A17 Bionic chip. Everything runs so smoothly, whether I'm switching between apps or playing high-demand games.The camera is where this phone really shines. The photos are incredibly detailed, even in low light, and the zoom is much better than before. The 8K video recording is a nice touch too. The design feels premium, and the titanium frame makes it both light and sturdy. The battery life has also been great; I can easily get through a full day with heavy use.`,
                },
                {
                    id: 1,
                    name: 'Jane',
                    rating: 5,
                    date: '2024-09-07',
                    variation: 'Blue Titanium, 256 GB',
                    quality: 'Legit',
                    feature: 'Camera',
                    performance: 'Smooth',
                    description: `Fast Delivery.`,
                },
                {
                    id: 1,
                    name: 'Rey',
                    rating: 5,
                    date: '2024-09-07',
                    variation: 'Blue Titanium, 256 GB',
                    quality: 'Legit',
                    feature: 'Camera',
                    performance: 'Smooth',
                    description: `Fast Delivery.`,
                },
                {
                    id: 1,
                    name: 'Diego Hargreeves',
                    rating: 4,
                    date: '2024-08-03',
                    variation: 'Natural Titanium, 256 GB',
                    quality: 'Legit Brand New and Sealed',
                    feature: 'Camera',
                    performance: 'Fast',
                    description: `I've been using the iPhone 15 Pro Max for a couple of weeks now, and it’s simply amazing. The performance is top-notch, thanks to the new A17 Bionic chip. Everything runs so smoothly, whether I'm switching between apps or playing high-demand games.The camera is where this phone really shines. The photos are incredibly detailed, even in low light, and the zoom is much better than before. The 8K video recording is a nice touch too. The design feels premium, and the titanium frame makes it both light and sturdy. The battery life has also been great; I can easily get through a full day with heavy use.`,
                },
            ],
        };
    },
    methods: {
        updateMainImage(image) {
            this.mainImage = image;
        },
    },
};
</script>
