<template>
    <section class="min-h-screen mx-auto">
        <div class="flex gap-5 justify-center container my-10">
            <div class="flex-1 h-full flex flex-col gap-5">
                <div class="bg-neutral-100 px-4 py-2 flex justify-between">
                    <div class="flex items-center gap-2 text-sm">
                        <input
                            type="checkbox"
                            class="accent-neutral-300 bg-neutral-300"
                        />
                        <span class="font-medium leading-4">
                            Select All (3 (items))
                            <!-- TODO: compute total number of items -->
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="bx bx-trash font-medium"></i>
                        <span class="font-medium leading-4">Delete</span>
                    </div>
                </div>

                <StoreCartItems
                    storeName="Dealux Store"
                    :items="[
                        {
                            name: 'Pants',
                            description: 'Green, XL, M',
                            price: 69,
                            quantity: 2,
                        },
                        {
                            name: 'Shoes',
                            description: 'Green, 46, M',
                            price: 69,
                            quantity: 2,
                        },
                    ]"
                />

                <StoreCartItems
                    storeName="Goldealux"
                    :items="[
                        {
                            name: 'Chocolate Cake',
                            description: '128x128, round',
                            price: 69,
                            quantity: 2,
                        },
                    ]"
                />
            </div>

            <OrderSummary />
        </div>
    </section>
</template>

<script>
import StoreCartItems from '../components/ui/StoreCartItems.vue';
import OrderSummary from '../components/ui/OrderSummary.vue';

export default {
    name: 'CartPage',
    components: {
        StoreCartItems,
        OrderSummary,
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
