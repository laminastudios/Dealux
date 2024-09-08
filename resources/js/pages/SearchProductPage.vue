<template>
    <section class="min-h-screen-navbar flex bg-background">
        <div class="container flex flex-col items-center mt-[5rem] mb-[5rem]">
            <!-- Centering the search form -->
            <div class="w-[1037px] flex justify-center">
                <form
                    class="flex flex-row justify-between gap-[4px]"
                    @submit.prevent="handleSearch"
                >
                    <div class="flex gap-[4px]">
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
                        class="w-[163px] h-[44px] custom-shadow"
                        variant="variant1"
                        :items="DropDownItems"
                        name="quantity"
                        @change="handleQuantityChange"
                    >
                        <p class="label-3 font-semibold text-white">Quantity</p>
                        <i class="bx bxs-down-arrow text-white"></i>
                    </DropDownInput>

                    <!-- Button to add filters -->
                    <custom-button
                        variant="filled"
                        color="yellow"
                        size="md"
                        class="gap-[10px] w-[163px] custom-shadow"
                        @click="showPopup = true"
                    >
                        <p class="label-3 font-semibold">Add Filter</p>
                        <i class="bx bx-add-to-queue text-white text-[15px] font-medium"></i>
                    </custom-button>
                </form>
            </div>

            <!-- "Products" section -->
            <div class="mt-[83px]">
                <div class="flex gap-[23px] items-center">
                    <h3 class="font-semibold">Products</h3>
                    <ComparePopup
                        :initialProduct="initialProduct"
                        :remainingProducts="remainingProducts"
                        class="bg-blue-100 rounded-[5px] flex items-center justify-center w-[170px] gap-2 mt-8"
                    >
                        <p class="label-4 font-semibold">Compare Me</p>
                        <i class="bx bx-git-compare text-[18px]"></i>
                    </ComparePopup>
                </div>
                <!-- Product -->
                <div class="mt-[39px]">
                    <!-- Product Grid -->
                    <div class="mt-[39px] grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-[23px]">
                        <ProductCard
                            class="custom-shadow"
                            @click="goToProduct(product.name)"
                            v-for="product in filteredProducts"
                            :key="product.id"
                            :product="product"
                        />
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
import ProductCard from '../components/ui/ProductCard.vue';
import ComparePopup from '../components/ui/ComparePopup.vue';

export default {
    name: 'HomePage',
    components: {
        'custom-button': Button,
        DropDownInput,
        AddFilterModal,
        ProductCard,
        ComparePopup,
    },
    props: ['keyword'],
    data() {
        return {
            searchQuery: this.keyword || '', // Initialize with the keyword from the route
            selectedQuantity: 5, // Default quantity
            initialProduct: {
                Name: 'iPhone 15 Pro Max',
                Network: 'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                Launch: '2023, September 12',
                Dimension: '159.9 x 76.7 x 8.3 mm (6.30 x 3.02 x 0.33 in)',
                Weight: '221 g (7.80 oz)',
                Resolution: '1290 x 2796 pixels, 19.5:9 ratio (~460 ppi density)',
                Chipset: 'Apple A17 Pro (3 nm)',
                GPU: 'Apple GPU (6-core graphics)',
                Features: 'Dual-LED dual-tone flash, HDR (photo/panorama)',
                Modules: '12 MP, f/1.9, 23mm (wide), 1/3.6", PDAF, OIS',
                Sensors: 'Face ID, accelerometer, gyro, proximity, compass, barometer',
                Battery: 'Li-Ion 4441 mAh, non-removable',
                Colors: 'Black Titanium, White Titanium, Blue Titanium, Natural Titanium',
            },
            remainingProducts: [
                {
                    Name: 'iPhone 15 Pro Max 2',
                    Network: 'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                    Launch: '2023, September 12',
                    Dimension: '159.9 x 76.7 x 8.3 mm (6.30 x 3.02 x 0.33 in)',
                    Weight: '221 g (7.80 oz)',
                    Resolution: '1290 x 2796 pixels, 19.5:9 ratio (~460 ppi density)',
                    Chipset: 'Apple A17 Pro (3 nm)',
                    GPU: 'Apple GPU (6-core graphics)',
                    Features: 'Dual-LED dual-tone flash, HDR (photo/panorama)',
                    Modules: '12 MP, f/1.9, 23mm (wide), 1/3.6", PDAF, OIS',
                    Sensors: 'Face ID, accelerometer, gyro, proximity, compass, barometer',
                    Battery: 'Li-Ion 4441 mAh, non-removable',
                    Colors: 'Black Titanium, White Titanium, Blue Titanium, Natural Titanium',
                },
                {
                    Name: 'iPhone 15 Pro Max 3',
                    Network: 'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                    Launch: '2023, September 12',
                    Dimension: '159.9 x 76.7 x 8.3 mm (6.30 x 3.02 x 0.33 in)',
                    Weight: '221 g (7.80 oz)',
                    Resolution: '1290 x 2796 pixels, 19.5:9 ratio (~460 ppi density)',
                    Chipset: 'Apple A17 Pro (3 nm)',
                    GPU: 'Apple GPU (6-core graphics)',
                    Features: 'Dual-LED dual-tone flash, HDR (photo/panorama)',
                    Modules: '12 MP, f/1.9, 23mm (wide), 1/3.6", PDAF, OIS',
                    Sensors: 'Face ID, accelerometer, gyro, proximity, compass, barometer',
                    Battery: 'Li-Ion 4441 mAh, non-removable',
                    Colors: 'Black Titanium, White Titanium, Blue Titanium, Natural Titanium',
                },
                {
                    Name: 'iPhone 15 Pro Max 4',
                    Network: 'GSM / CDMA / HSPA / EVDO / LTE / 5G',
                    Launch: '2023, September 12',
                    Dimension: '159.9 x 76.7 x 8.3 mm (6.30 x 3.02 x 0.33 in)',
                    Weight: '221 g (7.80 oz)',
                    Resolution: '1290 x 2796 pixels, 19.5:9 ratio (~460 ppi density)',
                    Chipset: 'Apple A17 Pro (3 nm)',
                    GPU: 'Apple GPU (6-core graphics)',
                    Features: 'Dual-LED dual-tone flash, HDR (photo/panorama)',
                    Modules: '12 MP, f/1.9, 23mm (wide), 1/3.6", PDAF, OIS',
                    Sensors: 'Face ID, accelerometer, gyro, proximity, compass, barometer',
                    Battery: 'Li-Ion 4441 mAh, non-removable',
                    Colors: 'Black Titanium, White Titanium, Blue Titanium, Natural Titanium',
                },
            ],
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
                {
                    id: 1,
                    name: 'Kwekwek mainit',
                    price: '₱199',
                    oldPrice: '₱299',
                    image: '/assets/image_placeholder.jpg',
                },
                { id: 2, name: 'Iphone 15', price: '₱299', oldPrice: '₱399', image: '/assets/image_placeholder.jpg' },
                {
                    id: 3,
                    name: 'Spades large',
                    price: '₱399',
                    oldPrice: '₱499',
                    image: '/assets/image_placeholder.jpg',
                },
                { id: 4, name: 'Pencil Case', price: '₱499', oldPrice: '₱599', image: '/assets/image_placeholder.jpg' },
                { id: 5, name: 'Eyeglass', price: '₱599', oldPrice: '₱699', image: '/assets/image_placeholder.jpg' },
                { id: 6, name: 'Vivo y11', price: '₱699', oldPrice: '₱799', image: '/assets/image_placeholder.jpg' },
                {
                    id: 7,
                    name: 'Siomai rice bente',
                    price: '₱799',
                    oldPrice: '₱899',
                    image: '/assets/image_placeholder.jpg',
                },
                { id: 8, name: 'Fewa', price: '₱899', oldPrice: '₱999', image: '/assets/image_placeholder.jpg' },
                { id: 9, name: 'Dahon', price: '₱999', oldPrice: '₱1099', image: '/assets/image_placeholder.jpg' },
                {
                    id: 10,
                    name: 'Sample lang ewan ko na',
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
            if (this.searchQuery.trim()) {
                this.$router.push({ name: 'searchproduct', params: { keyword: this.searchQuery.trim() } });
            }
            // Add search logic here (e.g., API call)
        },
        handleQuantityChange(selectedItem) {
            this.selectedQuantity = selectedItem.value;
            console.log('Selected Quantity:', this.selectedQuantity);
            this.handleSearch(); // Trigger search when dropdown value changes
        },
        goToProduct(productName) {
            // Navigate to the product page using the product name as the keyword
            this.$router.push({ name: 'product', params: { productName: productName } });
        },
    },
    watch: {
        keyword(newKeyword) {
            this.searchQuery = newKeyword;
            this.handleSearch();
        },
    },
    mounted() {
        this.handleSearch(); // Perform search when the page loads
    },
};
</script>
