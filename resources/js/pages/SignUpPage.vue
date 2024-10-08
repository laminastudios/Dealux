<!-- resources/js/components/SignUp.vue -->

<template>
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-[1216px] h-[739px] bg-white shadow flex">
            <!-- Left Side Container -->
            <div class="flex-1 flex flex-col items-center p-6">
                <img
                    src="assets/dealuxcircle.png"
                    class="w-[80px] mt-[70px]"
                    alt="Dealux Logo"
                />
                <h2 class="text-2xl font-semibold text-center mb-6 mt-[21px]">Create Account</h2>
                <form
                    @submit.prevent="signUp"
                    class="space-y-6 flex flex-col items-center mt-7"
                >
                    <float-input
                        v-model="userName"
                        type="text"
                        label="Username"
                        class="w-[465px] bg-neutral-50 border-neutral-50 custom-shadow"
                        required
                    />
                    <float-input
                        v-model="email"
                        type="email"
                        label="Email Address"
                        class="w-[465px] bg-neutral-50 border-neutral-50 custom-shadow"
                        required
                    />

                    <!-- Password field with toggleable eye icon -->
                    <div class="relative w-[465px]">
                        <float-input
                            v-model="password"
                            :type="showPassword ? 'text' : 'password'"
                            label="Password"
                            class="w-full bg-neutral-50 border-neutral-50 custom-shadow"
                            required
                        />
                        <span
                            @click="togglePasswordVisibility"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                        >
                            <img
                                :src="showPassword ? 'assets/eye-off.png' : 'assets/eye.png'"
                                class="h-6 w-6"
                                alt="Toggle Password Visibility"
                            />
                        </span>
                    </div>

                    <div class="text-center label-4 text-black mt-8 font-semibold">
                        By signing up for an account, you agree to <br />
                        <a
                            href="#"
                            class="text-black hover:underline"
                            >Dealux’s Terms of Service</a
                        >
                        and
                        <a
                            href="#"
                            class="text-black hover:underline"
                            >Privacy Policy</a
                        >.
                    </div>
                    <div class="flex flex-col items-center">
                        <custom-button
                            type="submit"
                            variant="filled"
                            size="xl"
                            color="yellow"
                            class="mb-[55px]"
                        >
                            <p class="label-3 font-semibold text-white">Sign Up</p>
                        </custom-button>
                        <p
                            v-if="errorMessage"
                            class="text-red-500 text-center mt-4"
                        >
                            {{ errorMessage }}
                        </p>
                    </div>
                </form>
            </div>

            <!-- Right Side Container -->
            <div class="relative w-[504px] h-full bg-primary-800 flex items-center justify-center flex-col">
                <img
                    src="assets/shapes.png"
                    class="absolute inset-0 w-full h-full object-cover z-0"
                    alt="Shapes"
                />
                <div class="relative z-10 text-center">
                    <h2 class="font-mainfont font-semibold text-white">Already have <br />an account?</h2>
                    <p class="label-4 text-white mt-8">Stay connected with the best deals!</p>
                </div>
                <div class="relative z-20">
                    <custom-button
                        variant="filled"
                        size="xl"
                        color="yellow"
                        @click="redirectToLogin"
                        class="mt-[52px]"
                    >
                        <p class="label-3 font-semibold text-white">Sign-In</p>
                    </custom-button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
import FloatingLabelInput from '../components/ui/Input.vue';
import Button from '../components/ui/Button.vue';
import { useToast } from 'vue-toastification';

export default {
    name: 'SignUpPage',
    components: {
        'float-input': FloatingLabelInput,
        'custom-button': Button,
    },
    data() {
        return {
            userName: '',
            email: '',
            password: '',
            errorMessage: '',
            showPassword: false, // Toggle password visibility
        };
    },
    setup() {
        // Get toast interface
        const toast = useToast();
        return {
            toast,
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
                this.toast.success('Verification link has been sent to your email');
                this.$router.push('/login'); // Redirect after successful sign-up
            } catch (error) {
                // this.errorMessage = error.response?.data?.message || 'An error occurred during registration.';
                this.toast.error('An error occurred during registration.');
            }
        },
        redirectToLogin() {
            this.$router.push('/login'); // Use Vue Router to navigate
        },
        togglePasswordVisibility() {
            this.showPassword = !this.showPassword;
        },
    },
};
</script>
