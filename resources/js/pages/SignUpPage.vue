<!-- resources/js/components/SignUp.vue -->

<template>
  <div>
    <h2>Sign Up</h2>
    <form @submit.prevent="signUp">
      <input v-model="userName" type="text" placeholder="Username" required />
      <input v-model="email" type="email" placeholder="Email" required />
      <input v-model="password" type="password" placeholder="Password" required />
      <button type="submit">Sign Up</button>
      <p v-if="errorMessage">{{ errorMessage }}</p>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      userName: '',
      email: '',
      password: '',
      errorMessage: '',
    };
  },
  methods: {
    async signUp() {
      try {
        await axios.post('/signup', { user_name: this.userName, email: this.email, password: this.password });
        this.$router.push('/signin'); // Redirect after successful sign-up
      } catch (error) {
        this.errorMessage = error.response.data.message;
      }
    },
  },
};
</script>
