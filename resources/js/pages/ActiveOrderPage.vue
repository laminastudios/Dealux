<template>
    <section class="min-h-screen bg-background">
        <div class="container flex justify-between gap-[39px] py-[5rem] h-full">
            <PurchaseSideBar />

            <div class="w-[1006px]">
                <!-- PurchaseTab component -->
                <PurchaseTab
                    :tabs="['All', 'To Ship', 'To Deliver']"
                    class="mb-[1rem] custom-shadow"
                    @filter-by-status="filterStores"
                />

                <!-- Search Bar -->
                <form
                    class="flex flex-row justify-between gap-[4px]"
                    @submit.prevent="handleSearch"
                >
                    <div class="flex gap-[4px] w-full mb-[2rem]">
                        <div
                            class="bg-primary-800 w-[51px] rounded-l-[5px] flex justify-center items-center custom-shadow"
                        >
                            <i class="bx bx-search text-neutral-50 text-[20px] font-medium"></i>
                        </div>
                        <label
                            for="default-search"
                            class="mb-2 label-2 font-semibold text-neutral-50 sr-only"
                            >Search</label
                        >
                        <div
                            class="relative w-full h-[44px] bg-white flex items-center px-[14px] py-[13px] gap-[13px] border border-white focus-within:border-neutral-600 custom-shadow"
                        >
                            <input
                                type="search"
                                id="default-search"
                                class="block w-full label-2 p-0 text-neutral-800 font-semibold bg-transparent placeholder:text-neutral-200 placeholder:font-medium border-none focus:outline-none focus:ring-0"
                                placeholder="Search Product"
                                v-model="searchQuery"
                                @keydown.enter="handleSearch"
                            />
                        </div>
                    </div>
                </form>

                <!-- Store and Products -->
                <div class="min-w-[1006px]">
                    <PurchaseCard
                        v-for="store in filteredStores"
                        :key="store.id"
                        :storeID="store.id"
                        :storeName="store.name"
                        :products="store.products"
                        :orderTotal="store.orderTotal"
                        :deliverDate="store.deliverDate"
                        :lastActionDate="store.lastActionDate"
                        :parcelStatus="store.parcelStatus"
                        :orderStatus="store.orderStatus"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import PurchaseTab from '../components/ui/PurchaseTab.vue';
import PurchaseCard from '../components/ui/PurchaseCard.vue';
import PurchaseSideBar from '../components/ui/PurchaseSideBar.vue';

export default {
    name: 'ActiveOrderPage',
    components: {
        PurchaseTab,
        PurchaseCard,
        PurchaseSideBar,
    },
    data() {
        return {
            searchQuery: '',
            activeStatus: 'All', // Defaul active tab status
            stores: [
                {
                    id: 1,
                    name: 'Store 1',
                    parcelStatus: 'To Deliver',
                    orderStatus: 'Ongoing',
                    deliverDate: '09/15/2024',
                    products: [
                        {
                            id: 1,
                            name: 'Product 1',
                            details: 'Color, Size',
                            price: '₱499.00',
                            image: '/assets/image_placeholder.jpg',
                        },
                        {
                            id: 2,
                            name: 'Product 2',
                            details: 'Color, Size',
                            price: '₱799.00',
                            image: '/assets/image_placeholder.jpg',
                        },
                        {
                            id: 3,
                            name: 'Product 3',
                            details: 'Color, Size',
                            price: '₱799.00',
                            image: '/assets/image_placeholder.jpg',
                        },
                    ],
                    orderTotal: '₱1298.00',
                    lastActionDate: '08/30/2024',
                },
                {
                    id: 2,
                    name: 'Store 2',
                    parcelStatus: 'To Ship',
                    orderStatus: 'Ongoing',
                    deliverDate: '09/15/2024',
                    products: [
                        {
                            id: 7,
                            name: 'Product 3',
                            details: 'Color, Size',
                            price: '₱799.00',
                            image: '/assets/image_placeholder.jpg',
                        },
                    ],
                    orderTotal: '₱1298.00',
                    lastActionDate: '08/30/2024',
                },
                // Add more stores and products
            ],
            filteredStores: [],
        };
    },
    created() {
        this.filteredStores = this.stores; // Initialize filteredStores
    },
    methods: {
        handleSearch() {
            const query = this.searchQuery.toLowerCase().trim();

            // Filter by search query and the active tab (parcelStatus)
            if (query === '') {
                this.filterStores(this.activeStatus); // If no search query, reset to filtered by status
            } else {
                this.filteredStores = this.stores.filter((store) => {
                    // Ensure store matches active status and then apply search filtering
                    const matchesStatus = this.activeStatus === 'All' || store.parcelStatus === this.activeStatus;

                    if (!matchesStatus) return false;

                    // Check if store name matches the query
                    const storeNameMatches = store.name.toLowerCase().includes(query);

                    // Check if any product name in the store matches the query
                    const productNameMatches = store.products.some((product) =>
                        product.name.toLowerCase().includes(query),
                    );

                    return storeNameMatches || productNameMatches;
                });
            }
        },
        filterStores(status) {
            this.activeStatus = status; // Update the active tab status

            if (status === 'All') {
                this.filteredStores = this.stores; // Show all stores
            } else {
                this.filteredStores = this.stores.filter((store) => store.parcelStatus === status);
            }

            // Apply search filter after filtering by status if search query is active
            if (this.searchQuery) {
                this.handleSearch();
            }
        },
    },
};
</script>
