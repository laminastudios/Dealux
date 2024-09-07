<template>
    <div class="col-span-12 bg-white p-6 border border shadow mb-[30px] w-[1216px] h-auto">
        <h6 class="font-semibold text-black mt-[30px] mb-[40px] bg-neutral-50 w-[1156px] h-[56px] text-left pl-3 pt-4">
            Product Specifications
        </h6>
        <table class="w-full text-left border-collapse mt-4">
            <tbody>
                <tr
                    v-for="(spec, index) in formattedSpecifications"
                    :key="index"
                >
                    <td class="py-3 px-6 label-2 font-medium text-neutral-400">{{ spec.label1 }}</td>
                    <td class="py-3 px-6 label-2 font-medium text-black">{{ spec.value1 }}</td>
                    <td class="py-3 px-6 label-2 font-medium text-neutral-400">{{ spec.label2 }}</td>
                    <td class="py-3 px-6 label-2 font-medium text-black">{{ spec.value2 }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'ProductSpecifications',
    props: {
        specifications: {
            type: Array,
            required: true,
        },
    },
    computed: {
        formattedSpecifications() {
            // Format specifications into pairs of columns
            let formatted = [];
            for (let i = 0; i < this.specifications.length; i += 2) {
                formatted.push({
                    label1: this.specifications[i]?.label || '',
                    value1: this.specifications[i]?.value || '',
                    label2: this.specifications[i + 1]?.label || '',
                    value2: this.specifications[i + 1]?.value || '',
                });
            }
            return formatted;
        },
    },
};
</script>
