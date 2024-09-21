<template>
    <section class="min-h-screen bg-background">
        <div class="container mx-auto py-20">
            <div class="flex">
                <!-- Sidebar -->
                <ProfileSidebar></ProfileSidebar>

                <!-- Main Content -->
                <div class="w-3/4 ml-6 px-[38px] py-[36px] bg-white rounded-xl shadow-lg">
                    <div class="border-b border-black pb-2 mb-4 flex justify-between items-center">
                        <div>
                            <h5 class="font-semibold text-yellow-400">My Profile</h5>
                            <p class="font-semibold label-3 mt-4">Manage and protect your account</p>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="flex flex-wrap space-x-12">
                            <div class="inline-block w-[120px]">
                                <p class="font-bold label-3 text-right mt-4 mb-12">Username</p>
                            </div>
                            <p class="font-Medium label-3 text-left mt-4 mb-12">{{ userName }}</p>
                        </div>
                        <div class="flex flex-wrap space-x-12">
                            <div class="inline-block w-[120px]">
                                <p class="font-bold label-3 text-right mt-4 mb-12">Name</p>
                            </div>
                            <p class="font-Medium label-3 text-left mt-4 mb-12">Juan Dela Cruz</p>
                        </div>
                        <div class="flex flex-wrap space-x-12">
                            <div class="inline-block w-[120px] mb-12">
                                <p class="font-bold label-3 text-right mt-4">Email</p>
                            </div>
                            <div>
                                <p
                                    v-if="!isEditingEmail"
                                    class="font-medium label-3 text-left mt-4 mb-12"
                                >
                                    {{ email }}
                                </p>
                                <input
                                    v-else
                                    v-model="email"
                                    type="email"
                                    class="border rounded px-2 py-1 mt-4 mb-12"
                                />
                            </div>
                            <div class="inline-block">
                                <button
                                    v-if="!isEditingEmail"
                                    class="font-bold label-3 text-right mt-4 mb-12 hover:underline"
                                    style="color: #0f6dd7"
                                    @click="editEmail"
                                >
                                    change
                                </button>
                                <button
                                    v-else
                                    class="font-bold label-3 text-right mt-4 mb-12 hover:underline"
                                    style="color: #0f6dd7"
                                    @click="saveEmail"
                                >
                                    save
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-wrap space-x-12">
                            <div class="inline-block w-[120px]">
                                <p class="font-bold label-3 text-right mt-4 mb-12">Phone Number</p>
                            </div>
                            <button
                                class="font-bold label-3 text-right mt-4 mb-12 hover:underline"
                                style="color: #0f6dd7"
                            >
                                add
                            </button>
                        </div>
                        <div class="flex flex-wrap space-x-12">
                            <div class="inline-block w-[120px]">
                                <p class="font-bold label-3 text-right mt-4 mb-12">Gender</p>
                            </div>
                            <DropDownInput
                                class="w-[156px] h-[28px]"
                                variant="variant1"
                                :items="DropDownItems"
                                name="Gender"
                                @change="handleselectGender"
                            >
                                <p class="label-4 font-semibold">Select</p>
                                <i class="bx bxs-down-arrow"></i>
                            </DropDownInput>
                        </div>
                        <div class="flex flex-wrap space-x-12">
                            <div class="inline-block w-[120px]">
                                <p class="font-bold label-3 text-right mt-4 mb-12">Date of Birth</p>
                            </div>
                            <custom-button
                                variant="filled"
                                size="sm"
                                class="gap-[10px] rounded-lg"
                                color="yellow"
                                @click="showModal = true"
                            >
                                <p class="label-4 font-semibold">Enter Date of Birth</p>
                                <i class="bx bx-calendar"></i>
                            </custom-button>
                        </div>
                        <div class="flex flex-wrap justify-end">
                            <custom-button
                                variant="filled"
                                size="sm"
                                class="gap-[10px] rounded-lg"
                                color="yellow"
                                @click="showModal = true"
                            >
                                <p class="label-4 font-semibold">Save Changes</p>
                            </custom-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue';
import ProfileSidebar from '../components/ui/ProfileSidebar.vue';
import FloatingLabelInput from '../components/ui/Input.vue';
import DropDownInput from '../components/ui/DropDownInput.vue';

export default {
    data() {
        return {
            userName: '',
            name: '',
            email: '',
            isEditingEmail: false,
            DropDownItems: [
                { text: 'Male', value: 'Male' },
                { text: 'Female', value: 'Female' },
                { text: '????', value: '????' },
            ],
        };
    },
    mounted() {
        this.fetchUserData();
    },
    methods: {
        async fetchUserData() {
            try {
                const response = await fetch('/user');
                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }
                const data = await response.json();
                this.userName = data.user.user_name || 'Guest';
                this.name = data.user.first_name || 'Your Name';
                this.email = data.user.email || 'example@gmail.com';
            } catch (error) {
                console.error('Error fetching user data:', error);
                this.userName = 'Guest';
                this.name = 'Your Name';
                this.email = 'example@gmail.com';
            }
        },
        editEmail() {
            this.isEditingEmail = true;
        },
        saveEmail() {
            this.isEditingEmail = false;
        },
        handleselectGender(selectedGender) {
            this.selectedGender = selectedItem.value;
            console.log('Selected Quantity:', this.selectedGender);
        },
    },
    components: {
        DropDownInput,
        ProfileSidebar,
        'custom-button': Button,
        'float-input': FloatingLabelInput,
    },
};
</script>

<style scoped></style>
