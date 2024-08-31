<template>
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
                <div class="flex items-center">
                    <h1><i class="bx bx-question-mark mr-4 text-white"></i></h1>
                    <p class="font-regular text-white">
                        {{ item.question }}
                    </p>
                </div>
                <h5><i class="bx bx-chevron-down text-white"></i></h5>
            </div>
            <!-- Answer Box -->
            <div
                v-show="activeIndex === index"
                class="flex items-start bg-neutral-50 p-4"
            >
                <h4><i class="bx bx-reply mr-4 text-black"></i></h4>
                <p class="text-black text-base font-regular">
                    {{ item.answer }}
                </p>
            </div>
        </div>
    </div>
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
