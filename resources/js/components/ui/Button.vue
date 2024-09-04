<template>
    <button
        class="flex justify-center items-center px-[33px] py-[3px] transition-colors font-semibold label-4 rounded-[5px] cursor-pointer"
        :class="[sizeClasses, variantClass, colorClass, borderRadius]"
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
        roundness: {
            type: Boolean,
            default: true,
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
                yellow: 'bg-[#FFA52E] hover:bg-[#D17600] text-white',
                'blue-50': 'bg-[#ECEEFB] text-black',
                'blue-100': 'bg-[#C6CCF3] hover:bg-[#151F5F] text-black',
                green: 'bg-[#C5F3D8] hover:bg-[#09431F] text-black hover:text-[#FFFFFF]',
                gray: 'bg-[#8C8C8C] hover:bg-[#595959] text-white',
                neutral: 'bg-[#737373]',
            };
            return this.variant === 'filled' ? colors[this.color] || colors['neutral'] : '';
        },
        borderRadius() {
            return this.roundness ? 'rounded-[5px]' : 'rounded-none';
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
