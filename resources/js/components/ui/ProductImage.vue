<template>
    <div class="flex flex-col">
        <!-- Product Image -->
        <img
            :src="mainImage"
            alt="Product Image"
            class="border border-primary-700 w-[700px] h-[470px] mb-[38px]"
        />
        <!-- Thumbnails -->
        <div
            class="vueper-slides-wrapper z-[0]"
            :style="wrapperStyle"
        >
            <vueper-slides
                class="no-shadow custom-arrows"
                :autoplay="false"
                :arrows="false"
                :bullets="false"
                :visible-slides="5"
                :slideMultiple="true"
                :gap="4"
                :slide-ratio="1 / 4"
                :dragging-distance="200"
                :breakpoints="{ 800: { visibleSlides: 3, slideMultiple: 3 } }"
            >
                <vueper-slide
                    v-for="(thumbnail, index) in thumbnailImages"
                    :key="index"
                    :style="{ height: '68px', width: '89px' }"
                    class="border border-primary-700"
                    @click="updateMainImage(thumbnail.src)"
                >
                    <template #content>
                        <img
                            :src="thumbnail.src"
                            :alt="thumbnail.alt"
                            class="object-cover w-full h-full"
                        />
                    </template>
                </vueper-slide>
            </vueper-slides>
        </div>
    </div>
</template>

<script>
import { VueperSlides, VueperSlide } from 'vueperslides';
import 'vueperslides/dist/vueperslides.css';

export default {
    name: 'ProductImage',
    components: { VueperSlides, VueperSlide },
    props: {
        mainImage: String,
        thumbnailImages: Array,
    },
    methods: {
        updateMainImage(image) {
            this.$emit('updateMainImage', image);
        },
    },
    computed: {
        wrapperStyle() {
            // Add any computed styles for the wrapper if needed
            return {};
        },
    },
};
</script>

<style scoped>
/* Add Styles Here */
</style>
