<template>
    <div class="flex flex-col custom-shadow text-black">
        <div class="px-6 py-4 flex gap-5 items-center bg-white border-b-neutral-500 border-b-[1px]">
            <div class="flex gap-3 flex-1 items-center">
                <input
                    type="checkbox"
                    v-if="items.length > 1"
                    :checked="allStoreItemsSelected"
                    @change="
                        addAllStoreItems($event);
                        $emit('selectItemsByStore', { $event, storeItemsId });
                        $emit('selectStore', { isChecked: $event.target.checked, storeId });
                    "
                    class="checked:bg-primary-500 bg-white border border-primary-500 rounded w-6 h-6"
                />
                <div class="font-semibold w-full label-4">
                    {{ storeName }}
                </div>
            </div>

            <custom-button
                color="green"
                size="xs"
            >
                <div class="font-semibold flex items-center gap-2 label-4">
                    <i class="bx bxs-crown"></i>
                    <a :href="storeURL">Visit Store</a>
                </div>
            </custom-button>
        </div>

        <div class="flex flex-col">
            <CartItem
                v-for="item in items"
                :key="item.id"
                :itemId="item.id"
                :itemName="item.name"
                :details="item.details"
                :price="item.price"
                :quantity="item.quantity"
                :image="item.image"
                :selectedItems="selectedItems"
                @handleSelectItemEmit="handleSelectItemEmit"
                @selectStoreItem="selectStoreItem"
            />
        </div>
    </div>
</template>

<script>
import CartItem from './CartItem.vue';
import Button from './Button.vue';

export default {
    name: 'StoreCartItems',
    props: {
        items: Array,
        storeName: String,
        storeURL: String,
        storeId: Number,
        selectedStores: Set,
        selectedItems: Set,
        selectedItemsGroupByStore: Array,
    },
    methods: {
        handleSelectItemEmit({ isChecked, itemId }) {
            this.$emit('selectItem', { isChecked, itemId });
        },
        handleSelectStoreByItemsEmit({ storeId, selectedStoreItems }) {
            this.$emit('selectStoreByItems', { storeId, selectedStoreItems });
        },
        selectStoreItem({ $event, itemId }) {
            if ($event.target.checked) {
                this.selectedStoreItems.add(itemId);
                this.handleSelectStoreByItemsEmit({
                    storeId: this.storeId,
                    selectedStoreItems: this.selectedStoreItems,
                });
                return;
            }
            this.selectedStoreItems.delete(itemId);
            this.handleSelectStoreByItemsEmit({
                storeId: this.storeId,
                selectedStoreItems: this.selectedStoreItems,
            });
        },
        addAllStoreItems($event) {
            if ($event.target.checked) {
                this.storeItemsId.forEach((itemId) => this.selectedStoreItems.add(itemId));
                return;
            }
            this.selectedStoreItems.clear();
        },
    },
    computed: {
        storeItemsId() {
            return Array.from(this.items, (item) => item.id);
        },
        selectedStoreItems() {
            let store = this.selectedItemsGroupByStore.find((store) => store.storeId === this.storeId);
            if (store) {
                return store.items;
            }
            return new Set();
        },
        allStoreItemsSelected() {
            return this.selectedStores.has(this.storeId);
        },
    },
    components: {
        'custom-button': Button,
        CartItem,
    },
};
</script>
