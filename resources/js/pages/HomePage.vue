<template>
    <section class="min-h-screen-navbar flex">
        <div class="container flex flex-col items-center justify-center w-[1037px]">
            <h1 class="mb-[67px] font-semibold">Sari-sari Deals</h1>
            <div class="w-[1037px]">
                <form
                    class="flex flex-row justify-between"
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
                            />
                        </div>
                    </div>
                    <DropDownInput
                        class="w-[163px] h-[44px]"
                        variant="dark"
                        :items="DropDownItems"
                    >
                        <p class="label-3 font-semibold">Quantity</p>
                        <i class="bx bxs-down-arrow"></i>
                    </DropDownInput>
                    <custom-button
                        variant="filled"
                        size="md"
                        class="gap-[10px] w-[163px]"
                        color="neutral-500"
                    >
                        <p class="label-3 font-semibold">Add Filter</p>
                        <i class="bx bx-add-to-queue text-white h-[15px] w-[15px]"></i>
                    </custom-button>
                </form>

                <!-- Most Searched Products Buttons -->
                <div class="flex flex-row justify-between mt-[20px]">
                    <custom-button
                        v-for="(product, index) in mostSearchedProducts"
                        :key="index"
                        variant="outline"
                        size="md"
                        class="gap-[10px]"
                        @click="searchProduct(product)"
                    >
                        <p class="label-3 font-semibold">{{ product }}</p>
                    </custom-button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue';
import DropDownInput from '../components/ui/DropDownInput.vue';

export default {
    name: 'HomePage',
    data() {
        return {
            searchQuery: '',
            mostSearchedProducts: ['Laptop', 'Phone 15', 'Headphones', 'Camera', 'Watch', 'Shoes', 'Backpack'],
            DropDownItems: [
                { text: 'Option 1', value: '#' },
                { text: 'Option 2', value: '#' },
            ],
        };
    },
    methods: {
        handleSearch() {
            console.log('Searching for:', this.searchQuery);
            // Add search logic here (e.g., API call)
        },
        searchProduct(product) {
            this.searchQuery = product;
            this.handleSearch();
        },
    },
    components: {
        'custom-button': Button,
        DropDownInput,
    },
};
</script>
