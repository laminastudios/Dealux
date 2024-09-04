<template>
    <div id="accordion-example">
        <div
            v-for="(item, index) in items"
            :key="index"
            class="flex flex-col bg-primary-800 rounded-[10px] mb-[20px]"
        >
            <!-- Question Box -->
            <div
                class="flex items-center justify-between bg-primary-800 rounded-[10px] p-4 cursor-pointer transition-colors"
                @click="toggle(index)"
                :class="{ 'bg-primary-800 rounded-[10px]': activeIndex.includes(index) }"
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
            <transition
                name="accordion"
                @before-enter="beforeEnter"
                @enter="enter"
                @leave="leave"
            >
                <div
                    v-show="activeIndex.includes(index)"
                    class="accordion-content flex items-start bg-white p-4 rounded-b-[10px]"
                >
                    <h4><i class="bx bx-reply mr-4 text-black"></i></h4>
                    <p class="label-2 text-black text-base font-medium">
                        {{ item.answer }}
                    </p>
                </div>
            </transition>
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
            activeIndex: [],
        };
    },
    methods: {
        toggle(index) {
            const idx = this.activeIndex.indexOf(index);
            if (idx > -1) {
                this.activeIndex.splice(idx, 1); // Remove index
            } else {
                this.activeIndex.push(index); // Add index
            }
        },
        beforeEnter(el) {
            el.style.height = '0';
        },
        enter(el) {
            this.$nextTick(() => {
                el.style.transition = 'height 0.2s ease'; // Set the transition
                el.style.height = `${el.scrollHeight}px`; // Set height to content height
            });
        },
        leave(el) {
            el.style.transition = 'height 0.1s ease'; // Set the transition
            el.style.height = '0'; // Set height to 0
        },
    },
};
</script>

<style scoped>
.accordion-enter-active,
.accordion-leave-active {
    transition: height; /* Duration and easing for the transition */
    overflow: hidden;
}

.accordion-enter,
.accordion-leave-to {
    height: auto; /* Start or end with height 0 */
}
</style>
