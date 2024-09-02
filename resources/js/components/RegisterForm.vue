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
      // Validate the form data (you can add custom validation here)
      if (!this.formData.user_name || !this.formData.first_name || !this.formData.last_name) {
        alert('Please fill in all required fields.');
        return;
      }

      // Send data to the server
      const response = await axios.post('/register', this.formData);

      // Handle the server response
      if (response.data.success) {
        alert('Registration successful!');
        // Optionally, redirect the user or clear the form
      } else {
        alert('Registration failed: ' + response.data.message);
      }
    } catch (error) {
      alert('An error occurred: ' + error.message);
    }
  }
}
    },
  },
};
</script>


