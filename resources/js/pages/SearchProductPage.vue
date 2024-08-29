<template>
    <section class="min-h-screen-navbar flex">
        <div class="container flex flex-col items-center mt-[110px]">
            <!-- Centering the search form -->
            <div class="w-[1037px] flex justify-center">
                <form
                    class="flex flex-row justify-between gap-[5px]"
                    @submit.prevent="handleSearch"
                >
                    <div>
                        <label
                            for="default-search"
                            class="mb-2 label-2 font-semibold text-neutral-50 sr-only"
                            >Search</label
                        >
                        <div
                            class="relative w-[43.5rem] h-[44px] bg-neutral-200 flex items-center px-[14px] py-[13px] gap-[13px] border border-neutral-200 focus-within:border-neutral-600"
                        >
                            <i class="bx bx-search text-neutral-50 text-[15px] font-medium"></i>
                            <input
                                type="search"
                                id="default-search"
                                class="block w-full label-2 p-0 text-neutral-800 font-semibold bg-transparent placeholder:text-neutral-50 border-none focus:outline-none focus:ring-0"
                                placeholder="Search Product"
                                v-model="searchQuery"
                                @keydown.enter="handleSearch"
                            />
                        </div>
                    </div>

                    <!-- Dropdown for selecting display product quantity -->
                    <DropDownInput
                        class="w-[163px] h-[44px]"
                        variant="dark"
                        :items="DropDownItems"
                        name="quantity"
                        @change="handleQuantityChange"
                    >
                        <p class="label-3 font-semibold">Quantity</p>
                        <i class="bx bxs-down-arrow"></i>
                    </DropDownInput>

                    <!-- Button to add filters -->
                    <custom-button
                        variant="filled"
                        size="md"
                        class="gap-[10px] w-[163px]"
                        color="neutral-500"
                        @click="showPopup = true"
                    >
                        <p class="label-3 font-semibold">Add Filter</p>
                        <i class="bx bx-add-to-queue text-white h-[15px] w-[15px]"></i>
                    </custom-button>
                </form>
            </div>

            <!-- "Products" section -->
            <div class="mt-[83px] w-full">
                <div class="flex gap-[23px]">
                    <h3 class="font-semibold">Products</h3>
                    <custom-button
                        variant="filled"
                        size="md"
                        class="gap-[10px]"
                        color="neutral-500"
                    >
                        <p class="label-3 font-semibold">Compare Me</p>
                        <i class="bx bx-git-compare text-white text-[18px]"></i>
                    </custom-button>
                </div>
                <!-- Product -->
                <div class="mt-[39px]">
                    <!-- Product Grid -->
                    <div class="mt-[39px] grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-[23px]">
                        <div
                            v-for="product in filteredProducts"
                            :key="product.id"
                            class="flex flex-col items-center"
                        >
                            <img
                                :src="product.image"
                                alt="Product Image"
                                class="h-[140px] w-full object-cover"
                            />
                            <!-- rectangle div -->
                            <div class="bg-neutral-100 p-[12px] w-full">
                                <h6>{{ product.name }}</h6>
                                <h6 class="text-red-500">{{ product.price }}</h6>
                                <p class="label-4 text-neutral-300">
                                    <s>{{ product.oldPrice }}</s>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pop-Up Component -->
        <AddFilterModal
            :visible.sync="showPopup"
            @update:visible="showPopup = $event"
        ></AddFilterModal>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue';
import DropDownInput from '../components/ui/DropDownInput.vue';
import AddFilterModal from '../components/ui/AddFilterModal.vue';

export default {
    name: 'HomePage',
    data() {
        return {
            searchQuery: '',
            selectedQuantity: 5, // Default quantity
            DropDownItems: [
                { text: '1', value: 1 },
                { text: '2', value: 2 },
                { text: '3', value: 3 },
                { text: '4', value: 4 },
                { text: '5', value: 5 },
                { text: '6', value: 6 },
                { text: '7', value: 7 },
                { text: '8', value: 8 },
                { text: '9', value: 9 },
                { text: '10', value: 10 },
            ],
            products: [
                { id: 1, name: 'Product 1', price: '₱199', oldPrice: '₱299', image: '/assets/image_placeholder.jpg' },
                { id: 2, name: 'Product 2', price: '₱299', oldPrice: '₱399', image: '/assets/image_placeholder.jpg' },
                { id: 3, name: 'Product 3', price: '₱399', oldPrice: '₱499', image: '/assets/image_placeholder.jpg' },
                { id: 4, name: 'Product 4', price: '₱499', oldPrice: '₱599', image: '/assets/image_placeholder.jpg' },
                { id: 5, name: 'Product 5', price: '₱599', oldPrice: '₱699', image: '/assets/image_placeholder.jpg' },
                { id: 6, name: 'Product 6', price: '₱699', oldPrice: '₱799', image: '/assets/image_placeholder.jpg' },
                { id: 7, name: 'Product 7', price: '₱799', oldPrice: '₱899', image: '/assets/image_placeholder.jpg' },
                { id: 8, name: 'Product 8', price: '₱899', oldPrice: '₱999', image: '/assets/image_placeholder.jpg' },
                { id: 9, name: 'Product 9', price: '₱999', oldPrice: '₱1099', image: '/assets/image_placeholder.jpg' },
                {
                    id: 10,
                    name: 'Product 10',
                    price: 'P1099',
                    oldPrice: 'P1199',
                    image: '/assets/image_placeholder.jpg',
                },
            ],
            showPopup: false, // Initialize showPopup
        };
    },
    computed: {
        filteredProducts() {
            return this.products.slice(0, this.selectedQuantity);
        },
    },
    methods: {
        handleSearch() {
            console.log('Searching for:', this.searchQuery);
            // Add search logic here (e.g., API call)
        },
        handleQuantityChange(selectedItem) {
            this.selectedQuantity = selectedItem.value;
            console.log('Selected Quantity:', this.selectedQuantity);
            this.handleSearch(); // Trigger search when dropdown value changes
        },
    },
    components: {
        'custom-button': Button,
        DropDownInput,
        AddFilterModal,
    },
};
</script>
