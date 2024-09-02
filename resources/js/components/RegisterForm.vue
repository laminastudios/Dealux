<template>
  <popup>
    <form @submit.prevent="submitForm">
      <text-input v-for="(field, index) in textFields" :key="index" :label="field.label" v-model="formData[field.model]" />
      <date-input label="Birth Date" v-model="formData.birth_date" />
      <submit-button label="Register" />
    </form>
  </popup>
</template>

<script>
import axios from 'axios';
import TextInput from './TextInput.vue';
import DateInput from './DateInput.vue';
import SubmitButton from './SubmitButton.vue';
import Popup from './Popup.vue';

export default {
  components: {
    TextInput,
    DateInput,
    SubmitButton,
    Popup,
  },
  data() {
    return {
      formData: {
        user_name: '',
        first_name: '',
        middle_name: '',
        last_name: '',
        birth_date: '',
        phone_number: '',
      },
      textFields: [
        { label: 'User Name', model: 'user_name' },
        { label: 'First Name', model: 'first_name' },
        { label: 'Middle Name', model: 'middle_name' },
        { label: 'Last Name', model: 'last_name' },
        { label: 'Phone Number', model: 'phone_number' },
      ],
    };
  },
methods: {
    async submitForm() {
        try {
            const response = await axios.post('/register', {
                user_name: this.user_name,
                first_name: this.first_name,
                middle_name: this.middle_name,
                last_name: this.last_name,
                birth_date: this.birth_date,
                phone_number: this.phone_number,
            });
            // Handle successful response
            console.log('Registration successful:', response.data);
            // You might want to display a success message or close the popup
        } catch (error) {
            // Handle server-side errors
            if (error.response && error.response.data) {
                // Example: Display error messages from the server
                this.errors = error.response.data.errors;
            } else {
                console.error('Unexpected error:', error);
            }
        }
    }
}
    },
  },
};
</script>


