<!-- resources/js/components/SignIn.vue -->

<template>
  <div>
    <h2>Sign In</h2>
    <form @submit.prevent="signIn">
      <input v-model="email" type="email" placeholder="Email" required />
      <input v-model="password" type="password" placeholder="Password" required />
      <button type="submit">Sign In</button>
      <p v-if="errorMessage">{{ errorMessage }}</p>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: '',
      errorMessage: '',
    };
  },
  methods: {
    async signIn() {
      try {
        await axios.post('/login', { email: this.email, password: this.password });
        this.$router.push('/home'); // Redirect after successful sign-in
      } catch (error) {
        this.errorMessage = error.response.data.message;
      }
    },
  },
};
</script>
