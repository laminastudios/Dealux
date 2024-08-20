<template>
    <div class="max-w-lg mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Welcome to our Support Page!</h1>
        <h2 class="text-xl font-semibold text-gray-600 bg-gray-100 p-4 border border-gray-200 rounded-lg shadow-sm mb-6">
            The actual page is not yet started to develop. The page here is just a tester for the email logic
        </h2>        <form @submit.prevent="sendEmail" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input v-model="form.name" type="text" id="name" required class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input v-model="form.email" type="email" id="email" required class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message:</label>
                <textarea v-model="form.message" id="message" rows="4" required class="mt-1 p-2 w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Send</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "SupportPage",
    data() {
        return {
            form: {
                name: '',
                email: '',
                message: ''
            }
        };
    },
    methods: {
        async sendEmail() {
            try {
                await axios.post('/account/support', this.form);
                alert('Your message has been sent!');
                this.form.name = '';
                this.form.email = '';
                this.form.message = '';
            } catch (error) {
                console.error('Error sending message:', error);
                alert('There was an error sending your message. Please try again.');
            }
        } 
    }
};
</script>

<style scoped>
/* No additional CSS needed with Tailwind */
</style>
