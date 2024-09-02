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
            default: 'filled',
        },
        size: {
            type: String,
            default: 'medium',
        },
        color: {
            type: String,
            default: 'yellow',
        },
        hoverColor: {
            type: String,
            default: '',
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
        colorClasses() {
            // Default color options mapped to Tailwind CSS classes
            const colorMap = {
                yellow: 'yellow-300',
                blue: 'blue-50',
                green: 'green-500',
                gray: 'gray-500',
                red: 'red-500',
                neutral: 'neutral-500',
            };
            return colorMap[this.color] || this.color; // Fall back to raw value if custom color is passed
        },
        variantClasses() {
            const baseColor = this.colorClasses;
            const hoverColor = this.hoverColor || `${baseColor.split('-')[0]}-600`; // Auto-generate hover color if not provided

            if (this.variant === 'outline') {
                return `border-2 border-${baseColor} text-${baseColor} hover:bg-${baseColor}/10`;
            } else if (this.variant === 'filled') {
                return `bg-${baseColor} text-white hover:bg-${hoverColor}`;
            }
            return '';
        },
    },
};
</script>
