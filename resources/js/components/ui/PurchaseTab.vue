<template>
    <!-- Tabs navigation -->
    <ul
        class="h-[72px] flex list-none flex-row flex-wrap bg-neutral-50"
        role="tablist"
    >
        <!-- All tab -->
        <li
            role="presentation"
            class="flex-auto text-center"
        >
            <button
                @click="filterStatus('All')"
                class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 label-2 font-bold leading-tight text-neutral-500 hover:border-primary hover:text-primary focus:outline-none"
                :class="{ 'text-primary border-primary': selectedTab === 'All' }"
            >
                All
            </button>
        </li>

        <!-- To Pay tab -->
        <li
            role="presentation"
            class="flex-auto text-center"
        >
            <button
                @click="filterStatus('To Pay')"
                class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 label-2 font-bold leading-tight text-neutral-500 hover:border-primary hover:text-primary focus:outline-none"
                :class="{ 'text-primary border-primary': selectedTab === 'To Pay' }"
            >
                To Pay
            </button>
        </li>

        <!-- To Ship tab -->
        <li
            role="presentation"
            class="flex-auto text-center"
        >
            <button
                @click="filterStatus('To Ship')"
                class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 label-2 font-bold leading-tight text-neutral-500 hover:border-primary hover:text-primary focus:outline-none"
                :class="{ 'text-primary border-primary': selectedTab === 'To Ship' }"
            >
                To Ship
            </button>
        </li>

        <!-- To Receive tab -->
        <li
            role="presentation"
            class="flex-auto text-center"
        >
            <button
                @click="filterStatus('To Receive')"
                class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 label-2 font-bold leading-tight text-neutral-500 hover:border-primary hover:text-primary focus:outline-none"
                :class="{ 'text-primary border-primary': selectedTab === 'To Receive' }"
            >
                To Receive
            </button>
        </li>

        <!-- Received tab -->
        <li
            role="presentation"
            class="flex-auto text-center"
        >
            <button
                @click="filterStatus('Received')"
                class="my-2 block border-x-0 border-b-2 border-t-0 border-transparent px-7 pb-3.5 pt-4 label-2 font-bold leading-tight text-neutral-500 hover:border-primary hover:text-primary focus:outline-none"
                :class="{ 'text-primary border-primary': selectedTab === 'Received' }"
            >
                Received
            </button>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        stores: Array, // Array of store data with parcelStatus
    },
    data() {
        return {
            selectedTab: 'All', // Default selected tab
        };
    },
    methods: {
        filterStatus(status) {
            this.selectedTab = status; // Update the selected tab

            // Emit the filtered status to the parent component
            this.$emit('filter-by-status', status);
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
