<template>
    <div class="flex flex-col items-start p-[20px_32px] rounded-[20px] bg-[var(--Primary-Color-Primary-800,#041E3B)]">
        <i
            :class="plan.icon"
            class="text-white mb-3"
            style="font-size: 70px"
        ></i>
        <h3 class="font-semibold text-white mb-10">{{ plan.title }}</h3>
        <h1 class="font-semibold text-white mb-10">{{ plan.price }}</h1>
        <h6
            v-if="plan.duration"
            class="font-semibold text-white ml-12 mb-3"
        >
            {{ plan.duration }}
        </h6>
        <ul class="space-y-2 mb-10">
            <li
                v-for="feature in plan.features"
                :key="feature"
                class="flex items-start text-left text-white"
            >
                <i class="bx bx-check-circle text-white w-5 h-5 mr-2 mt-1"></i>
                {{ feature }}
            </li>
        </ul>
        <custom-button
            v-if="plan.title === 'Pro'"
            variant="filled"
            size="s"
            class="self-center gap-[10px] rounded-lg"
            color="yellow"
            @click="$emit('start-trial')"
        >
            <p class="label-4 font-semibold">Start 7-Day Trial</p>
        </custom-button>
    </div>
</template>

<script>
export default {
    name: 'PlanCard',
    props: {
        plan: Object,
    },
};
</script>

<style scoped></style>
