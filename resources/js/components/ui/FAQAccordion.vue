<template>
    <section class="container mx-auto mb-12 pb-12 mt-[80px]">
        <h2 class="font-semibold text-center mb-[20px]">Frequently Asked Questions (FAQ)</h2>

        <div id="accordion-example">
            <div
                v-for="(item, index) in items"
                :key="index"
                class="flex flex-col bg-neutral-500 rounded shadow border-neutral-400 mb-[20px]"
            >
                <!-- Question Box -->
                <div
                    class="flex items-center justify-between p-4 cursor-pointer transition-colors"
                    @click="toggle(index)"
                    :class="{ 'bg-neutral-500 rounded shadow border-neutral-400': activeIndex === index }"
                >
                    <p class="flex items-center font-regular text-white ml-4">
                        <span class="mr-4 text-4xl">?</span>
                        <!-- Question mark -->
                        <span class="text-base">{{ item.question }}</span>
                    </p>
                    <i class="bx bx-chevron-down text-white text-[25px]"></i>
                </div>
                <!-- Answer Box -->
                <div
                    v-show="activeIndex === index"
                    class="flex items-start bg-neutral-50 p-4"
                >
                    <img
                        src="/assets/reply.png"
                        alt="reply"
                        class="w-8 h-8 mr-4"
                    />
                    <p class="text-black text-base font-regular">
                        {{ item.answer }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: {
        items: {
            type: Array,
            required: true,
            default: () => [],
        },
    },
    data() {
        return {
            activeIndex: null,
        };
    },
    methods: {
        toggle(index) {
            this.activeIndex = this.activeIndex === index ? null : index;
        },
    },
};
</script>

<style scoped>
/* Optional: If needed, you can add additional styles here */
</style>
