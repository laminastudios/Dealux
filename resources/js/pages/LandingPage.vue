<template>
    <!-- Hero Section -->
    <section
        class="container min-h-screen-navbar mx-auto flex flex-col items-center justify-center border border-blue-500 h-full"
    >
        <h1 class="font-semibold mb-[44px]">Find, Compare, and Shop Smarter</h1>
        <p class="label-2 font-regular w-[773px] text-center">
            Seamlessly explore products from leading e-commerce platforms, compare prices, and make purchases—all from
            one convenient app designed to enhance your shopping experience.
        </p>
        <h6 class="font-semibold mt-[139px]">Access thousands of products from these trusted retailers</h6>

        <!-- Shop List -->
        <div class="mt-6 flex text-center justify-between gap-[4rem]">
            <article
                v-for="shop in shops"
                :key="shop.id"
                class="flex text-center justify-between gap-3"
            >
                <img
                    :src="shop.image"
                    alt="Shop Logo"
                    class="mx-auto h-[45px] object-contain"
                />
                <p class="label-1 font-bold mt-4">{{ shop.name }}</p>
            </article>
        </div>
    </section>

    <!-- Feature Section -->
    <section
        class="container min-h-screen-navbar mx-auto py-8 flex flex-col items-center border border-blue-500 h-full"
    >
        <h1 class="font-semibold mt-8 mb-8">What We Offer</h1>
        <h6 class="font-semibold w-[742px] text-center">
            Experience shopping bliss with Dealux! It’s smart, sleek, and just a little bit magical—everything you need
            for a great shopping day!
        </h6>
    </section>

    <!-- Testimonial Carousel -->
    <section
        class="container min-h-screen-navbar mx-auto py-8 flex flex-col items-center border border-blue-500 h-full"
    >
        <!-- Add testimonial content here -->
    </section>
</template>

<script>
export default {
    name: 'LandingPage',
    data() {
        return {
            shops: [
                { id: 1, name: 'Shopee', image: '/assets/shopee_logo.png' },
                { id: 2, name: 'Lazada', image: '/assets/lazada_logo.png' },
                { id: 3, name: 'Shein', image: '/assets/shein_logo.jpg' },
                { id: 4, name: 'Alibaba', image: '/assets/alibaba_logo.png' },
                { id: 5, name: 'eBay', image: '/assets/ebay_logo.png' },
                { id: 6, name: 'Zalora', image: '/assets/zalora_logo.png' },
            ],
        };
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
