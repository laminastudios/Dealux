<!-- EXAMPLE USAGE:  -->

<!-- Filled Button -->
<!-- <custom-button variant ="outline" size="lg"> Filled Button </custom-button> -->

<!-- No-Fill Button -->
<!-- <custom-button variant ="filled" size="lg"> No-Fill Button </custom-button> -->

<template>
    <button
        class="flex justify-center items-center px-[33px] py-[3px] transition-colors font-medium label-4"
        :class="[sizeClasses, variantClasses]"
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: 'Button',
    props: {
        variant: {
            type: String,
            default: 'default',
        },
        size: {
            type: String,
            default: 'medium',
        },
    },
    computed: {
        sizeClasses() {
            const sizes = {
                xs: 'h-[28px]',
                sm: 'h-[36px]',
                md: 'h-[44px]',
                lg: 'h-[52px]',
            };
            return sizes[this.size] || sizes['md'];
        },
        variantClasses() {
            const variants = {
                outline: 'border-[2px] border-neutral-500 text-neutral-600 hover:bg-neutral-100',
                filled: 'bg-neutral-700 text-neutral-100',
            };
            return variants[this.variant] || variants['filled'];
        },
    },
};
</script>
