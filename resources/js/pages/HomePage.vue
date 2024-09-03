<template>
    <section class="min-h-screen-navbar flex bg-background">
        <div class="container flex flex-col items-center justify-center">
            <h1 class="mb-[67px] font-semibold">Sari-sari Deals</h1>
            <div class="w-[1037px]">
                <!-- Search Bar -->
                <form
                    class="flex flex-row justify-between gap-[4px]"
                    @submit.prevent="handleSearch"
                >
                    <div class="flex gap-[4px]">
                        <div
                            class="bg-primary-800 w-[47px] rounded-l-[5px] flex justify-center items-center custom-shadow"
                        >
                            <i class="bx bx-search text-neutral-50 text-[20px] font-medium"></i>
                        </div>
                        <label
                            for="default-search"
                            class="mb-2 label-2 font-semibold text-neutral-50 sr-only"
                            >Search</label
                        >
                        <div
                            class="relative w-[41rem] h-[44px] bg-white flex items-center px-[14px] py-[13px] gap-[13px] border border-white focus-within:border-neutral-600 custom-shadow"
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

                    <!-- Dropdown for selecting display product quantity -->
                    <DropDownInput
                        class="w-[170px] h-[44px] custom-shadow"
                        variant="dark"
                        :items="DropDownItems"
                        name="quantity"
                        @change="handleQuantityChange"
                    >
                        <p class="label-3 font-semibold text-black">Quantity</p>
                        <i class="bx bxs-down-arrow text-black"></i>
                    </DropDownInput>

                    <!-- Button to add filters -->
                    <custom-button
                        variant="filled"
                        color="yellow"
                        size="md"
                        class="gap-[10px] w-[170px] custom-shadow"
                        @click="showPopup = true"
                    >
                        <p class="label-3 font-semibold">Add Filter</p>
                        <i class="bx bx-add-to-queue text-black text-[15px] font-medium"></i>
                    </custom-button>
                </form>

                <!-- Most Searched Products Buttons -->
                <div class="flex flex-row justify-between mt-[20px]">
                    <custom-button
                        v-for="(product, index) in mostSearchedProducts"
                        :key="index"
                        variant="filled"
                        size="md"
                        class="gap-[10px]"
                        color="blue-50"
                        hoverColor="None"
                        @click="searchProduct(product)"
                    >
                        <p class="label-3 font-semibold text-black">{{ product }}</p>
                    </custom-button>
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
            mostSearchedProducts: [
                'Product 1',
                'Product 2',
                'Product 3',
                'Product 4',
                'Product 5',
                'Product 6',
                'Product 7',
            ], // this is just a placeholder
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
            showPopup: false, // Initialize showPopup
        };
    },
    methods: {
        handleSearch() {
            console.log('Searching for:', this.searchQuery);
            if (this.searchQuery.trim()) {
                this.$router.push({ name: 'searchproduct', params: { keyword: this.searchQuery.trim() } });
            }
            // Add search logic here (e.g., API call)
        },
        searchProduct(product) {
            this.searchQuery = product;
            this.handleSearch();
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

<style scoped>
/* Add any custom styles for the popup or other elements here */
</style>
