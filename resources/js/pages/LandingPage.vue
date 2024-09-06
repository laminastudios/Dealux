<template>
    <!-- Hero Section -->
    <section class="relative bg-background h-[600px] overflow-hidden">
        <!-- Background Video -->
        <div>
            <video
                src="/assets/hero_bg.mp4"
                type="video/mp4"
                autoplay
                muted
                loop
                class="absolute inset-0 w-full h-full object-cover"
            ></video>
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#041E3B] to-[#020C18] opacity-60"></div>
        </div>

        <div class="relative w-[1400px] h-full mx-auto flex flex-col justify-center">
            <h1 class="font-semibold mb-[16px] text-yellow-400">Find, Compare, and Shop Smarter</h1>
            <h4 class="font-semibold text-white"><i>Great Deals for Smart Shoppers</i></h4>
            <h6 class="font-semibold mt-[116px] text-white">
                Access thousands of products from these trusted retailers
            </h6>

            <!-- Shop List -->
            <div class="mt-6 grid grid-cols-3 gap-[2rem] w-[700px]">
                <article
                    v-for="shop in shops"
                    :key="shop.id"
                    class="w-full max-w-[150px] flex flex-row gap-[10px] text-center items-start"
                >
                    <img
                        :src="shop.image"
                        alt="Shop Logo"
                        class="h-[45px] object-contain"
                    />
                    <p class="label-1 font-bold mt-4 text-white">{{ shop.name }}</p>
                </article>
            </div>
        </div>
    </section>

    <!-- Feature Section -->
    <section class="bg-primary-800">
        <div class="h-auto w-[1400px] mx-auto py-8 flex flex-col items-center">
            <h1 class="font-semibold mt-8 mb-[27px] text-white">What We <span class="text-yellow-400">Offer</span></h1>
            <h6 class="font-semibold w-[742px] text-center text-primary-50">
                Experience shopping bliss with Dealux! It’s smart, sleek, and just a little bit magical—everything you
                need for a great shopping day!
            </h6>

            <div class="flex justify-between items-start gap-12 mt-[62px]">
                <!-- Search Up -->
                <div class="flex flex-col items-center h-[450px]">
                    <img
                        src="assets/searchup_icon.png"
                        alt="Search Up"
                        class="h-[115px] w-[115px] object-cover"
                    />
                    <h3 class="text-yellow-400 font-semibold mt-[28px]">
                        Search <span class="text-primary-50">Up</span>
                    </h3>
                    <p class="label-1 font-semibold text-center text-white w-[270px] mt-[17px]">
                        Find the best deals across multiple platforms with our advanced search tool
                    </p>
                </div>

                <div class="border border-white h-[386px] w-[2px]"></div>

                <!-- Compare Me -->
                <div class="flex flex-col items-center h-[450px]">
                    <img
                        src="assets/compareme_icon.png"
                        alt="Compare Me"
                        class="h-[115px] w-[115px] object-cover"
                    />
                    <h3 class="text-yellow-400 font-semibold mt-[28px]">
                        Compare <span class="text-primary-50">Me</span>
                    </h3>
                    <p class="label-1 font-semibold text-center text-white w-[270px] mt-[17px]">
                        Easily compare products from different platforms to find the perfect deal
                    </p>
                </div>

                <div class="border border-white h-[386px] w-[2px]"></div>

                <!-- Rank It -->
                <div class="flex flex-col items-center h-[450px]">
                    <img
                        src="assets/rankit_icon.png"
                        alt="Rank It"
                        class="h-[115px] w-[115px] object-cover"
                    />
                    <h3 class="text-yellow-400 font-semibold mt-[28px]">
                        Rank <span class="text-primary-50">It</span>
                    </h3>
                    <p class="label-1 font-semibold text-center text-white w-[270px] mt-[17px]">
                        Rank products by ratings, prices, and locations for a better shopping experience
                    </p>
                </div>

                <div class="border border-white h-[386px] w-[2px]"></div>

                <!-- Direct Purchase -->
                <div class="flex flex-col items-center h-[450px]">
                    <img
                        src="assets/directpurchase_icon.png"
                        alt="Direct Purchase"
                        class="h-[115px] w-[115px] object-cover"
                    />
                    <h3 class="text-yellow-400 font-semibold mt-[28px]">
                        Direct <span class="text-primary-50">Purchase</span>
                    </h3>
                    <p class="label-1 font-semibold text-center text-white w-[270px] mt-[17px]">
                        Buy directly through Dealux for a seamless shopping experience.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Carousel -->
    <section class="bg-background">
        <div class="h-[724px] w-[1400px] mx-auto py-8">
            <div class="flex flex-col items-center">
                <h1 class="font-semibold mt-8 mb-[27px] text-black">
                    What We <span class="text-yellow-400">Offer</span>
                </h1>
                <h6 class="font-semibold w-[742px] mb-[64px] text-center text-black">
                    Hear from customers who found the Best Deals on Dealux
                </h6>
            </div>
            <!-- Testimonial Carousel -->
            <TestimonialCarousel :testimonials="testimonials" />
        </div>
    </section>
</template>

<script>
import TestimonialCarousel from '../components/ui/TestimonialCarousel.vue';
import { VueperSlides, VueperSlide } from 'vueperslides';
import 'vueperslides/dist/vueperslides.css';

export default {
    name: 'LandingPage',
    components: {
        TestimonialCarousel,
        VueperSlides,
        VueperSlide,
    },
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
            testimonials: [
                {
                    name: 'John Doe',
                    review: '"Dealux has completely changed the way I shop online. I used to spend hours comparing prices across different sites, but now I can find the best deals in minutes. The platform is so easy to use, and I love knowing that I\'m getting the best price every time."',
                    rating: 5,
                    userSince: '2021',
                    image: 'https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', // Replace with actual image URL
                },
                {
                    name: 'Jane Smith',
                    review: '"Dealux has completely changed the way I shop online. I used to spend hours comparing prices across different sites, but now I can find the best deals in minutes. The platform is so easy to use, and I love knowing that I\'m getting the best price every time."',
                    rating: 4,
                    userSince: '2022',
                    image: 'https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', // No image URL to show the icon
                },
                {
                    name: 'John Doe',
                    review: '"Dealux has completely changed the way I shop online. I used to spend hours comparing prices across different sites, but now I can find the best deals in minutes. The platform is so easy to use, and I love knowing that I\'m getting the best price every time."',
                    rating: 5,
                    userSince: '2021',
                    image: 'https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', // Replace with actual image URL
                },
                {
                    name: 'Jane Smith',
                    review: '"Dealux has completely changed the way I shop online. I used to spend hours comparing prices across different sites, but now I can find the best deals in minutes. The platform is so easy to use, and I love knowing that I\'m getting the best price every time."',
                    rating: 4,
                    userSince: '2022',
                    image: 'https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', // No image URL to show the icon
                },
                {
                    name: 'John Doe',
                    review: '"Dealux has completely changed the way I shop online. I used to spend hours comparing prices across different sites, but now I can find the best deals in minutes. The platform is so easy to use, and I love knowing that I\'m getting the best price every time."',
                    rating: 5,
                    userSince: '2021',
                    image: 'https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', // Replace with actual image URL
                },
                {
                    name: 'Jane Smith',
                    review: '"Dealux has completely changed the way I shop online. I used to spend hours comparing prices across different sites, but now I can find the best deals in minutes. The platform is so easy to use, and I love knowing that I\'m getting the best price every time."',
                    rating: 4,
                    userSince: '2022',
                    image: 'https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', // No image URL to show the icon
                },
                {
                    name: 'John Doe',
                    review: '"Dealux has completely changed the way I shop online. I used to spend hours comparing prices across different sites, but now I can find the best deals in minutes. The platform is so easy to use, and I love knowing that I\'m getting the best price every time."',
                    rating: 5,
                    userSince: '2021',
                    image: 'https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', // Replace with actual image URL
                },
                {
                    name: 'Jane Smith',
                    review: '"Dealux has completely changed the way I shop online. I used to spend hours comparing prices across different sites, but now I can find the best deals in minutes. The platform is so easy to use, and I love knowing that I\'m getting the best price every time."',
                    rating: 4,
                    userSince: '2022',
                    image: 'https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250', // No image URL to show the icon
                },
                // Add more testimonials as needed
            ],
        };
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
