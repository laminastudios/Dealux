<template>
    <div class="bg-gray-100 min-h-screen font-mainfont">
        <!-- Main Content -->
        <div class="container mx-auto py-12">
            <!-- FAQ Section -->
            <section class="mb-12">
                <h2 class="text-3xl font-bold text-center mb-8">Frequently Asked Questions (FAQ)</h2>
                <div class="flex flex-col gap-5">
                    <!-- FAQ Item -->
                    <div class="flex flex-col bg-[#737373] rounded shadow border-b-2 border-gray-400">
                        <!-- Question Box -->
                        <div class="p-4">
                            <h3 class="flex items-center font-semibold text-lg text-[#FFF]">
                                <span class="mr-3 text-4xl">?</span>
                                <span class="text-base">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua?
                                </span>
                            </h3>
                        </div>
                        <!-- Answer Box -->
                        <div class="flex items-start bg-[#F2F2F2] p-4">
                            <img
                                src="/reply.png"
                                alt="reply"
                                class="w-8 h-8 mr-4"
                            />
                            <p class="text-[#000000] text-sm">
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>

                    <!-- Repeat for other FAQ items -->
                    <div class="flex flex-col bg-[#737373] rounded shadow border-b-2 border-gray-400">
                        <!-- Question Box -->
                        <div class="p-4">
                            <h3 class="flex items-center font-semibold text-lg text-[#FFF]">
                                <span class="mr-3 text-4xl">?</span>
                                <span class="text-base">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua?
                                </span>
                            </h3>
                        </div>
                        <!-- Answer Box -->
                        <div class="flex items-start bg-[#F2F2F2] p-4">
                            <img
                                src="/reply.png"
                                alt="reply"
                                class="w-8 h-8 mr-4"
                            />
                            <p class="text-[#000000] text-sm">
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>

                    <!-- Additional FAQ Items -->
                    <div class="flex flex-col bg-[#737373] rounded shadow border-b-2 border-gray-400">
                        <!-- Question Box -->
                        <div class="p-4">
                            <h3 class="flex items-center font-semibold text-lg text-[#FFF]">
                                <span class="mr-3 text-4xl">?</span>
                                <span class="text-base">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua?
                                </span>
                            </h3>
                        </div>
                        <!-- Answer Box -->
                        <div class="flex items-start bg-[#F2F2F2] p-4">
                            <img
                                src="/reply.png"
                                alt="reply"
                                class="w-8 h-8 mr-4"
                            />
                            <p class="text-[#000000] text-sm">
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col bg-[#737373] rounded shadow border-b-2 border-gray-400">
                        <!-- Question Box -->
                        <div class="p-4">
                            <h3 class="flex items-center font-semibold text-lg text-[#FFF]">
                                <span class="mr-3 text-4xl">?</span>
                                <span class="text-base">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua?
                                </span>
                            </h3>
                        </div>
                        <!-- Answer Box -->
                        <div class="flex items-start bg-[#F2F2F2] p-4">
                            <img
                                src="/reply.png"
                                alt="reply"
                                class="w-8 h-8 mr-4"
                            />
                            <p class="text-[#000000] text-sm">
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Report a Problem Form -->
            <section>
                <h2 class="text-3xl font-bold text-center mb-8">Report a Problem</h2>
                <form
                    @submit.prevent="submitForm"
                    class="bg-white p-8 rounded shadow-md max-w-4xl mx-auto"
                >
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label
                                class="block font-semibold mb-2"
                                for="firstName"
                                >First Name</label
                            >
                            <input
                                v-model="form.firstName"
                                id="firstName"
                                type="text"
                                placeholder="First Name"
                                class="w-full border border-gray-300 rounded p-3 text-gray-500 text-sm font-sans"
                            />
                        </div>
                        <div>
                            <label
                                class="block font-semibold mb-2"
                                for="lastName"
                                >Last Name</label
                            >
                            <input
                                v-model="form.lastName"
                                id="lastName"
                                type="text"
                                placeholder="Last Name"
                                class="w-full border border-gray-300 rounded p-3 text-gray-500 text-sm font-sans"
                            />
                        </div>
                    </div>
                    <div class="mb-6">
                        <label
                            class="block font-semibold mb-2"
                            for="email"
                            >E-mail Address</label
                        >
                        <input
                            v-model="form.email"
                            id="email"
                            type="email"
                            placeholder="E-mail Address"
                            class="w-full border border-gray-300 rounded p-3 text-gray-500 text-sm font-sans"
                        />
                    </div>
                    <div class="mb-6">
                        <label
                            class="block font-semibold mb-2"
                            for="summary"
                        >
                            Summary
                        </label>
                        <span class="block mb-2 text-gray-500 text-sm font-sans">
                            Please provide a one-sentence summary of your problem or concern
                        </span>
                        <input
                            v-model="form.summary"
                            id="summary"
                            type="text"
                            placeholder="Summary"
                            class="w-full border border-gray-300 rounded p-3 text-gray-500 text-sm font-sans"
                        />
                    </div>

                    <div class="mb-6">
                        <label
                            class="block font-semibold mb-2"
                            for="details"
                        >
                            Details
                        </label>
                        <span class="block mb-2 text-gray-500 text-sm font-sans">
                            Please provide as much detail as possible related to your problem or concern
                        </span>
                        <textarea
                            v-model="form.details"
                            id="details"
                            placeholder="Details related to your problem or concern"
                            class="w-full border border-gray-300 rounded p-3 text-gray-500 text-sm font-sans"
                        ></textarea>
                    </div>
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <custom-button
                            variant="filled"
                            size="md"
                            color="neutral-500"
                            hoverColor="neutral-100"
                            type="submit"
                            :style="{ borderRadius: '0.3125rem' }"
                        >
                            Submit
                        </custom-button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import CustomButton from '@/components/ui/Button.vue';
export default {
    components: {
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
        };
    },

    methods: {
        async submitForm() {
            await this.sendEmail();
        },
        async sendEmail() {
            try {
                await axios.post('api/post/support', this.form);
                alert('Your message has been sent!');
                this.form.firstName = ''; // Update these fields according to your form fields
                this.form.lastName = '';
                this.form.email = '';
                this.form.summary = '';
                this.form.details = '';
            } catch (error) {
                console.error('Error sending message:', error);
                alert('There was an error sending your message. Please try again.');
            }
        },
    },
};
</script>
<style scoped>
/* No additional CSS needed with Tailwind */
</style>
