<template>
  <div class="container" style="border: 1px solid var(--Primary-Color-Neutral-300, #A6A6A6);">
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
      <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl mx-auto">
        
        <!-- Multi-step Form -->
        <div v-if="currentStep === 1">
          <!-- Step 1: Personal Information -->
          <h2>Personal Information</h2>
          <div class="grid grid-cols-3 gap-4">
            <div>
              <Input label="First Name" v-model="firstName" />
            </div>
            <div>
              <Input label="Middle Name" v-model="midName" />
            </div>
            <div>
              <Input label="Last Name" v-model="lastName" />
            </div>
            <div>
              <Input label="Gender" v-model="gender" />
            </div>
            <div>
              <DatePicker label="Birth Date" v-model="birthDate" />
            </div>
            <div>
              <Input label="Phone Number" v-model="phoneNumber" />
            </div>
          </div>
        </div>

        <div v-if="currentStep === 2">
          <!-- Step 2: Address -->
          <h2>Address</h2>
          <div class="grid grid-cols-3 gap-4">
            <div>
              <Input label="House Number" v-model="houseNumber" />
            </div>
            <div>
              <Input label="Subdivision/Blk" v-model="subdivision" />
            </div>
            <div>
              <Input label="Street" v-model="street" />
            </div>
            <div>
              <Input label="Barangay" v-model="barangay" />
            </div>
            <div>
              <Input label="City" v-model="city" />
            </div>
            <div>
              <Input label="Region" v-model="region" />
            </div>
          </div>
        </div>

        <div v-if="currentStep === 3">
          <!-- Step 3: Payment Setup -->
          <h2>Payment Setup</h2>
          <div class="grid grid-cols-3 gap-4">
            <div>
              <Input label="Card Type" v-model="cardType" />
            </div>
            <div>
              <Input label="Name on Card" v-model="nameOnCard" />
            </div>
            <div>
              <Input label="Card Number" v-model="cardNumber" />
            </div>
            <div>
              <DatePicker label="Expiry Date" v-model="expiryDate" />
            </div>
            <div>
              <Input label="CVV" v-model="cvv" />
            </div>
          </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="flex justify-between mt-4">
          <Button v-if="currentStep > 1" :label="'Previous'" @click="prevStep" />
          <Button v-if="currentStep < 3" :label="'Next'" @click="nextStep" />
          <Button v-if="currentStep === 3" :label="'Submit'" @click="submitForm" />
        </div>

      </div>
    </div>
  </div>
</template>

<script>
import Input from './Input.vue';
import DatePicker from './DatePicker.vue';
import Button from './Button.vue';
import axios from 'axios';

export default {
    name: 'RegisterInformationPage',
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
