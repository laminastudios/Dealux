<template>
    <div class="col-span-12 bg-white border shadow w-[1216px] h-[auto] p-6 mb-[80px]">
        <!-- Ratings and Reviews Header -->
        <h6 class="font-semibold text-black mt-[30px] mb-[40px] bg-neutral-50 w-[1156px] h-[56px] text-left pl-3 pt-4">
            Ratings and Reviews
        </h6>

        <!-- Parent container to center content -->
        <div class="flex justify-center items-start mb-[38px]">
            <!-- Average Rating and Stars -->
            <div class="flex flex-col items-center mb-6">
                <div class="flex items-center mb-2">
                    <h3 class="font-semibold text-yellow-400">{{ averageRating }}</h3>
                    <span class="font-bold text-neutral-300 label-1 ml-2 mt-1">out of 5</span>
                </div>
                <div class="flex">
                    <i
                        class="bx bxs-star text-yellow-400 text-2xl"
                        v-for="n in Math.floor(averageRating)"
                        :key="n"
                    ></i>
                    <i
                        class="bx bxs-star-half text-yellow-400 text-2xl"
                        v-if="averageRating % 1 !== 0"
                    ></i>
                    <i
                        class="bx bx-star text-neutral-300 text-2xl"
                        v-for="n in 5 - Math.ceil(averageRating)"
                        :key="`empty-${n}`"
                    ></i>
                </div>
            </div>

            <!-- Rating Stars -->
            <div class="flex flex-col space-y-1 ml-10">
                <div
                    v-for="rating in [5, 4, 3, 2, 1]"
                    :key="rating"
                    class="flex items-center"
                >
                    <div class="flex items-center w-[100px]">
                        <i
                            class="bx bxs-star text-yellow-400"
                            v-for="n in rating"
                            :key="n"
                        ></i>
                        <i
                            class="bx bxs-star text-neutral-100"
                            v-for="n in 5 - rating"
                            :key="`empty-${n}`"
                        ></i>
                    </div>
                    <div class="flex items-center w-[100px] h-[10px] bg-neutral-50 mx-4 overflow-hidden">
                        <!-- Rating Bar -->
                        <div
                            class="h-full bg-yellow-400"
                            :style="{ width: `${getRatingPercentage(rating)}%` }"
                        ></div>
                    </div>

                    <span class="label-3 text-neutral-400 font-medium">{{ getRatingCount(rating) }}</span>
                </div>
            </div>
        </div>

        <!-- Product Reviews -->
        <h6 class="font-semibold text-black mt-[30px] mb-[40px] bg-neutral-50 w-[1156px] h-[56px] text-left pl-3 pt-4">
            Product Reviews
        </h6>
        <div
            v-for="review in paginatedReviews"
            :key="review.id"
            class="flex items-start mb-6 ml-[58px] mr-[71px]"
        >
            <i class="bx bx-user-circle text-5xl text-neutral-700"></i>
            <div class="ml-4 flex flex-col justify-between h-full">
                <div class="flex flex-col items-start mb-2">
                    <span class="text-black label-2 font-semibold mb-2">{{ review.name }}</span>
                    <div class="flex items-center mb-2">
                        <i
                            class="bx bxs-star text-yellow-500 font-regular mr-1"
                            v-for="n in review.rating"
                            :key="n"
                        ></i>
                        <i
                            class="bx bx-star text-neutral-300 font-regular mr-1"
                            v-for="n in 5 - review.rating"
                            :key="`empty-${n}`"
                        ></i>
                    </div>
                    <span class="text-neutral-400 label-4 font-semibold mb-[40px]">
                        {{ review.date }} | {{ review.variation }}
                    </span>
                </div>
                <div class="flex flex-col">
                    <p class="text-neutral-600 label-2 font-semibold mb-[20px]">
                        <span>Product Quality:</span>
                        <span class="text-black label-2 font-semibold">{{ review.quality }}</span>
                    </p>
                    <p class="text-neutral-600 label-2 font-semibold mb-[20px]">
                        <span>Best Feature:</span>
                        <span class="text-black label-2 font-semibold">{{ review.feature }}</span>
                    </p>
                    <p class="text-neutral-600 label-2 font-semibold mb-[40px]">
                        <span>Performance:</span>
                        <span class="text-black label-2 font-semibold">{{ review.performance }}</span>
                    </p>
                </div>
                <p class="text-black label-2 font-semibold mb-[40px] text-justify">
                    {{ review.description }}
                </p>
            </div>
        </div>

        <!-- Pagination -->
        <div
            class="flex justify-center items-center text-black mt-[30px] bg-neutral-50 w-[1156px] h-[56px] text-left pl-3 pt-2"
        >
            <button
                @click="changePage(currentPage - 1)"
                :disabled="currentPage === 1"
                class="px-3 py-1 text-neutral-500 label-5 font-bold mr-[15px] flex items-center justify-center"
            >
                <i class="bx bx-left-arrow text-xl"></i>
            </button>
            <button
                v-for="pg in totalPages"
                :key="pg"
                @click="changePage(pg)"
                :class="[
                    'px-3 py-1 text-neutral-500 label-5 font-bold w-[71px] h-[28px] border-2 border-solid border-neutral-500 rounded-[5px] mr-[15px]',
                    { 'bg-neutral-100 text-neutral-100': currentPage === pg },
                ]"
            >
                {{ pg }}
            </button>
            <button
                @click="changePage(currentPage + 1)"
                :disabled="currentPage === totalPages"
                class="px-3 py-1 text-neutral-500 label-5 font-bold mr-[15px] flex items-center justify-center"
            >
                <i class="bx bx-right-arrow text-xl"></i>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProductRatingsReviews',
    props: {
        totalRatings: Number,
        reviews: Array,
    },
    data() {
        return {
            currentPage: 1,
            reviewsPerPage: 1,
        };
    },
    computed: {
        paginatedReviews() {
            const start = (this.currentPage - 1) * this.reviewsPerPage;
            const end = start + this.reviewsPerPage;
            return this.reviews.slice(start, end);
        },
        totalPages() {
            return Math.ceil(this.reviews.length / this.reviewsPerPage);
        },
        averageRating() {
            if (this.reviews.length === 0) return 0;

            const total = this.reviews.reduce((sum, review) => sum + review.rating, 0);
            return (total / this.reviews.length).toFixed(1);
        },
    },
    methods: {
        getRatingCount(rating) {
            return this.reviews.filter((review) => review.rating === rating).length;
        },
        getRatingPercentage(rating) {
            const count = this.getRatingCount(rating);
            return (count / this.totalRatings) * 100;
        },
        changePage(page) {
            if (page > 0 && page <= this.totalPages) {
                this.currentPage = page;
            }
        },
    },
    watch: {
        reviews(newReviews) {
            // Reset to the first page when reviews change
            this.currentPage = 1;
        },
    },
};
</script>

<style scoped>
.text-justify {
    text-align: justify;
}
</style>
