<!-- resources/js/components/Footer.vue -->
<template>
    <footer class="bg-primary-800 h-[662px] w-full text-white">
        <div class="container">
            <div class="h-[522px] flex flex-row">
                <div class="w-full mt-[74px] flex flex-row">
                    <ul class="w-full flex flex-col gap-[17px]">
                        <li class="label-2 font-bold">CUSTOMER SUPPORT</li>
                        <li
                            v-for="(item, index) in customerSupportItems"
                            :key="index"
                            class="label-4 font-medium"
                        >
                            <router-link :to="item.link">{{ item.text }}</router-link>
                        </li>
                    </ul>
                    <ul class="w-full flex flex-col gap-[17px]">
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
                <div class="w-full mt-[74px] flex flex-col text-white">
                    <div class="flex flex-col h-full">
                        <p class="label-2 font-bold">OUR PARTNERS</p>
                        <div class="grid grid-cols-3 gap-y-[15px] mt-[17px]">
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
                        <p class="label-2 font-bold">PAYMENT PROVIDERS</p>
                        <div class="grid grid-cols-3 gap-y-[15px] mt-[17px]">
                            <div
                                v-for="(item, index) in paymentProvidersItems"
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

            <div class="h-[140px] flex flex-row justify-center border-t border-white">
                <p class="label-4 font-medium mt-[21px]">© 2024 Dealux. All Rights Reserved.</p>
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
                    text: 'Payment Providers',
                    link: '#',
                },
                {
                    text: 'Order Tracking',
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
            ],
            aboutDealuxItems: [
                {
                    text: 'Terms of Service',
                    link: '#',
                },
                {
                    text: 'Privacy Policy',
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
                    image: '/assets/lazada_logo.jfif',
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
                    image: '/assets/ebay_logo.jfif',
                },
                {
                    name: 'Zalora',
                    image: '/assets/zalora_logo.png',
                },
            ],
            paymentProvidersItems: [
                {
                    name: 'VISA',
                    image: '/assets/visa_logo.png',
                },
                {
                    name: 'Diners Club',
                    image: '/assets/dinersclub_logo.jfif',
                },
                {
                    name: 'JCB',
                    image: '/assets/jcb_logo.png',
                },
                {
                    name: 'Mastercard',
                    image: '/assets/mastercard_logo.png',
                },
                {
                    name: 'Discover',
                    image: '/assets/discover_logo.jfif',
                },
                {
                    name: 'UnionPay',
                    image: '/assets/unionpay_logo.jfif',
                },
                {
                    name: 'American Express',
                    image: '/assets/americanexpress_logo.jfif',
                },
            ],
        };
    },
};
</script>
