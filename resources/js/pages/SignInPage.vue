<!-- resources/js/components/SignIn.vue -->

<template>
    <section class="min-h-screen flex items-center justify-center">
        <!-- Left Side: Favicon -->
        <div class="mr-[104px]">
            <div class="favicon">
                <img src="/placeholderico.png" alt="Dealux Logo" class="mx-auto w-[244px]" />
                <h3 class="text-xl mt-4 text-center text-[24px] font-semibold">Sulit Deals Here</h3>
            </div>
        </div>
        
        <!-- Right Side: Container -->
        <div>
            <h2 class="mb-[35px] font-semibold font-mainfont">Dealux Sign In</h2>
            <div class="w-[592px] h-[540px] bg-[#D9D9D9] rounded-[20px] font-mainfont">
            <form @submit.prevent="signIn" class="w-full flex flex-col items-center pt-[95px]">
                <input
                    v-model="email"
                    type="email"
                    placeholder="Email Address"
                    required
                    class="p-2 border w-[448px] h-[48px] bg-[#BFBFBF] border-[#BFBFBF]"
                />
                <input
                    v-model="password"
                    type="password"
                    placeholder="Password"
                    required
                    class="mt-[22px] p-2 border w-[448px] h-[48px] bg-[#BFBFBF] border-[#BFBFBF]"
                />
                <p class="text-[14px] ml-[320px] mt-[10px] text-[#8C8C8C]">Forgot Password?</p>
                <button type="submit" class="mt-[79px] w-[242px] h-[37px] p-2 bg-[#8C8C8C] text-white ">LOG IN</button>
                <p v-if="errorMessage" class="mt-4 text-red-500">{{ errorMessage }}</p>
                
                <router-link to="/register" class="text-[14px] mt-[79px] font-medium">
                New to Dealux? <span class="font-bold">Sign-Up</span>
                </router-link>
            </form>
        </div>
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