<template>
    <vueper-slides
        class="no-shadow"
        :autoplay="true"
        :duration="2000"
        :arrows="false"
        :visible-slides="3"
        :slideMultiple="true"
        :gap="3"
        :slide-ratio="1 / 4"
        :dragging-distance="200"
        :breakpoints="{ 800: { visibleSlides: 3, slideMultiple: 3 } }"
    >
        <vueper-slide
            v-for="(testimonial, index) in testimonials"
            :key="index"
            class="custom-shadow h-[21rem]"
        >
            <template #content>
                <div class="px-[55px] py-[40px] flex flex-col justify-between p-4 rounded-lg bg-white shadow-sm h-full">
                    <div class="flex justify-start">
                        <div class="text-yellow-500 text-xl flex gap-[12px] items-center">
                            <p class="label-3 font-bold">{{ testimonial.rating }}</p>
                            <div>
                                <span
                                    v-for="n in testimonial.rating"
                                    :key="n"
                                    class="inline-block"
                                    >★
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 label-3 text-black font-medium">
                        {{ testimonial.review }}
                    </div>
                    <hr class="border-t border-gray-300 my-4" />
                    <div class="flex items-center gap-3">
                        <div
                            v-if="testimonial.image"
                            class="w-12 h-12 rounded-full overflow-hidden"
                        >
                            <img
                                :src="testimonial.image"
                                alt="User photo"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <div
                            v-else
                            class="w-12 h-12 flex items-center justify-center bg-gray-200 rounded-full text-xl text-gray-600"
                        >
                            <span>{{ testimonial.name.charAt(0) }}</span>
                        </div>
                        <div class="flex flex-col gap-1">
                            <div class="font-semibold label-3">{{ testimonial.name }}</div>
                            <div class="font-medium label-3">Dealux User since: {{ testimonial.userSince }}</div>
                        </div>
                    </div>
                </div>
            </template>
        </vueper-slide>
    </vueper-slides>
</template>

<script>
import { VueperSlides, VueperSlide } from 'vueperslides';
import 'vueperslides/dist/vueperslides.css';

export default {
    name: 'TestimonialCarousel',
    components: {
        VueperSlides,
        VueperSlide,
    },
    props: {
        testimonials: {
            type: Array,
            required: true,
        },
    },
};
</script>
