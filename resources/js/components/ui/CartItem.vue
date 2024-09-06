<template>
    <div class="flex gap-5 py-6 px-4 bg-white">
        <input
            type="checkbox"
            :checked="selectedItems.has(itemId)"
            @change="
                $emit('selectStoreItem', { $event, itemId });
                $emit('handleSelectItemEmit', { isChecked: $event.target.checked, itemId });
            "
            class="checked:bg-primary-500 bg-white border border-primary-500 rounded w-6 h-6"
        />

        <img
            :src="image"
            :alt="`Photo of ${itemName}`"
            class="object-cover"
        />

        <div class="flex flex-wrap gap-5 justify-between w-full text-neutral-700">
            <div class="flex md:flex-1 flex-wrap gap-5 justify-between">
                <div class="flex flex-col gap-6 w-full">
                    <div class="font-extrabold leading-4">
                        {{ itemName }}
                    </div>
                    <div class="font-medium leading-4">
                        {{ details }}
                    </div>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-12">
                <div class="font-medium leading-4 sm:flex-1">₱{{ price }}</div>
                <InputSpinner :quantity="2" />
            </div>
        </div>
    </div>
</template>

<script>
import InputSpinner from './InputSpinner.vue';

export default {
    name: 'CartItem',
    props: {
        image: String,
        itemId: Number,
        itemName: String,
        details: String,
        price: Number,
        quantity: Number,
        isItemSelected: Boolean,
        selectedItems: Set,
    },
    components: {
        InputSpinner,
    },
};
</script>
