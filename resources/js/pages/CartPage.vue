<template>
    <section class="min-h-screen mx-auto bg-background text-black">
        <EmptyCartView v-show="stores.length === 0" />
        <div
            class="flex gap-8 justify-center container py-20"
            v-show="stores.length > 0"
        >
            <div class="flex-1 h-full flex flex-col gap-8">
                <div class="bg-white px-6 py-2 flex justify-between custom-shadow">
                    <div class="flex items-center gap-3">
                        <input
                            type="checkbox"
                            :checked="allItemsChecked"
                            class="checked:bg-primary-500 bg-white border border-primary-500 rounded w-5 h-5"
                            @change="
                                selectAllStores($event);
                                selectAllItems($event);
                            "
                        />
                        <span class="font-semibold label-4">
                            Select All ({{ allItems.length }} item{{ allItems.length > 1 ? 's' : '' }})
                        </span>
                    </div>
                    <button
                        class="px-0 label-4 flex gap-1 items-center hover:text-red-600"
                        @click="clearCartItems"
                    >
                        <i class="bx bx-trash font-semibold"></i>
                        <span class="font-semibold leading-4">Delete</span>
                    </button>
                </div>

                <div class="flex flex-col gap-2">
                    <StoreCartItems
                        v-for="store in stores"
                        v-show="store.items.length > 0"
                        :key="store.id"
                        :storeId="store.id"
                        :storeName="store.name"
                        :storeURL="store.link"
                        :items="store.items"
                        :selectedStores="selectedStores"
                        :selectedItems="selectedItems"
                        :selectedItemsGroupByStore="selectedItemsGroupByStore"
                        @selectStore="selectStore"
                        @selectItem="selectItem"
                        @selectItemsByStore="selectItemsByStore"
                        @selectStoreByItems="selectStoreByItems"
                    />
                </div>
            </div>

            <OrderSummary
                :totalItems="allItems.length"
                :priceSubtotal="priceSubtotal"
                :totalShippingFee="totalShippingFee"
            />
        </div>
    </section>
</template>

<script>
import StoreCartItems from '../components/ui/StoreCartItems.vue';
import OrderSummary from '../components/ui/OrderSummary.vue';
import Button from '../components/ui/Button.vue';
import EmptyCartView from '../components/ui/EmptyCartView.vue';

export default {
    name: 'CartPage',

    data() {
        return {
            tite: false,
            selectedItemsGroupByStore: [], // [{ storeID: ..., items: Set([...itemIDs]) }, ...]
            selectedStores: new Set(),
            selectedItems: new Set(), // assume that all items have unique ID
            stores: [
                {
                    id: 1,
                    name: 'Store A',
                    link: '#',
                    items: [
                        {
                            id: 1,
                            name: 'Product A',
                            details: '128x128, round',
                            price: 69,
                            shippingFee: 10,
                            quantity: 2,
                            image: 'https://placehold.co/84x67',
                        },
                        {
                            id: 2,
                            name: 'Product A1',
                            details: '128x128, round',
                            price: 420,
                            shippingFee: 10,
                            quantity: 1,
                            image: 'https://placehold.co/84x67',
                        },
                    ],
                },
                {
                    id: 2,
                    name: 'Store B',
                    link: '#',
                    items: [
                        {
                            id: 3,
                            name: 'Product B',
                            details: '128x128, round',
                            price: 69_420,
                            shippingFee: 10,
                            quantity: 2,
                            image: 'https://placehold.co/84x67',
                        },
                    ],
                },
            ],
        };
    },

    methods: {
        clearCartItems() {
            if (this.allItemsChecked) {
                this.stores = [];
            } else if (this.selectedItems.size > 0) {
                this.stores.forEach((_, idx) => {
                    this.stores[idx].items = this.stores[idx].items.filter((item) => !this.selectedItems.has(item.id));
                });
            } else if (this.selectedStores.size > 0) {
                this.stores = this.stores.filter((store) => !this.selectedStores.has(store.id));
            }
            this.selectedStores.clear();
            this.selectedItems.clear();
            this.selectedItemsGroupByStore.clear();
        },
        selectStore({ isChecked, storeId }) {
            if (isChecked) {
                this.selectedStores.add(storeId);
                return;
            }
            this.selectedStores.delete(storeId);
        },
        selectItem({ isChecked, itemId }) {
            if (isChecked) {
                this.selectedItems.add(itemId);
                return;
            }
            this.selectedItems.delete(itemId);
        },
        selectAllStores($event) {
            if ($event.target.checked) {
                this.stores.forEach((store) => {
                    this.selectedStores.add(store.id);
                    this.selectedItemsGroupByStore.push({
                        storeId: store.id,
                        items: new Set(Array.from(store.items, (item) => item.id)),
                    });
                });
                return;
            }
            this.selectedStores.clear();
            this.selectedItemsGroupByStore = [];
        },
        selectAllItems($event) {
            if ($event.target.checked) {
                this.allItems.forEach((item) => this.selectedItems.add(item.id));
                return;
            }
            this.selectedItems.clear();
        },
        selectItemsByStore({ $event, storeItemsId }) {
            if ($event.target.checked) {
                this.selectedItems = new Set([...this.selectedItems, ...storeItemsId]);
                return;
            }
            storeItemsId.forEach((itemId) => this.selectedItems.delete(itemId));
        },
        selectStoreByItems({ storeId, selectedStoreItems }) {
            let storeItemsId = this.stores.find((store) => store.id === storeId).items;
            if (selectedStoreItems.size === storeItemsId.length) {
                this.selectedStores.add(storeId);
                return;
            }
            this.selectedStores.delete(storeId);
        },
    },

    computed: {
        priceSubtotal() {
            return this.allItems.reduce((total, item) => total + item.price, 0);
        },
        totalShippingFee() {
            return this.allItems.reduce((shippingFee, item) => shippingFee + item.shippingFee, 0);
        },
        allItems() {
            return Array.from(this.stores, (store) => store.items).flat();
        },
        allItemsChecked() {
            return this.selectedItems.size === this.allItems.length;
        },
    },

    components: {
        StoreCartItems,
        OrderSummary,
        Button,
        EmptyCartView,
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
