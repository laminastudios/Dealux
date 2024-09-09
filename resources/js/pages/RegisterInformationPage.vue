<template>
  <div class="container">
    <div class="form-wrapper" style="width: 1096px; height: 517px; margin: 20px; border: 1px solid #A6A6A6; padding: 30px;">
      <h2 class="text-center">User Registration</h2>

      <!--  Step Indicator -->
      <div class="step-indicator flex justify-around my-4">
        <div :class="{'active-step': currentStep === 1}">
          <span class="step-circle">1</span>
          <span>Personal Information</span>
        </div>
        <div :class="{'active-step': currentStep === 2}">
          <span class="step-circle">2</span>
          <span>Address</span>
        </div>
        <div :class="{'active-step': currentStep === 3}">
          <span class="step-circle">3</span>
          <span>Payment Setup</span>
        </div>
      </div>

      <!-- Step 1: Personal Information -->
      <div v-if="currentStep === 1" class="form-step">
        <div class="grid grid-cols-3 gap-2">
          <Input label="First Name" v-model="firstName" />
          <Input label="Middle Name" v-model="midName" />
          <Input label="Last Name" v-model="lastName" />
        </div>
        <div class="grid grid-cols-3 gap-2 mt-4">
          <Input label="Gender" v-model="gender" />
          <DatePicker label="Date of Birth" v-model="birthDate" />
          <Input label="Phone Number" v-model="phoneNumber" />
        </div>
      </div>

      <!-- Step 2: Address -->
      <div v-if="currentStep === 2" class="form-step">
        <div class="grid grid-cols-3 gap-2">
          <Input label="House Number" v-model="houseNumber" />
          <Input label="Subdivision/Blk" v-model="subdivision" />
          <Input label="Street" v-model="street" />
          <Input label="Barangay" v-model="barangay" />
          <Input label="City" v-model="city" />
          <Input label="Region" v-model="region" />
        </div>
      </div>

      <!-- Step 3: Payment Setup -->
      <div v-if="currentStep === 3" class="form-step">
        <div class="grid grid-cols-3 gap-2">
          <Input label="Card Type" v-model="cardType" />
          <Input label="Name on Card" v-model="nameOnCard" />
          <Input label="Card Number" v-model="cardNumber" />
        </div>
        <div class="grid grid-cols-3 gap-2 mt-4">
          <DatePicker label="Expiry Date" v-model="expiryDate" />
          <Input label="CVV" v-model="cvv" />
        </div>
      </div>

      <!-- Navigation Buttons -->
      <div class="flex justify-end mt-6">
        <!-- Previous button -->
        <button v-if="currentStep > 1" @click="prevStep" class="btn btn-secondary">
          Previous
        </button>
        
        <!-- Next button -->
        <button v-if="currentStep < 3" @click="nextStep" class="btn btn-primary ml-2">
          Next
        </button>
        
        <!-- Submit button -->
        <button v-if="currentStep === 3" @click="submitForm" class="btn btn-success ml-2">
          Submit
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import Input from '../components/ui/Input.vue';
import DatePicker from '../components/ui/DatePicker.vue';
import Button from '../components/ui/Button.vue';
import axios from 'axios';

export default {
    name: 'RegisterInformationPage',
    components: {
    Input,
    DatePicker,
    Button,
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
        };
    },
    mounted() {
        this.fetchUserData();
    },
    methods: {
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
        // Move to next step
    nextStep() {
      if (this.currentStep < 3) {
        this.currentStep += 1;
      }
    },
    // Move to previous step
    prevStep() {
      if (this.currentStep > 1) {
        this.currentStep -= 1;
      }
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
