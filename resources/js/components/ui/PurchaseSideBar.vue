<template>
    <div class="w-[314px] flex flex-col items-center gap-[22px]">
        <router-link
            to="/purchase/active"
            :class="['flex items-center gap-[8px]', isActive('/purchase/active') ? 'active-link' : '']"
        >
            <i class="bx bxs-purchase-tag text-[18px]"></i>
            <span class="font-bold label-3">Active Purchases</span>
        </router-link>
        <router-link
            to="/purchase/history"
            :class="['flex items-center gap-[8px]', isActive('/purchase/history') ? 'active-link' : '']"
        >
            <i class="bx bx-time text-[18px]"></i>
            <span class="font-bold label-3">Purchase History</span>
        </router-link>
    </div>
</template>

<script>
import { useRoute } from 'vue-router';

export default {
    setup() {
        const route = useRoute();

        const isActive = (path) => {
            return route.path === path;
        };

        return {
            isActive,
        };
    },
};
</script>

<style scoped>
/* Active link highlight */
.active-link i,
.active-link span {
    color: #c88108;
    font-weight: bold;
}
</style>
