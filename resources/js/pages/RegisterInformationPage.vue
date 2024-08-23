<template>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center mb-6">Register Information</h1>
            <h2 class="text-xl font-semibold text-gray-600 bg-gray-100 p-4 border border-gray-200 rounded-lg shadow-sm mb-6">
                The actual page is not yet started to develop. The page here is just a tester for the user information registration logic
            </h2>    
            <form @submit.prevent="submitForm">
                <div class="mb-4">
                    <label class="block text-gray-700">First Name</label>
                    <input
                        v-model="firstName"
                        type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="First Name"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Middle Name</label>
                    <input
                        v-model="midName"
                        type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Middle Name"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Last Name</label>
                    <input
                        v-model="lastName"
                        type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Last Name"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Gender</label>
                    <select
                        v-model="gender"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    >
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="P">Prefer not to say</option>
                        <option value="O">Other</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Birth Date</label>
                    <input
                        v-model="birthDate"
                        type="date"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Phone Number</label>
                    <input
                        v-model="phoneNumber"
                        type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Phone Number"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Subscription Status</label>
                    <select
                        v-model="subsStatus"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    >
                        <option value="B">Basic</option>
                        <option value="P">Premium</option>
                    </select>
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "RegisterInformationPage",
    data() {
        return {
            firstName: '',
            midName: '',
            lastName: '',
            gender: 'M',
            birthDate: '',
            phoneNumber: '',
            subsStatus: 'B',
            userId: '', // Initialize userId
        };
    },
    mounted() {
        this.fetchUserData();
    },
    methods: {
        fetchUserData() {
            axios.get('/user')
                .then(response => {
                    this.userId = response.data.username.user_id; // Set userId from API response
                })
                .catch(error => {
                    console.error('Error fetching user data:', error);
                });
        },
        submitForm() {
            const formData = {
                user_id: this.userId, 
                first_name: this.firstName,
                mid_name: this.midName,
                last_name: this.lastName,
                gender: this.gender,
                birth_date: this.birthDate,
                phone_number: this.phoneNumber,
                subs_status: this.subsStatus,
            };
            // Make an API request to post the form data
            axios.post('/api/register-info', formData)
                .then(response => {
                    console.log('Form submitted successfully:', response.data);
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });
        },
    },
};
</script>

<style scoped>
/* Add additional styles here */
</style>
