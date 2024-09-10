<template>
    <section class="relative bg-background h-[1600px] overflow-hidden">
        <!-- FAQ Section -->
        <section class="container mx-auto mb-[20px] pb-12 mt-[100px]">
            <h1 class="font-semibold text-center text-yellow-400 mb-[20px]">Frequently Asked Questions (FAQs)</h1>
            <FAQAccordion :items="faqItems" />
        </section>

        <!-- Report a Problem Form -->
        <section class="container mx-auto mb-[100px] mt-10">
            <h1 class="font-semibold text-center text-yellow-400 mb-8">Report a Problem</h1>
            <form @submit.prevent="submitForm">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <h6
                            class="text-black font-semibold mb-2"
                            for="firstName"
                        >
                            First Name
                        </h6>
                        <input
                            v-model="form.firstName"
                            id="firstName"
                            type="text"
                            placeholder="First Name"
                            class="w-full bg-white rounded-[5px] border-neutral-100 p-3 text-neutral-900 label-1 font-medium custom-shadow"
                        />
                    </div>
                    <div>
                        <h6
                            class="text-black font-semibold mb-2"
                            for="lastName"
                        >
                            Last Name
                        </h6>
                        <input
                            v-model="form.lastName"
                            id="lastName"
                            type="text"
                            placeholder="Last Name"
                            class="w-full bg-white rounded-[5px] border-neutral-100 p-3 text-neutral-900 label-1 font-medium mb-[30px] custom-shadow"
                        />
                    </div>
                </div>
                <div class="mb-6">
                    <h6
                        class="text-black font-semibold mb-2"
                        for="email"
                    >
                        E-mail Address
                    </h6>
                    <input
                        v-model="form.email"
                        id="email"
                        type="email"
                        placeholder="E-mail Address"
                        class="w-full bg-white rounded-[5px] border-neutral-100 p-3 text-neutral-900 label-1 font-medium mb-[30px] custom-shadow"
                    />
                </div>
                <div class="mb-6">
                    <h6
                        class="text-black font-semibold mb-2"
                        for="summary"
                    >
                        Summary
                    </h6>
                    <span class="block mb-2 text-neutral-400 label-1 font-medium">
                        Please provide a one-sentence summary of your problem or concern
                    </span>
                    <input
                        v-model="form.summary"
                        id="summary"
                        type="text"
                        placeholder="Summary"
                        class="w-full bg-white rounded-[5px] border-neutral-100 p-3 text-neutral-900 label-1 font-medium mb-[30px] custom-shadow"
                    />
                </div>

                <div class="mb-6">
                    <h6
                        class="text-black font-semibold mb-2"
                        for="details"
                    >
                        Details
                    </h6>
                    <span class="block mb-2 text-neutral-400 label-1 font-medium">
                        Please provide as much detail as possible related to your problem or concern
                    </span>
                    <textarea
                        v-model="form.details"
                        id="details"
                        placeholder="Details related to your problem or concern"
                        class="w-full h-[245px] bg-white rounded-[5px] border-neutral-100 p-3 text-neutral-900 label-1 font-medium mb-[5px] custom-shadow"
                    ></textarea>
                </div>
                <!-- Submit Button -->
                <div class="flex justify-end">
                    <custom-button
                        variant="filled"
                        size="md"
                        color="yellow"
                        roundness="true"
                        height="44px"
                        padding="3px 33px"
                        gap="10px"
                        textStyle="text-semibold label-4"
                        type="submit"
                    >
                        Submit
                    </custom-button>
                </div>
            </form>
        </section>
    </section>
</template>

<script>
import axios from 'axios';
import FAQAccordion from '../components/ui/FAQAccordion.vue'; // Import the FAQAccordion component
import CustomButton from '../components/ui/Button.vue';
import { useToast } from 'vue-toastification';

export default {
    components: {
        FAQAccordion,
        CustomButton,
    },
    data() {
        return {
            form: {
                firstName: '',
                lastName: '',
                email: '',
                summary: '',
                details: '',
            },
            faqItems: [
                {
                    question:
                        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?',
                    answer: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                },

                {
                    question:
                        'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?',
                    answer: 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                },

                // Add more FAQ items here
            ],
        };
    },
    setup() {
        // Get toast interface
        const toast = useToast();
        return {
            toast,
        };
    },
    methods: {
        async submitForm() {
            await this.sendEmail();
        },
        async sendEmail() {
            try {
                await axios.post('api/post/support', this.form);
                this.toast.success('Report sent successfully');
                this.form.firstName = ''; // Update these fields according to your form fields
                this.form.lastName = '';
                this.form.email = '';
                this.form.summary = '';
                this.form.details = '';
            } catch (error) {
                console.error('Error sending message:', error);
                this.toast.error('Report Sent Failed. Try Again Another Time');
            }
        },
    },
};
</script>

<style scoped>
/* No additional CSS needed with Tailwind */
</style>
