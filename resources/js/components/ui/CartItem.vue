<template>
    <div class="flex gap-5 py-6 px-4 bg-neutral-100">
        <input
            type="checkbox"
            class="accent-neutral-300 bg-neutral-300"
        />

        <img
            :src="imageLink"
            :alt="`Photo of ${itemName}`"
            class="border-black border-[1.2px] object-cover"
        />

        <div class="flex flex-wrap gap-5 justify-between w-full text-neutral-700">
            <!-- TODO: sm:flex-1 is temporary until Order Summary creation -->
            <div class="flex md:flex-1 flex-wrap gap-5 justify-between">
                <div class="flex flex-col gap-6 w-full">
                    <div class="font-extrabold leading-4">
                        {{ itemName }}
                    </div>
                    <div class="font-medium leading-4">
                        {{ description }}
                    </div>
                </div>
            </div>

            <!-- TODO: sm:flex-1 is temporary until Order Summary creation -->
            <div class="flex flex-wrap items-center gap-12">
                <div class="font-medium leading-4 sm:flex-1">₱{{ price }}</div>

                <!-- TODO: InputSpinner-->
                <div class="w-20 text-center bg-neutral-500 text-white py-1">
                    {{ quantity }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CartItem',
    props: {
        imageLink: {
            type: String,
            default: 'https://placehold.co/84x67',
        },
        itemName: {
            type: String,
            default: 'None',
        },
        description: {
            type: String,
            default: 'None',
        },
        price: {
            type: Number,
            default: 0,
        },
        quantity: {
            type: Number,
            default: 1,
        },
    },
};
</script>
