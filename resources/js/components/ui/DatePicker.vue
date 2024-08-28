<!-- EXAMPLE USAGE -->

<!-- <DatePicker id="landing-datepicker" placeholder="Pick a date" /> -->

<template>
    <div
        class="relative max-w-sm w-[354px] h-[48px] flex items-center p-[13px_24px] bg-neutral-50 border border-neutral-50 focus-within:border-neutral-600"
    >
        <label
            :for="id"
            class="sr-only"
            >Date Picker</label
        >
        <input
            datepicker
            type="text"
            aria-label="Select date"
            :id="id"
            :placeholder="placeholder"
            class="p-0 bg-transparent text-neutral-400 label-3 font-medium w-full border-none focus:outline-none focus:ring-0"
        />
        <i class="bx bxs-calendar text-neutral-400 dark:text-neutral-400 text-lg"></i>
    </div>
</template>

<script>
export default {
    name: 'DatePicker',
    props: {
        placeholder: {
            type: String,
            default: 'Select date', // Default placeholder
        },
        id: {
            type: String,
            default: 'datepicker', // Default id
        },
    },
};
</script>
