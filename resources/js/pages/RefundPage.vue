<template>
    <section class="min-h-screen bg-background">
        <div class="container mx-auto py-20">
            <div class="flex flex-col gap-6">
                <div>
                    <h4 class="font-semibold">Request for Refund / Return</h4>
                </div>

                <form @submit.prevent="submitForm">
                    <!-- Item for Return Section -->
                    <div class="w-full bg-white rounded-md shadow-lg p-[35px]">
                        <h6 class="font-medium mb-4 ml-2.5">Item(s) for Return</h6>
                        <div class="flex mx-8 my-5">
                            <div class="flex items-start w-full space-x-6">
                                <img
                                    :src="'https://placehold.co/84x67'"
                                    class="ml-1 refund-image mt-4"
                                />
                                <div class="flex flex-col mt-5 ml-6">
                                    <p class="font-bold label-3">Apple iPhone 15 Pro Max</p>
                                    <p class="font-medium label-4 mt-2">Black Titanium, 256 GB</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center pt-4 w-2/3">
                                <p class="font-medium label-4 ml-20">₱70,990.00</p>
                                <div class="flex space-x-4">
                                    <p class="label-4 font-medium">Qty:1</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reason for Return -->
                    <div class="w-full bg-white rounded-md shadow-lg p-[32px] my-[35px]">
                        <h6 class="font-semibold mb-2 ml-2.5">Reason for Return</h6>

                        <DropDownInput
                            class="w-[650px] h-[42px] custom-shadow"
                            variant="refund"
                            :items="DropDownItems"
                            name="Reason"
                        >
                            <p>Reason</p>
                        </DropDownInput>

                        <h6 class="font-semibold mb-4 mt-8 ml-2.5">Details</h6>
                        <p class="label-1 font-medium ml-2.5 text-neutral-400">
                            Please provide as much detail as possible related to your problem or concern
                        </p>
                        <textarea
                            id="details"
                            placeholder="Details related to your problem or concern"
                            class="w-full h-[245px] rounded-[5px] border-neutral-100 p-2.5 text-neutral-900 label-1 font-medium mb-[5px] custom-shadow resize-none"
                        ></textarea>
                    </div>

                    <!-- Shipment Option & Refund Amount -->
                    <div class="flex gap-6 items-start">
                        <!-- Shipment Options -->
                        <div class="w-1/2 bg-white rounded-md shadow-lg flex-grow px-8 py-5">
                            <p class="label-2 font-medium mb-5">Select Return Shipment Option</p>
                            <label class="block mb-4 label-3 font-medium">
                                <input
                                    type="radio"
                                    name="shipment"
                                    value="hub"
                                />
                                Drop-off to a Delivery Hub
                            </label>
                            <label class="block label-3 font-medium">
                                <input
                                    type="radio"
                                    name="shipment"
                                    value="courier"
                                />
                                Courier Pick-up
                            </label>
                        </div>

                        <!-- Refund Amount -->
                        <div class="w-1/2 bg-white rounded-md shadow-lg flex-grow px-8 py-5">
                            <p class="label-2 font-medium mb-5">Refund Amount</p>
                            <div class="flex flex-col rounded space-y-2">
                                <div class="flex justify-between">
                                    <p class="label-4 font-medium">Refund Amount:</p>
                                    <p class="label-4 font-semibold">₱70,990.00</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="label-4 font-medium">Refunded to:</p>
                                    <p class="label-4 font-semibold">VISA</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="label-4 font-medium">E-mail:</p>
                                    <p class="label-4 font-semibold">example@email.com</p>
                                </div>
                            </div>
                            <hr class="my-5 border-neutral-300" />

                            <div class="flex justify-end items-baseline">
                                <p class="label-2 font-medium mr-2">
                                    Order Total <span class="label-5 font-medium">(Vat incl.):</span>
                                </p>
                                <p class="label-1 font-bold pl-8">₱71,199.00</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end mt-[35px]">
                        <custom-button
                            variant="filled"
                            size="md"
                            class="gap-[10px]"
                            roundness="true"
                            color="yellow"
                        >
                            <p class="label-4 font-semibold">Submit</p>
                        </custom-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue';
import DropDownInput from '../components/ui/DropDownInput.vue';

export default {
    name: 'RefundPage',
    data() {
        return {
            DropDownItems: [
                { text: 'Change of Mind', value: 1 },
                { text: 'Missing Part of the Order', value: 2 },
                { text: 'Seller sent wrong item (e.g. wrong size, model)', value: 3 },
                { text: 'Damaged item', value: 4 },
                { text: 'Product is defective', value: 5 },
                { text: 'Others (specify in the detail box)', value: 6 },
            ],
        };
    },
    methods: {},
    components: {
        'custom-button': Button,
        DropDownInput,
    },
};
</script>

<style scoped>
/* Add any necessary custom styles here */
.refund-image {
    width: 45px; /* Adjust size as needed */
    height: 45px; /* Adjust size as needed */
    object-fit: cover;
    background-color: #d1d5db; /* Fallback background color */
}
</style>
