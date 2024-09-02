<!-- resources/js/components/Footer.vue -->
<template>
    <footer class="bg-primary-800 h-[662px] w-full text-white">
        <div class="container">
            <div class="h-[522px] flex flex-row">
                <div class="w-full mt-[128px] flex flex-row">
                    <ul class="w-full flex flex-col gap-[15px]">
                        <li class="label-2 font-bold">CUSTOMER SUPPORT</li>
                        <li
                            v-for="(item, index) in customerSupportItems"
                            :key="index"
                            class="label-4 font-medium"
                        >
                            <router-link :to="item.link">{{ item.text }}</router-link>
                        </li>
                    </ul>
                    <ul class="w-full flex flex-col gap-[15px]">
                        <li class="label-2 font-bold">ABOUT DEALUX</li>
                        <li
                            v-for="(item, index) in aboutDealuxItems"
                            :key="index"
                            class="label-4 font-medium"
                        >
                            <router-link :to="item.link">{{ item.text }}</router-link>
                        </li>
                    </ul>
                </div>
                <div class="w-full mt-[128px] flex flex-col text-white">
                    <div class="flex flex-col h-full">
                        <p class="label-2 font-bold">OUR PARTNERS</p>
                        <div class="grid grid-cols-3 grid-rows-2 gap-y-[15px] my-auto">
                            <div
                                v-for="(item, index) in ourPartnersItems"
                                :key="index"
                                class="flex flex-row items-center gap-[13px]"
                            >
                                <img
                                    :src="item.image"
                                    :alt="item.name"
                                    class="w-[45px] h-[45px] object-contain"
                                />
                                <p class="label-3 font-bold">{{ item.name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col h-full">
                        <p class="label-2 font-bold">Payment Methods</p>
                        <div class="grid grid-cols-3 grid-rows-2 gap-y-[15px] my-auto">
                            <div
                                v-for="(item, index) in paymentMethodsItems"
                                :key="index"
                                class="flex flex-row items-center gap-[13px]"
                            >
                                <img
                                    :src="item.image"
                                    :alt="item.name"
                                    class="w-[45px] h-[45px] object-contain"
                                />
                                <p class="label-3 font-bold">{{ item.name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-[140px] flex flex-row justify-between items-center border-t border-white">
                <p class="label-4 font-medium">© 2024 Dealux. All Rights Reserved.</p>
                <p class="label-4 font-medium">
                    Dealux Southeast Asia: Brunei | Indonesia | Laos | Malaysia | Philippines | Singapore | Thailand |
                    Vietnam
                </p>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    data() {
        return {
            customerSupportItems: [
                {
                    text: 'Dealux Help Desk',
                    link: '#',
                },
                {
                    text: 'Payment Methods',
                    link: '#',
                },
                {
                    text: 'Order Tracking',
                    link: '#',
                },
                {
                    text: 'Voucher Channel',
                    link: '#',
                },
                {
                    text: 'Shipping and Delivery',
                    link: '#',
                },
                {
                    text: 'Return and Refund',
                    link: '#',
                },
                {
                    text: 'International Product Policy',
                    link: '#',
                },
                {
                    text: 'Contact Us',
                    link: '#',
                },
            ],
            aboutDealuxItems: [
                {
                    text: 'About Us',
                    link: '#',
                },
                {
                    text: 'Affiliate Program',
                    link: '#',
                },
                {
                    text: 'Terms of Service',
                    link: '#',
                },
                {
                    text: 'Privacy Policy',
                    link: '#',
                },
                {
                    text: 'Press and Media',
                    link: '#',
                },
                {
                    text: 'Intellectual Property Protection',
                    link: '#',
                },
            ],
            ourPartnersItems: [
                {
                    name: 'Shopee',
                    image: '/assets/shopee_logo.png',
                },
                {
                    name: 'Lazada',
                    image: '/assets/lazada_logo.png',
                },
                {
                    name: 'Shein',
                    image: '/assets/shein_logo.jpg',
                },
                {
                    name: 'Alibaba',
                    image: '/assets/alibaba_logo.png',
                },
                {
                    name: 'eBay',
                    image: '/assets/ebay_logo.png',
                },
                {
                    name: 'Zalora',
                    image: '/assets/zalora_logo.png',
                },
            ],
            paymentMethodsItems: [
                {
                    name: 'VISA',
                    image: '/assets/visa_logo.png',
                },
                {
                    name: 'GCash',
                    image: '/assets/gcash_logo.jpeg',
                },
                {
                    name: 'BPI',
                    image: '/assets/bpi_logo.png',
                },
                {
                    name: 'Mastercard',
                    image: '/assets/mastercard_logo.png',
                },
                {
                    name: 'Maya',
                    image: '/assets/maya_logo.png',
                },
                {
                    name: 'PayPal',
                    image: '/assets/paypal_logo.png',
                },
            ],
        };
    },
};
</script>
