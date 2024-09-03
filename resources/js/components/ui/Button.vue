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
            default: 'neutral',
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
            const colorMap = {
                yellow: 'yellow-300',
                blue: 'blue-50',
                green: 'green-500',
                gray: 'gray-500',
                red: 'red-500',
                neutral: 'neutral-500',
            };
            return colorMap[this.color] || this.color;
        },
        hoverClasses() {
            const hoverMap = {
                yellow: 'hover:bg-yellow-600',
                blue: '', // No hover color for blue-50
                green: 'hover:bg-green-800',
                gray: 'hover:bg-gray-800',
                red: 'hover:bg-red-800',
                neutral: '', // No hover color for neutral
            };
            return hoverMap[this.color] || '';
        },
        variantClasses() {
            const baseColor = this.colorClasses;
            const hoverColor = this.hoverClasses;

            if (this.variant === 'outline') {
                if (this.color === 'yellow') {
                    return `border-2 border-yellow-400 text-yellow-400 hover:bg-yellow-400`;
                } else if (this.color === 'neutral') {
                    return `border-2 border-neutral-500 text-neutral-500`;
                }
                return `border-2 border-${baseColor} text-${baseColor} hover:bg-${baseColor}/10`;
            } else if (this.variant === 'filled') {
                return `bg-${baseColor} text-white ${hoverColor}`;
            }
            return '';
        },
    },
};
</script>
