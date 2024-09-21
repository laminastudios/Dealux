<template>
    <div
        class="w-10 h-5 flex items-center bg-gray-500 rounded-full duration-300 cursor-pointer"
        :class="{ 'bg-[var(--Primary-Color-Primary-400,#2887F0)]': modelValue }"
        :aria-checked="modelValue.toString()"
        @click="handleClick"
    >
        <div
            class="bg-white w-4 h-4 rounded-full shadow-md transform duration-300"
            :class="{ 'translate-x-6': modelValue }"
        ></div>
    </div>
</template>

<script>
export default {
    props: {
        modelValue: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        handleClick() {
            this.$emit('update:modelValue', !this.modelValue);
        },
    },
};
</script>
