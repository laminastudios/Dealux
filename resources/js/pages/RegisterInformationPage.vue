<template>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
            <h1 class="text-2xl font-bold text-center mb-6">Register Information</h1>
            <h2 class="text-xl font-semibold text-gray-600 bg-gray-100 p-4 border border-gray-200 rounded-lg shadow-sm mb-6">
                The actual page is not yet started to develop. The page here is just a tester for the user information registration logic
            </h2>    
            <form @submit.prevent="submitForm">
                <!-- User Information -->
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

                <!-- Payment Information -->
                <div class="mb-4">
                    <label class="block text-gray-700">Delivery Address</label>
                    <input
                        v-model="deliveryAddress"
                        type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Delivery Address"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Card Type</label>
                    <select
                        v-model="cardType"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    >
                        <option value="cc">Credit Card</option>
                        <option value="dc">Debit Card</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Name on Card</label>
                    <input
                        v-model="nameOnCard"
                        type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Name on Card"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Card Number</label>
                    <input
                        v-model="cardNumber"
                        type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="Card Number"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Expiry Date</label>
                    <input
                        v-model="expiryDate"
                        type="date"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                    />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">CVV</label>
                    <input
                        v-model="cvv"
                        type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md"
                        placeholder="CVV"
                    />
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
            deliveryAddress: '',
            cardType: 'cc', // Default to credit card
            nameOnCard: '',
            cardNumber: '',
            expiryDate: '',
            cvv: '',
        };
    },
    mounted() {
        this.fetchUserData();
    },
    methods: {
        fetchUserData() {
            axios.get('/user')
                .then(response => {
                    this.userId = response.data.user.user_id; // Set userId from API response
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
                delivery_address: this.deliveryAddress,
                card_type: this.cardType,
                name_on_card: this.nameOnCard,
                card_number: this.cardNumber,
                expiry_date: this.expiryDate,
                cvv: this.cvv,
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
