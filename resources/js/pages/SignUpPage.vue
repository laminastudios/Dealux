<!-- resources/js/components/SignUp.vue -->

<template>
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-[1216px] h-[739px] bg-white shadow flex">
        
        <!-- Left Side Container -->
        <div class="flex-1 flex flex-col items-center p-6">
    <img src="assets/dealuxcircle.png" class="w-[80px] mt-[70px]" alt="Dealux Logo">
    <h2 class="text-2xl font-semibold text-center mb-6 mt-[21px]">Create Account</h2>
    <form @submit.prevent="signUp" class="space-y-6 flex flex-col items-center mt-7">
        <float-input
            v-model="userName"
            type="text"
            label="Username"
            class="w-[465px] bg-neutral-50 border-neutral-50 shadow-sm"
            required
        />
        <float-input
            v-model="email"
            type="email"
            label="Email Address"
            class="w-[465px] bg-neutral-50 border-neutral-50 shadow-sm"
            required
        />
        <float-input
            v-model="password"
            type="password"
            label="Password"
            class="w-[465px] bg-neutral-50 border-neutral-50 shadow-sm"
            required
        />
        <div class="text-center label-4 text-black mt-8 font-semibold">
            By signing up for an account, you agree to <br />
            <a href="#" class="text-black hover:underline">Dealux’s Terms of Service</a> 
            and 
            <a href="#" class="text-black hover:underline">Privacy Policy</a>.
        </div>
        <div class="flex flex-col items-center">
            <button
                type="submit"
                class="mb-[55px] w-[232px] h-[52px] p-2 bg-yellow-400 text-white rounded-md"
            >
                Sign Up
            </button>
            <p v-if="errorMessage" class="text-red-500 text-center mt-4">
                {{ errorMessage }}
            </p>
        </div>
    </form>
</div>

        <!-- Right Side Container -->
        <div class="relative w-[504px] h-full bg-primary-800 flex items-center justify-center flex-col">
            <img src="assets/shapes.png" class="absolute inset-0 w-full h-full object-cover z-0" alt="Shapes">
            <div class="relative z-10 text-center">
            <h2 class="font-mainfont font-semibold text-white">Already have <br />an account?</h2>
            <p class="label-4 text-white mt-8">Stay connected with the best deals!</p>
        </div>
            <div class="relative z-20"> <!-- Added z-20 to ensure button is above the image -->
                <button
                    @click="redirectToLogin"
                    class="label-3 mt-[52px] w-[232px] h-[52px] p-2 bg-yellow-400 text-white rounded-md">
                Sign-In
                </button>
            </div>
        </div>
    </div>
    </section>
</template>


<script>
import axios from 'axios';
import FloatingLabelInput from '../components/ui/Input.vue';

export default {
    name: 'SignUpPage',
    components: {
        'float-input': FloatingLabelInput,
    },
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
                await axios.post('/register', {
                    user_name: this.userName,
                    email: this.email,
                    password: this.password,
                });
                this.$router.push('/login'); // Redirect after successful sign-up
            } catch (error) {
                this.errorMessage = error.response?.data?.message || 'An error occurred during registration.';
            }
        },
        redirectToLogin() {
            console.log("Redirecting to login...");
            this.$router.push('/login'); // Use Vue Router to navigate
        },
    },
};
</script>

<style scoped>
/* Hover effect for buttons */
button {
  transition: transform 0.3s ease, background-color 0.3s ease;
}

button:hover {
  transform: scale(1.05);
  background-color: #f59e0b; /* Slightly darker yellow */
}
</style>