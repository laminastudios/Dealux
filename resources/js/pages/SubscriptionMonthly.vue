<template>
    <section class="min-h-screen bg-background">
        <div class="container mx-auto py-20">
            <div class="flex">
                <!-- Sidebar -->
                <ProfileSidebar></ProfileSidebar>
                <div class="flex flex-col gap-5">
                    <div
                        class="flex flex-col items-start gap-5 w-[904px] p-[40px_40px_20px_40px] rounded-[20px_20px_0_0]"
                        :style="{ background: 'var(--Pro-M, linear-gradient(14deg, #041E3B 10.76%, #A0AAEA 129.65%))' }"
                    >
                        <div class="flex justify-between items-center w-full">
                            <h1 class="relative inline-block text-5xl font-extrabold mt-4 text-white flex-grow">
                                DEALUX Pro © M
                            </h1>
                            <custom-button
                                variant="filled"
                                size="s"
                                class="gap-[10px] rounded-l"
                                color="yellow"
                            >
                                <p class="label-4 font-semibold">Extend Subscription</p>
                            </custom-button>
                        </div>
                        <p class="text-center text-white font-normal text-lg">
                            Enjoy uninterrupted access to our AI-enhanced product comparisons and direct ordering
                            features, ensuring you always find the best deals from top online retailers. Thank you for
                            being a part of our community!
                        </p>
                        <div class="flex justify-between items-center w-full">
                            <div
                                class="flex justify-between items-center font-semibold text-black bg-blue-50 h-[75px] rounded-[5px] p-[10px]"
                            >
                                <i class="bx bx-calendar-check text-black text-xl mr-2"></i>
                                <div class="text-black">
                                    <p class="label-4 font-medium mb-3">Subscription Type</p>
                                    <p class="label-3 font-semibold">Monthly</p>
                                </div>
                            </div>
                            <div
                                class="flex justify-between items-center font-semibold text-black bg-blue-50 h-[75px] rounded-[5px] p-[10px]"
                            >
                                <i class="bx bx-coin-stack text-black h-[24px] w-[24px]"></i>
                                <div>
                                    <p class="label-4 font-medium mb-3">Subscription Fee</p>
                                    <p class="label-3 font-semibold">₱425.00/month</p>
                                </div>
                            </div>
                            <div
                                class="flex justify-between items-center font-semibold text-black bg-blue-50 h-[75px] rounded-[5px] p-[10px]"
                            >
                                <i class="bx bx-time-five text-black h-[24px] w-[24px]"></i>
                                <div>
                                    <p class="label-4 font-medium mb-3">Remaining days</p>
                                    <p class="label-3 font-semibold">2 days</p>
                                </div>
                            </div>
                            <div
                                class="flex justify-between items-center font-semibold text-black bg-blue-50 h-[75px] rounded-[5px] p-[10px]"
                            >
                                <i class="bx bx-calendar text-black h-[24px] w-[24px]"></i>
                                <div>
                                    <p class="label-4 font-medium mb-3">Renewal Date</p>
                                    <p class="label-3 font-semibold">Sept 11, 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-start gap-5 w-[904px] p-[40px_40px_20px_40px] bg-white rounded-[0_0_20px_20px]"
                    >
                        <h3>Features</h3>
                        <div>
                            <ul class="space-y-4">
                                <li class="flex items-start text-left text-black">
                                    <i class="bx bxs-badge-check text-black w-5 h-5 mr-2 mt-1"></i>
                                    Search through multiple websites for a better deal
                                </li>
                                <li class="flex items-start text-left text-black">
                                    <i class="bx bxs-badge-check text-black w-5 h-5 mr-2 mt-1"></i>
                                    Unlimited AI-enhanced product search
                                </li>
                                <li class="flex items-start text-left text-black">
                                    <i class="bx bxs-badge-check text-black w-5 h-5 mr-2 mt-1"></i>
                                    Unlimited online shopping source for deal comparison
                                </li>
                                <li class="flex items-start text-left text-black">
                                    <i class="bx bxs-badge-check text-black w-5 h-5 mr-2 mt-1 mb-3"></i>
                                    Unlimited purchases
                                </li>
                            </ul>
                        </div>
                        <div class="space-y-4">
                            <h6 class="text-xl font-semibold mb-4">Account & Billing Information</h6>
                            <div class="flex mb-4">
                                <p class="font-medium label-3 mr-1">Next Billing Date:</p>
                                <p class="font-medium label-3 text-yellow-500">Aug 11, 2025</p>
                            </div>
                            <div class="flex mb-4">
                                <p class="label-3 font-medium mr-3">Payment Method:</p>
                                <div
                                    class="flex flex-wrap items-center bg-neutral-50 w-[165px] p-[5px_10px_5px_10px] rounded-[5px]"
                                >
                                    <i class="bx bx-credit-card font-semibold mr-2 mb-2"></i>
                                    <i class="bx bx-wallet-alt font-semibold mb-2"></i>
                                    <p class="font-semibold label-5 text-xs mt-2 mb-2">####-####-####-1234</p>
                                </div>
                                <div class="text-yellow-500 font-medium label-3 ml-2">
                                    <i class="bx bxs-edit-alt"></i>
                                    <button>Change Payment Method</button>
                                </div>
                            </div>
                            <p class="label-5 font-meduim text-neutral-700">
                                Need help? Contact our
                                <a
                                    href="#"
                                    class="text-yellow-500 hover:underline"
                                    >support team</a
                                >.
                            </p>
                            <p class="label-5 font-meduim text-neutral-700">
                                Visit our
                                <a
                                    href="#"
                                    class="text-yellow-500 hover:underline"
                                    >Support Center Page</a
                                >
                                and check the FAQ for subscription-related questions.
                            </p>
                            <p class="label-5 font-meduim text-neutral-700">
                                If you want to cancel your subscription,
                                <a
                                    href="#"
                                    class="text-yellow-500 hover:underline"
                                    >click here</a
                                >
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue';
import ProfileSidebar from '../components/ui/ProfileSidebar.vue';

export default {
    name: 'SubscriptionMonthly',
    components: {
        ProfileSidebar,
        'custom-button': Button,
    },
};
</script>

<style scoped>
/* Additional styling if necessary */
</style>
