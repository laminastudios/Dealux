<template>
    <div class="inline-flex relative">
        <div
            @click="toggleDropDown"
            class="inline-flex gap-[10px] cursor-pointer hover:bg-neutral-100 rounded-md p-2 transition-colors"
        >
            <slot></slot>
        </div>
        <transition>
            <div
                v-if="open"
                class="absolute top-full mt-[11px] w-[10rem] translate-x-1/2 right-1/2 text-center bg-neutral-500 rounded-[15px] text-white"
            >
                <ul class="flex flex-col">
                    <a
                        v-for="(link, index) in links"
                        :key="index"
                        :href="link.link"
                        class="hover:bg-neutral-300 first:rounded-t-[15px] last:rounded-b-[15px] transition-colors"
                    >
                        <li class="p-2 label-3 font-semibold">
                            {{ link.text }}
                        </li>
                    </a>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    name: 'DropDown',
    mounted() {},
    data() {
        return {
            open: false,
        };
    },
    methods: {
        toggleDropDown() {
            this.open = !this.open;
        },
    },
    props: {
        links: {
            type: Array,
            required: true,
        },
    },
};
</script>

<style>
/* Transition Styling */
.v-enter-active,
.v-leave-active {
    transition: opacity 100ms ease-in-out;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
