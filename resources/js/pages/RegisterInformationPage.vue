<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-[1096px]">
      <!-- User Registration Heading -->
      <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-blue-600">User Registration</h1>
      </div>

      <!-- Step Indicators -->
      <div class="flex items-center justify-between mb-8">
      <div class="flex-1 text-center">
      <div :class="['step-circle w-12 h-12 rounded-full flex items-center justify-center font-semibold text-lg mx-auto', 
       currentStep === 1 ? 'bg-[#fba42c] text-white' : 'bg-gray-300 text-gray-500']">
       1
      </div>
      <p class="mt-2 text-lg font-semibold">Personal Information</p>
      </div>
      <!-- Line after Step 1 -->
      <div :class="['flex-grow h-px mx-4', 
       currentStep >= 2 ? 'bg-[#fba42c]' : 'bg-gray-300']"></div>
      <div class="flex-1 text-center">
      <div :class="['step-circle w-12 h-12 rounded-full flex items-center justify-center font-semibold text-lg mx-auto', 
       currentStep === 2 ? 'bg-[#fba42c] text-white' : 'bg-gray-300 text-gray-500']">
       2
      </div>
      <p class="mt-2 text-lg font-semibold">Address</p>
      </div>
      <!-- Line after Step 2 -->
      <div :class="['flex-grow h-px mx-4', 
       currentStep === 3 ? 'bg-[#fba42c]' : 'bg-gray-300']"></div>
      <div class="flex-1 text-center">
      <div :class="['step-circle w-12 h-12 rounded-full flex items-center justify-center font-semibold text-lg mx-auto', 
       currentStep === 3 ? 'bg-[#fba42c] text-white' : 'bg-gray-300 text-gray-500']">
       3
      </div>
      <p class="mt-2 text-lg font-semibold">Payment Setup</p>
      </div>
      </div>


      <!-- Form Step 1: Personal Information -->
      <div v-if="currentStep === 1" class="grid grid-cols-3 gap-5 mb-10">
        <div class="flex flex-col">
          <Input v-model="firstName" type="text" placeholder="First Name" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer"/>
        </div>
        <div class="flex flex-col">
          <Input v-model="midName" type="text" placeholder="Middle Name" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer"/>
        </div>
        <div class="flex flex-col">
          <Input v-model="lastName" type="text" placeholder="Last Name" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer"/>
        </div>
        <div class="flex flex-col">
          <select v-model="gender" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
            <option disabled value="">Gender</option>
            <option>Male</option>
            <option>Female</option>
          </select>
        </div>
        <div class="flex flex-col">
          <input v-model="birthDate" type="date" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
        <div class="flex flex-col">
          <input v-model="phoneNumber" type="text" placeholder="Phone Number" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
      </div>

      <!-- Form Step 2: Address -->
      <div v-if="currentStep === 2" class="grid grid-cols-3 gap-5 mb-10">
        <div class="flex flex-col">
          <input v-model="houseNumber" type="text" placeholder="House Number" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
        <div class="flex flex-col">
          <input v-model="subdivision" type="text" placeholder="Subdivision" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
        <div class="flex flex-col">
          <input v-model="street" type="text" placeholder="Street" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
        <div class="flex flex-col">
          <input v-model="barangay" type="text" placeholder="Barangay" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
        <div class="flex flex-col">
          <input v-model="city" type="text" placeholder="City" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
        <div class="flex flex-col">
          <input v-model="region" type="text" placeholder="Region" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
      </div>

      <!-- Form Step 3: Payment Setup -->
      <div v-if="currentStep === 3" class="grid grid-cols-3 gap-5 mb-10">
        <div class="relative flex flex-col">
      <select v-model="cardType" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
         <option value="" disabled>Select Card Type</option>
         <option value="cc">Credit Card</option>
         <option value="dc">Debit Card</option>
         </select>
        </div>
        <div class="flex flex-col">
          <input v-model="cardNumber" type="text" placeholder="Credit Card Number" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
        <div class="flex flex-col">
          <input v-model="expiryDate" type="text" placeholder="Expiry Date" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
        <div class="flex flex-col">
          <input v-model="cvv" type="text" placeholder="CVV" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
        <div class="flex flex-col">
          <input v-model="nameOnCard" type="text" placeholder="Name on Card" class="h-[48px] block px-[24px] py-[13px] shadow-lg font-medium label-3 text-neutral-700 bg-neutral-50 border-0 border-b-2 border-neutral-50 appearance-none focus:outline-none focus:ring-0 focus:border-b-2 focus:border-neutral-600 peer">
        </div>
      </div>

      <!-- Next/Previous Buttons -->
      <div class="flex justify-end gap-2 mt-20">
        <button v-if="currentStep > 1" @click="prevStep" class="px-[33px] py-[15px] bg-[#fba42c] text-white hover:bg-orange-600 transition duration-300 font-semibold label-4 rounded-[5px] cursor-pointer">
          Back
        </button>
        <div class="flex gap-1 ml-2">
          <button v-if="currentStep < 3" @click="nextStep" class="px-[33px] py-[15px] bg-[#fba42c] text-white hover:bg-orange-600 transition duration-300 font-semibold label-4 rounded-[5px] cursor-pointer">
            Next
          </button>
          <button v-if="currentStep === 3" @click="submitForm" class="px-[33px] py-[15px] bg-[#fba42c] text-white hover:bg-orange-600 transition duration-300 font-semibold label-4 rounded-[5px] cursor-pointer">
            Submit
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'RegisterInformationPage',
    data() {
        return {
            currentStep: 1,
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
        nextStep() {
      if (this.currentStep < 3) this.currentStep++;
    },
    prevStep() {
      if (this.currentStep > 1) this.currentStep--;
    },
        fetchUserData() {
            axios
                .get('/user')
                .then((response) => {
                    this.userId = response.data.user.user_id; // Set userId from API response
                })
                .catch((error) => {
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
            axios
                .post('/api/post/register/info', formData)
                .then((response) => {
                    console.log('Form submitted successfully:', response.data);
                })
                .catch((error) => {
                    console.error('Error submitting form:', error);
                });
        },
    },
};
</script>

<style scoped>
/* Add additional styles here */
</style>
