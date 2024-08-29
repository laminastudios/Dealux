<!-- EXAMPLE USAGE:  -->

<!-- Filled Button -->
<!-- <custom-button variant ="outline" size="lg" color="neutral-500" hoverColor="neutral-100"> Filled Button </custom-button> -->

<!-- No-Fill Button -->
<!-- <custom-button variant ="filled" size="lg" color="neutral-500" hoverColor="neutral-100"> No-Fill Button </custom-button> -->

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
        color: {
            type: String,
            default: 'primary-500',
        },
        hoverColor: {
            type: String,
            default: 'primary-500',
        },
    },
    computed: {
        sizeClasses() {
            const sizes = {
                xs: 'h-[28px]',
                sm: 'h-[36px]',
                md: 'h-[44px]',
                lg: 'h-[52px]',
                xl: 'h-[52px] w-[232px]',
            };
            return sizes[this.size] || sizes['md'];
        },
        variantClasses() {
            const hoverBgColor = this.hoverColor || `${this.color}-dark`;

            if (this.variant === 'outline') {
                return `border-2 border-${this.color} text-${this.color} hover:bg-${this.color}/10`;
            } else if (this.variant === 'filled') {
                return `bg-${this.color} text-white hover:bg-${hoverBgColor}`;
            }
            return '';
        },
    },
};
</script>
