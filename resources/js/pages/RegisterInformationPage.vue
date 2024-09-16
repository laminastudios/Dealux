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
      <div v-if="currentStep === 1" class="grid grid-cols-3 gap-4 mb-10">
          <FloatingLabelInput v-model="firstName" :id="firstName" type="text" label="First Name" class="w-full"/>
          <FloatingLabelInput v-model="midName" :id="midName" type="text" label="Middle Name" class="w-full"/>
          <FloatingLabelInput v-model="lastName" :id="lastName" type="text" label="Last Name" class="w-full"/>
          <DropDownInput v-model="gender" :name="gender" label="Gender":items="genderOptions" variant="variant2" @change="handleGenderChange"  class="w-full"/>
          <DatePicker v-model="birthDate" :id="birthDate" type="text" aria-label="Select date"  :placeholder="birthDate" class="w-full"/>
          <FloatingLabelInput v-model="phoneNumber" :id="phoneNumber" type="text" label="Phone Number" class="w-full"/>
      </div>

      <!-- Form Step 2: Address -->
      <div v-if="currentStep === 2" class="grid grid-cols-3 gap-5 mb-10">
          <FloatingLabelInput v-model="houseNumber" :id="houseNumber" type="text" label="House Number" class="w-full"/>
          <FloatingLabelInput v-model="subdivision" :id="subdivision" type="text" label="Subdivision" class="w-full"/>
          <FloatingLabelInput v-model="street" :id="street" type="text" label="Street" class="w-full"/>
          <FloatingLabelInput v-model="barangay" :id="barangay" type="text" label="Barangay" class="w-full"/>
          <FloatingLabelInput v-model="city" :id="city" type="text" label="City" class="w-full"/>
          <FloatingLabelInput v-model="region" :id="region" type="text" label="Region" class="w-full"/>
      </div>

      <!-- Form Step 3: Payment Setup -->
      <div v-if="currentStep === 3" class="grid grid-cols-3 gap-5 mb-10">
          <FloatingLabelInput v-model="cardNumber" :id="cardNumber" type="text" label="Card Number" class="w-full"/>
          <FloatingLabelInput v-model="expiryDate" :id="expiryDate" type="text" label="Expiry Date" class="w-full"/>
          <DropDownInput v-model="cardType" :name="cardType" label="Card Type" :items="cardOptions" variant="variant2" @change="handleCardTypeChange" class="w-full"/>
          <FloatingLabelInput v-model="cvv" :id="cvv" type="text" label="CVV" class="w-full"/>
          <FloatingLabelInput v-model="nameOnCard" :id="nameOnCard" type="text" label="Name on Card" class="w-full"/>
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
import DropDownInput from '../components/ui/DropDownInput.vue'
import FloatingLabelInput from '../components/ui/Input.vue';
import Button from '../components/ui/Button.vue';
import DatePicker from '../components/ui/DatePicker.vue';
import axios from 'axios';

export default {
    name: 'RegisterInformationPage',
    components: {
    FloatingLabelInput,
    DatePicker,
    Button,
    DropDownInput
  },

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
             
            genderOptions: [
        { text: 'Male', value: 'male' },
        { text: 'Female', value: 'female' },
        { text: 'Other', value: 'other' },
        { text: 'Prefer not to say', value: 'prefer_not_to_say' },
      ],
            cardOptions: [
        { value: 'cc', text: 'Credit Card' },
        { value: 'dc', text: 'Debit Card' }
      ],
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
