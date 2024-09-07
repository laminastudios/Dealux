<template>
    <div
        class="vueper-slides-wrapper"
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
                v-for="(thumbnail, index) in thumbnails"
                :key="index"
                :style="{ height: '68px', width: '89px' }"
                class="border border-primary-700"
                @click="handleClick(thumbnail.src)"
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
    methods: {
        handleClick(src) {
            this.$emit('thumbnail-click', src);
        },
    },
};
</script>

<style scoped>
/* Add Styles Here */
</style>
