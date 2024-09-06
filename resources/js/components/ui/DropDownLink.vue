<template>
    <div class="inline-flex relative">
        <button
            ref="dropDownButton"
            @click="openDropDown"
            class="flex items-center justify-center gap-[10px] cursor-pointer w-full h-full transition-colors rounded-[5px]"
            :class="variantClassesContainer"
        >
            <slot></slot>
        </button>
        <transition>
            <div
                v-if="open"
                class="absolute z-50 top-full translate-x-1/2 right-1/2 text-center min-w-[7.5rem]"
                :class="variantClassesDropDown"
            >
                <ul class="flex flex-col">
                    <a
                        v-for="(link, index) in links"
                        :key="index"
                        :href="link.link"
                        @click.prevent="handleLinkClick(link)"
                        class="transition-colors"
                        :class="variantClassesItems"
                    >
                        <li class="py-2 px-4 whitespace-nowrap">
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
    name: 'DropDownLink',
    data() {
        return {
            open: false,
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
    methods: {
        openDropDown() {
            this.open = !this.open;
        },
        closeDropDown(event) {
            if (!this.$refs.dropDownButton.contains(event.target)) {
                this.open = false;
            }
        },
        async logout() {
            try {
                const response = await fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken,
                    },
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }

                window.location.href = '/login'; // Redirect after logout
            } catch (error) {
                console.error('Error logging out:', error);
            }
        },
        handleLinkClick(link) {
            if (link.callback && typeof this[link.callback] === 'function') {
                this[link.callback]();
            } else if (link.link) {
                window.location.href = link.link;
            }
        },
    },
    mounted() {
        document.addEventListener('click', this.closeDropDown);
    },
    beforeDestroy() {
        document.removeEventListener('click', this.closeDropDown);
    },
    props: {
        variant: {
            type: String,
            default: 'light',
        },
        links: {
            type: Array,
            required: true,
        },
    },
    computed: {
        variantClassesContainer() {
            const variants = {
                variant1: 'bg-yellow-400 hover:bg-yellow-500 text-white',
                variant2: 'bg-neutral-50 hover:bg-neutral-100 text-neutral-400',
                navbar: 'hover:text-yellow-400',
            };
            return variants[this.variant] || variants['light'];
        },
        variantClassesDropDown() {
            const variants = {
                variant1: 'bg-background text-primary-600 min-w-full label-4 border border-yellow-200',
                variant2: 'bg-background text-primary-600 min-w-full label-4 border border-neutral-100',
                navbar: 'bg-primary-700 text-white min-w-full label-3 font-semibold',
            };
            return variants[this.variant] || variants['light'];
        },
        variantClassesItems() {
            const variants = {
                variant1: 'hover:bg-neutral-100',
                variant2: 'hover:bg-neutral-100',
                navbar: 'hover:text-yellow-400',
            };
            return variants[this.variant] || variants['light'];
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
