<template>
    <div id="accordion-example">
        <div
            v-for="(item, index) in items"
            :key="index"
            class="flex flex-col bg-primary-800 rounded-[10px] mb-[20px]"
        >
            <!-- Question Box -->
            <div
                class="flex items-center justify-between p-4 cursor-pointer transition-colors"
                @click="toggle(index)"
                :class="{ 'bg-primary-800  rounded-[10px] ': activeIndex === index }"
            >
                <div class="flex items-center">
                    <h1><i class="bx bx-question-mark mr-4 text-yellow-50"></i></h1>
                    <p class="label-2 font-semibold text-yellow-50">
                        {{ item.question }}
                    </p>
                </div>
                <h5><i class="bx bx-chevron-down text-yellow-50"></i></h5>
            </div>
            <!-- Answer Box -->
            <div
                v-show="activeIndex === index"
                class="flex items-start bg-white p-4 rounded-b-[10px]"
            >
                <h4><i class="bx bx-reply mr-4 text-black"></i></h4>
                <p class="label-2 text-black text-base font-medium">
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
