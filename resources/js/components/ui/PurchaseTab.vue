<template>
    <!-- Tabs navigation -->
    <ul
        class="flex list-none flex-row justify-between bg-white px-20 py-0 m-0 h-[72px]"
        role="tablist"
    >
        <!-- Loop through tabs to generate buttons -->
        <li
            v-for="tab in tabs"
            :key="tab"
            role="presentation"
            class="flex items-center justify-center flex-none"
        >
            <button
                @click="filterStatus(tab)"
                class="block border-x-0 border-b-2 border-t-0 border-transparent py-2 text-neutral-500 font-bold leading-tight hover:border-primary hover:text-primary focus:outline-none"
                :class="{ 'text-primary border-primary': selectedTab === tab }"
            >
                {{ tab }}
            </button>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        tabs: {
            type: Array,
            required: true,
            default: () => [],
        },
    },
    data() {
        return {
            selectedTab: this.tabs[0] || 'All', // Default to the first tab if available
        };
    },
    methods: {
        filterStatus(status) {
            this.selectedTab = status; // Update the selected tab
            this.$emit('filter-by-status', status); // Emit the filtered status to the parent component
        },
    },
};
</script>

<style scoped>
button {
    background-color: transparent;
    border: none;
    cursor: pointer;
}
</style>
