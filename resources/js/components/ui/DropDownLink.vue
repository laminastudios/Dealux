<template>
    <div class="inline-flex relative">
        <button
            ref="dropDownButton"
            @click="openDropDown"
            class="flex items-center justify-center gap-[10px] cursor-pointer w-full h-full transition-colors"
            :class="variantClassesContainer"
        >
            <slot></slot>
        </button>
        <transition>
            <div
                v-if="open"
                class="absolute top-full mt-[11px] translate-x-1/2 right-1/2 text-center rounded-[15px] min-w-[7.5rem]"
                :class="variantClassesDropDown"
            >
                <ul class="flex flex-col">
                    <a
                        v-for="(link, index) in links"
                        :key="index"
                        :href="link.link"
                        @click.prevent="handleLinkClick(link)"
                        class="first:rounded-t-[15px] last:rounded-b-[15px] transition-colors"
                        :class="variantClassesItems"
                    >
                        <li class="p-2">
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
                light: 'bg-neutral-50 hover:bg-neutral-100 rounded-md text-neutral-400',
                dark: 'bg-neutral-500 hover:bg-neutral-300 rounded-md text-white',
                bare: 'hover:bg-neutral-100 rounded-md p-2',
            };
            return variants[this.variant] || variants['light'];
        },
        variantClassesDropDown() {
            const variants = {
                light: 'bg-neutral-50 w-full label-4',
                dark: 'bg-neutral-500 text-white w-full label-3',
                bare: 'bg-neutral-500 text-white w-full label-3 font-semibold',
            };
            return variants[this.variant] || variants['light'];
        },
        variantClassesItems() {
            const variants = {
                light: 'hover:bg-neutral-100',
                dark: 'hover:bg-neutral-300',
                bare: 'hover:bg-neutral-300',
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
