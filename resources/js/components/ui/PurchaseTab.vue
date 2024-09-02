<template>
    <!-- Tabs navigation -->
    <ul
        class="h-[72px] flex list-none flex-row flex-wrap bg-neutral-50"
        role="tablist"
    >
        <!-- Loop through tabs to generate buttons -->
        <li
            v-for="tab in tabs"
            :key="tab"
            role="presentation"
            class="flex-auto text-center"
        >
            <button
                @click="filterStatus(tab)"
                class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 label-2 font-bold leading-tight text-neutral-500 hover:border-primary hover:text-primary focus:outline-none"
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
