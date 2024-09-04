<template>
    <vueper-slides
        class="no-shadow custom-arrows"
        :autoplay="false"
        :duration="2000"
        :arrows="false"
        :bullets="false"
        :visible-slides="5"
        :slideMultiple="true"
        :gap="3"
        :slide-ratio="1 / 4"
        :dragging-distance="200"
        :breakpoints="{ 800: { visibleSlides: 3, slideMultiple: 3 } }"
    >
        <vueper-slide
            v-for="(thumbnail, index) in thumbnails"
            :key="index"
            class="border border-primary-700 w-[135px] h-[68px]"
        >
            <img
                :src="thumbnail.src"
                :alt="thumbnail.alt"
                class="w-[135px] h-[68px] object-cover"
            />
        </vueper-slide>
    </vueper-slides>
</template>

<script>
import { VueperSlides, VueperSlide } from 'vueperslides';
import 'vueperslides/dist/vueperslides.css';

export default {
    name: 'ProductImageThumbnail',
    components: {
        VueperSlides,
        VueperSlide,
    },
    props: {
        thumbnails: {
            type: Array,
            required: true,
            default: () => [],
        },
    },
};
</script>

<style scoped>
/* Add Styles Here */
</style>
