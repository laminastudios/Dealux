<template>
    <section class="min-h-screen bg-background">
        <div class="container mx-auto py-20">
            <div class="flex">
                <!-- Sidebar -->
                <ProfileSidebar></ProfileSidebar>

                <!-- Main Content -->
                <div class="w-3/4 ml-6 px-[38px] py-[36px] bg-white rounded-xl shadow-lg">
                    <div class="text-center mb-3">
                        <h2 class="font-semibold">Find Better Deals and More</h2>
                        <div class="relative inline-block text-5xl font-extrabold mt-4">
                            <span>DEALUX Pro</span>
                            <span class="absolute top-0 right-0 text-sm font-extrabold">©</span>
                        </div>
                        <p class="font-medium label-1 mt-4">
                            Choose the perfect plan for your shopping needs, with flexible pricing and exclusive
                            features that give you full access to AI-enhanced product comparisons and seamless direct
                            ordering from top online retailers.
                        </p>
                        <div class="flex items-center justify-center mt-6 space-x-4">
                            <p class="font-medium label-2">Monthly</p>
                            <Toggle
                                v-model="toggleValue"
                                class=""
                            >
                            </Toggle>
                            <p class="font-medium label-2">Yearly</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6">
                            <!-- Basic -->
                            <div
                                class="flex flex-col items-start self-stretch p-[20px_32px] rounded-[20px] bg-[var(--Primary-Color-Primary-800,#041E3B)]"
                            >
                                <i
                                    class="bx bxs-coupon text-white mb-3"
                                    style="font-size: 70px"
                                ></i>
                                <h3 class="font-semibold text-white mb-10">Basic</h3>
                                <h1 class="font-semibold text-white mb-10">Free</h1>
                                <ul class="space-y-2 mb-10">
                                    <li class="flex items-left text-left text-white gap-[5px] self-stretch">
                                        <i class="bx bx-check-circle text-white w-5 h-5 mr-2 mt-1"></i>
                                        Search products through Shopee and Lazada at the same time
                                    </li>
                                    <li class="flex items-start text-left text-white">
                                        <i class="bx bx-check-circle text-white w-5 h-5 mr-2 mt-1"></i>
                                        2 online shopping sources for deal comparison only
                                    </li>
                                    <li class="flex items-start text-left text-white">
                                        <i class="bx bx-check-circle text-white w-5 h-5 mr-2 mt-1"></i>
                                        3 AI-enhanced product search / day
                                    </li>
                                    <li class="flex items-start text-left text-white">
                                        <i class="bx bx-check-circle text-white w-5 h-5 mr-2 mt-1"></i>
                                        1 purchase / day only
                                    </li>
                                </ul>
                            </div>

                            <!-- Pro -->
                            <div
                                class="flex flex-col items-start gap-[var(--Size-Label-xs-Size, 10px)] flex-[1_0_0] self-stretch p-[20px_32px] rounded-[20px]"
                                :style="
                                    !toggleValue
                                        ? 'background: var(--Pro-M, linear-gradient(14deg, #041E3B 10.76%, #A0AAEA 129.65%));'
                                        : 'background: linear-gradient(356deg, #A25C00 39.32%, #FFBE69 92.21%);'
                                "
                            >
                                <i
                                    :class="
                                        !toggleValue ? 'bx bxs-discount text-white mb-3' : 'bx bx-money text-white mb-3'
                                    "
                                    style="font-size: 70px"
                                ></i>

                                <h3 class="font-semibold text-white relative">
                                    Pro
                                    <span
                                        class="text-sm absolute top-0"
                                        :class="!toggleValue ? 'right-8' : 'right-6'"
                                        >©</span
                                    >{{ !toggleValue ? 'M' : 'S' }}
                                </h3>

                                <h6 class="font-semibold text-white mb-3">
                                    {{ !toggleValue ? 'Month Membership' : 'Yearly Membership' }}
                                </h6>

                                <h1 class="font-semibold text-white">
                                    {{ !toggleValue ? '₱ 425.00' : '₱ 3,500.00' }}
                                </h1>

                                <h6 class="font-semibold text-white ml-12 mb-3">
                                    {{ !toggleValue ? '/month' : '/year' }}
                                </h6>

                                <ul class="space-y-2">
                                    <li class="flex items-start text-left text-white">
                                        <i class="bx bxs-badge-check text-white w-5 h-5 mr-2 mt-1"></i>
                                        Search through multiple websites for a better deal
                                    </li>
                                    <li class="flex items-start text-left text-white">
                                        <i class="bx bxs-badge-check text-white w-5 h-5 mr-2 mt-1"></i>
                                        Unlimited AI-enhanced product search
                                    </li>
                                    <li class="flex items-start text-left text-white">
                                        <i class="bx bxs-badge-check text-white w-5 h-5 mr-2 mt-1"></i>
                                        Unlimited online shopping source for deal comparison
                                    </li>
                                    <li class="flex items-start text-left text-white">
                                        <i class="bx bxs-badge-check text-white w-5 h-5 mr-2 mt-1 mb-3"></i>
                                        Unlimited purchases
                                    </li>
                                </ul>

                                <custom-button
                                    variant="filled"
                                    size="s"
                                    class="self-center gap-[10px] rounded-lg"
                                    color="yellow"
                                    @click="
                                        toggleValue
                                            ? $router.push({ name: 'subscriptionyearly' })
                                            : $router.push({ name: 'subscriptionmonthly' })
                                    "
                                >
                                    <p class="label-4 font-semibold">Start 7-Day Trial</p>
                                </custom-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import ProfileSidebar from '../components/ui/ProfileSidebar.vue';
import Toggle from '../components/ui/Toggle.vue';
import Button from '../components/ui/Button.vue';
export default {
    name: 'SubscriptionPage',
    components: {
        ProfileSidebar,
        Toggle,
        'custom-button': Button,
    },
    data() {
        return {
            toggleValue: false,
        };
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
