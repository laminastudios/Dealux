<!-- resources/js/components/SignIn.vue -->
<template>
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-[1216px] h-[739px] bg-white shadow flex">
        
        <!-- Left Side Container -->
        <div class="relative w-[504px] h-full bg-primary-800 flex items-center justify-center flex-col">
            <img src="assets/shapes.png" class="absolute inset-0 w-full h-full object-cover z-0" alt="Shapes">
            <div class="relative z-10 text-center">
                <h2 class="font-mainfont font-medium text-white">New to Dealux?</h2>
                <p class="label-4 text-white mt-7">Join now to see all the best deals!</p>
            </div>
            <div class="relative z-20"> <!-- Added z-20 to ensure button is above the image -->
                <button
                @click="redirectToRegister"
                class="label-3 mt-20 w-[232px] h-[52px] p-2 bg-yellow-400 text-white rounded-md"
                >
                Sign-Up
                </button>
            </div>
        </div>
        
        <!-- Right Side Container -->
        <div class="flex-1 flex flex-col items-center p-6">
            <img src="assets/dealuxcircle.png" class="w-[80px] mt-[70px]" alt="Dealux Logo">
            <h2 class="text-2xl font-semibold text-center mb-6 mt-[21px]">Welcome Back!</h2>
            <form @submit.prevent="signIn" class="space-y-6 flex flex-col items-center">
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
            
            <!-- Remember me and Forgot password section -->
            <div class="w-[465px] flex justify-between items-center mt-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember" class="text-gray-700">Remember me</label>
            </div>
                <a href="#" class="text-black-500 hover:underline">Forgot password?</a>
            </div>
            
            <div class="flex flex-col items-center">
                <button
                    type="submit"
                    class="mt-20 w-[232px] h-[52px] p-2 bg-yellow-400 text-white rounded-md"
                >
                    Sign In
                </button>
            <p v-if="errorMessage" class="text-red-500 text-center mt-4">
                {{ errorMessage }}
            </p>
            </div>
        </form>
        </div>
    </div>
    </section>
</template>

<script>
import axios from 'axios';
import FloatingLabelInput from '../components/ui/Input.vue';

export default {
    name: 'SignInPage',
    components: {
        'float-input': FloatingLabelInput,
    },
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
        redirectToRegister() {
            console.log("Redirecting to register...");
            window.location.href = '/register';
        }
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