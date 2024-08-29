<template>
    <section class="min-h-screen">
        <div class="container h-full flex flex-col gap-5 my-10">
            <StoreCartItems
                storeName="Dealux Store"
                :items="[
                    {
                        name: 'Pants',
                        description: 'Green, XL, M',
                        price: '69',
                        quantity: '2',
                    },
                    {
                        name: 'Shoes',
                        description: 'Green, 46, M',
                        price: '69',
                        quantity: '2',
                    },
                ]"
            />

            <StoreCartItems
                storeName="Goldealux"
                :items="[
                    {
                        name: 'Chocolate Cake',
                        description: '128x128, round',
                        price: '69',
                        quantity: '2',
                    },
                ]"
            />
        </div>
    </section>
</template>

<script>
import StoreCartItems from '../components/ui/StoreCartItems.vue';

export default {
    name: 'CartPage',
    components: {
        StoreCartItems,
    },
};
</script>

<style scoped>
/* Add styles here */
</style>
