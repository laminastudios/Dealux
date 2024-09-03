<template>
    <button
        class="flex justify-center items-center px-[33px] py-[3px] transition-colors font-medium label-4 text-black rounded-[5px] cursor-pointer"
        :class="[sizeClasses, variantClass, colorClass]"
        @click="handleClick"
    >
        <slot></slot>
    </button>
</template>

<script>
export default {
    name: 'CustomButton',
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
        variantClass() {
            if (this.variant === 'outline') {
                return `bg-transparent border-2 border-[#FFA52E] text-[#FFA52E] hover:bg-[#FFA52E] hover:text-white`;
            } else {
                return ''; // No background for the filled variant in this class
            }
        },
        colorClass() {
            const colors = {
                yellow: 'bg-[#FFA52E] hover:bg-[#D17600]',
                'blue-50': 'bg-[#ECEEFB]',
                'blue-100': 'bg-[#C6CCF3] hover:bg-[#151F5F]',
                green: 'bg-[#2CD370] hover:bg-[#146033]',
                gray: 'bg-[#8C8C8C] hover:bg-[#595959]',
                neutral: 'bg-[#737373]',
            };
            return this.variant === 'filled' ? colors[this.color] || colors['neutral'] : '';
        },
    },
    methods: {
        handleClick() {
            this.$emit('click');
        },
    },
};
</script>

<style scoped>
/* Additional styles or Tailwind classes can be added here if needed */
</style>
