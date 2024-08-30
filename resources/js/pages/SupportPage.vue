<template>
    <!-- FAQ Section -->
    <section class="container mx-auto mb-12 pb-12 mt-[80px]">
        <h2 class="font-semibold text-center mb-[20px]">Frequently Asked Questions (FAQ)</h2>
        <div class="flex flex-col gap-5">
            <!-- FAQ Item -->

            <!-- Repeat for other FAQ items -->
            <div class="flex flex-col bg-neutral-500 rounded shadow border-b-2 border-neutral-400 mb-[20px]">
                <!-- Question Box -->
                <div class="p-4">
                    <p class="flex items-center font-regular text-white">
                        <span class="mr-3 text-4xl">?</span>
                        <span class="text-base">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua?
                        </span>
                    </p>
                </div>
                <!-- Answer Box -->
                <div class="flex items-start bg-neutral-50 p-4">
                    <img
                        src="/assets/reply.png"
                        alt="reply"
                        class="w-8 h-8 mr-4"
                    />
                    <p class="text-black">
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-col bg-neutral-500 rounded shadow border-b-2 border-neutral-400 mb-[20px]">
            <!-- Question Box -->
            <div class="p-4">
                <p class="flex items-center font-regular text-white">
                    <span class="mr-3 text-4xl">?</span>
                    <span class="text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua?
                    </span>
                </p>
            </div>
            <!-- Answer Box -->
            <div class="flex items-start bg-neutral-50 p-4">
                <img
                    src="/assets/reply.png"
                    alt="reply"
                    class="w-8 h-8 mr-4"
                />
                <p class="text-black">
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
            </div>
        </div>

        <div class="flex flex-col bg-neutral-500 rounded shadow border-b-2 border-neutral-400 mb-[20px]">
            <!-- Question Box -->
            <div class="p-4">
                <p class="flex items-center font-regular text-white">
                    <span class="mr-3 text-4xl">?</span>
                    <span class="text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua?
                    </span>
                </p>
            </div>
            <!-- Answer Box -->
            <div class="flex items-start bg-neutral-50 p-4">
                <img
                    src="/assets/reply.png"
                    alt="reply"
                    class="w-8 h-8 mr-4"
                />
                <p class="text-black">
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
            </div>
        </div>

        <div class="flex flex-col bg-neutral-500 rounded shadow border-b-2 border-neutral-400">
            <!-- Question Box -->
            <div class="p-4">
                <p class="flex items-center font-regular text-white">
                    <span class="mr-3 text-4xl">?</span>
                    <span class="text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua?
                    </span>
                </p>
            </div>
            <!-- Answer Box -->
            <div class="flex items-start bg-neutral-50 p-4">
                <img
                    src="/assets/reply.png"
                    alt="reply"
                    class="w-8 h-8 mr-4"
                />
                <p class="text-black">
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
            </div>
        </div>
    </section>

    <!-- Report a Problem Form -->
    <section class="container mx-auto mb-[100px]">
        <h2 class="font-semibold text-center mb-8">Report a Problem</h2>
        <form
            @submit.prevent="submitForm"
            class="bg-white p-8 rounded shadow-md mx-auto"
        >
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label
                        class="block font-bold mb-2"
                        for="firstName"
                        >First Name</label
                    >
                    <input
                        v-model="form.firstName"
                        id="firstName"
                        type="text"
                        placeholder="First Name"
                        class="w-full border border-neutral-100 rounded p-3 text-neutral-500 label-3"
                    />
                </div>
                <div>
                    <label
                        class="block font-bold mb-2"
                        for="lastName"
                        >Last Name</label
                    >
                    <input
                        v-model="form.lastName"
                        id="lastName"
                        type="text"
                        placeholder="Last Name"
                        class="w-full border border-neutral-100 rounded p-3 text-neutral-500 label-3"
                    />
                </div>
            </div>
            <div class="mb-6">
                <label
                    class="block font-bold mb-2"
                    for="email"
                    >E-mail Address</label
                >
                <input
                    v-model="form.email"
                    id="email"
                    type="email"
                    placeholder="E-mail Address"
                    class="w-full border border-neutral-100 rounded p-3 text-neutral-500 label-3"
                />
            </div>
            <div class="mb-6">
                <label
                    class="block font-bold mb-2"
                    for="summary"
                >
                    Summary
                </label>
                <span class="block mb-2 text-neutral-500 label-3">
                    Please provide a one-sentence summary of your problem or concern
                </span>
                <input
                    v-model="form.summary"
                    id="summary"
                    type="text"
                    placeholder="Summary"
                    class="w-full border border-neutral-100 rounded p-3 text-neutral-500 label-3"
                />
            </div>

            <div class="mb-6">
                <label
                    class="block font-bold mb-2"
                    for="details"
                >
                    Details
                </label>
                <span class="block mb-2 text-neutral-500 label-3">
                    Please provide as much detail as possible related to your problem or concern
                </span>
                <textarea
                    v-model="form.details"
                    id="details"
                    placeholder="Details related to your problem or concern"
                    class="w-full border border-neutral-100 rounded p-3 text-neutral-500 label-3"
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
