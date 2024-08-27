<!-- resources/js/components/SignIn.vue -->

<template>
    <section class="min-h-screen">
        <div class="container border border-blue-500 h-full">
            <h2>Sign In</h2>
            <form @submit.prevent="signIn">
                <input
                    v-model="email"
                    type="email"
                    placeholder="Email"
                    required
                />
                <input
                    v-model="password"
                    type="password"
                    placeholder="Password"
                    required
                />
                <button type="submit">Sign In</button>
                <p v-if="errorMessage">{{ errorMessage }}</p>
            </form>
        </div>
    </section>
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
                window.location.href = '/home'; // Redirect after successful sign-in
            } catch (error) {
                this.errorMessage = error.response.data.message;
            }
        },
    },
};
</script>
