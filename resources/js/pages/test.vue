<template>
    <section class="min-h-screen">
        <div class="container mx-auto py-20">
            <div class="flex">
                <!-- Sidebar -->
                <div class="w-1/4 pt-12 bg-white">
                    <div class="flex items-center">
                        <img
                            :src="imageSrc"
                            alt="Profile Picture"
                            class="profile-image cursor-pointer"
                            @click="$refs.fileInput.click()"
                        />
                        <input
                            type="file"
                            @change="handleImageUpload"
                            accept="image/*"
                            style="display: none"
                            ref="fileInput"
                        />
                        <div class="flex flex-col ml-8 font-bold label-2">
                            <span id="USERNAME">Username</span>
                            <button class="text-neutral-400 mt-2"><i class="bx bx-pencil"></i> Edit Profile</button>
                        </div>
                    </div>
                    <nav class="mt-6">
                        <ul class="text-lg">
                            <li class="py-2">
                                <a
                                    href="#"
                                    class="label-2 font-bold text-black hover:text-warning-600 flex items-center"
                                >
                                    <i class="bx bxs-user w-6"></i>
                                    <span class="ml-2">My Account</span>
                                </a>
                            </li>
                            <li class="py-2">
                                <a
                                    href="#"
                                    class="label-2 font-bold text-neutral-500 hover:text-warning-600 flex items-center"
                                >
                                    <span class="w-6"></span>
                                    <span class="ml-2">Profile</span>
                                </a>
                            </li>
                            <li class="py-2">
                                <a
                                    href="#"
                                    class="label-2 font-bold text-warning-600 hover:text-warning-600 flex items-center"
                                >
                                    <span class="w-6"></span>
                                    <span class="ml-2">Banks and Cards</span>
                                </a>
                            </li>
                            <li class="py-2">
                                <a
                                    href="#"
                                    class="label-2 font-bold text-neutral-500 hover:text-warning-600 flex items-center"
                                >
                                    <span class="w-6"></span>
                                    <span class="ml-2">Addresses</span>
                                </a>
                            </li>
                            <li class="py-2">
                                <a
                                    href="#"
                                    class="label-2 font-bold text-black flex hover:text-warning-600 items-center"
                                >
                                    <i class="bx bx-crown w-6"></i>
                                    <span class="ml-2">Subscription</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Main Content -->
                <div class="w-3/4 px-[38px] py-[36px] bg-neutral-100">
                    <!-- Credit Card Content -->
                    <div class="border-b border-black pb-4 mb-4 flex justify-between items-center">
                        <h4 class="font-semibold">Credit / Debit Card</h4>
                        <custom-button
                            variant="filled"
                            size="sm"
                            class="gap-[10px]"
                            color="neutral-400"
                            @click="
                                showModal = true;
                                modalType = 'card';
                            "
                        >
                            <p class="label-4 font-semibold">Add New Card</p>
                            <i class="bx bx-add-to-queue"></i>
                        </custom-button>
                    </div>

                    <!-- Credit Card List -->
                    <div v-if="cards.length > 0">
                        <div
                            v-for="(card, index) in cards"
                            :key="index"
                            :class="[{ 'border-b border-black pb-16': index !== cards.length - 1 }, 'mb-4 mt-10 flex']"
                        >
                            <div class="flex items-start w-full space-x-6">
                                <i class="bx bxs-image text-[3rem] mt-4"></i>
                                <p class="font-normal label-3 mt-8">VISA</p>
                                <span
                                    v-if="card.default"
                                    class="bg-neutral-400 rounded px-2 text-xs mt-8"
                                    >Default</span
                                >
                            </div>
                            <div class="flex justify-between items-center w-full mt-4">
                                <p class="font-normal label-3">{{ maskedCardNumber(card.cardnum) }}</p>
                                <div class="flex space-x-4">
                                    <button
                                        v-if="!card.default"
                                        @click="deleteCard(index)"
                                        class="label-4"
                                        style="text-decoration: underline"
                                    >
                                        Delete
                                    </button>
                                    <custom-button
                                        v-if="!card.default"
                                        @click="setAsDefault(index)"
                                        variant="filled"
                                        size="xs"
                                        class="gap-[10px]"
                                        color="neutral-400"
                                    >
                                        <p class="label-4 font-semibold">Set as Default</p>
                                    </custom-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p v-else>No cards added yet. Click "Add New Card" to start adding your cards.</p>

                    <!-- Bank Account Content -->
                    <div class="border-b border-black pt-20 pb-4 mb-4 flex justify-between items-center">
                        <h4 class="font-semibold">Bank Accounts</h4>
                        <custom-button
                            variant="filled"
                            size="sm"
                            class="gap-[10px]"
                            color="neutral-400"
                            @click="
                                showModal = true;
                                modalType = 'bank';
                            "
                        >
                            <p class="label-4 font-semibold">Add New Bank Account</p>
                            <i class="bx bx-add-to-queue"></i>
                        </custom-button>
                    </div>

                    <!-- Bank Account List -->
                    <div v-if="banks.length > 0">
                        <div
                            v-for="(bank, index) in banks"
                            :key="index"
                            :class="[{ 'border-b border-black pb-16': index !== banks.length - 1 }, 'mb-4 mt-10 flex']"
                        >
                            <div class="flex items-start w-full space-x-6">
                                <i class="flex justify-center bx bxs-image text-[3rem] mt-4"></i>
                                <div class="flex flex-col mt-5">
                                    <p class="font-normal label-3">{{ bank.bankname }}</p>
                                    <p class="font-normal label-3 mt-2">{{ bank.fullname }}</p>
                                </div>
                                <span
                                    v-if="bank.default"
                                    class="flex bg-neutral-400 rounded px-3 text-xs mt-5"
                                    >Default</span
                                >
                            </div>
                            <div class="flex justify-between items-center w-full mt-4">
                                <p class="font-normal ml-16 label-3">{{ maskedBankNumber(bank.accountnum) }}</p>
                                <div class="flex space-x-4">
                                    <button
                                        v-if="!bank.default"
                                        @click="deleteBank(index)"
                                        class="label-4"
                                        style="text-decoration: underline"
                                    >
                                        Delete
                                    </button>
                                    <custom-button
                                        v-if="!bank.default"
                                        @click="setAsDefaultBank(index)"
                                        variant="filled"
                                        size="xs"
                                        class="gap-[10px]"
                                        color="neutral-400"
                                    >
                                        <p class="label-4 font-semibold">Set as Default</p>
                                    </custom-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p v-else>
                        No bank accounts added yet. Click "Add New Bank Account" to start adding your bank accounts.
                    </p>
                </div>
            </div>
        </div>

        <!-- Add Modal -->
        <div
            v-if="showModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center"
        >
            <div class="bg-white p-8 rounded shadow-lg max-w-lg w-full">
                <h3 class="text-xl border-b pb-4 font-bold mb-4">
                    {{ modalType === 'card' ? 'Add New Credit Card' : 'Add New Bank Account' }}
                </h3>
                <form @submit.prevent="submitForm">
                    <div v-if="modalType === 'card'">
                        <div class="mb-4">
                            <input
                                v-model="newCard.cardnum"
                                type="text"
                                placeholder="Card Number"
                                class="w-full p-2 bg-neutral-100 border-neutral-100"
                                required
                            />
                        </div>
                        <div class="mb-4 flex space-x-2">
                            <input
                                v-model="newCard.expiry"
                                type="text"
                                placeholder="Expiry Date (MM/YY)"
                                class="w-2/3 p-2 bg-neutral-100 border-neutral-100"
                                required
                            />
                            <input
                                v-model="newCard.cvv"
                                type="text"
                                placeholder="CVV"
                                class="w-1/3 p-2 bg-neutral-100 border-neutral-100"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <input
                                v-model="newCard.namecard"
                                type="text"
                                placeholder="Name on Card"
                                class="w-full p-2 bg-neutral-100 border-neutral-100"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <label>
                                <input
                                    v-model="newCard.default"
                                    type="checkbox"
                                    class="mr-2"
                                />
                                Set as Default
                            </label>
                        </div>
                    </div>
                    <div v-else>
                        <div class="mb-4">
                            <input
                                v-model="newBank.fullname"
                                type="text"
                                placeholder="Full name in the bank account"
                                class="w-full p-2 bg-neutral-100 border-neutral-100"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <input
                                v-model="newBank.accountnum"
                                type="text"
                                placeholder="Account No."
                                class="w-full p-2 bg-neutral-100 border-neutral-100"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <input
                                v-model="newBank.bankname"
                                type="text"
                                placeholder="Bank name"
                                class="w-full p-2 bg-neutral-100 border-neutral-100"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <label>
                                <input
                                    v-model="newBank.default"
                                    type="checkbox"
                                    class="mr-2"
                                />
                                Set as Default
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button
                            @click="closeModal"
                            type="button"
                            class="px-4 py-2 bg-neutral-400 text-white rounded"
                        >
                            Cancel
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-neutral-400 text-white rounded"
                        >
                            {{ 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue';

export default {
    name: 'LandingPage',
    data() {
        return {
            showModal: false,
            modalType: '', // 'card' or 'bank'
            cards: [],
            banks: [], // Add an array to manage bank accounts
            newCard: {
                cardnum: '',
                expiry: '',
                cvv: '',
                namecard: '',
                default: false,
            },
            newBank: {
                // Add a new bank account model
                fullname: '',
                accountnum: '',
                bankname: '',
                default: false,
            },
            imageSrc: 'path/to/placeholder-image.jpg', // Default placeholder image
        };
    },
    methods: {
        submitForm() {
            if (this.modalType === 'card') {
                if (this.newCard.default) {
                    this.cards.forEach((addr) => (addr.default = false));
                } else {
                    this.cards.push({ ...this.newCard });
                }
            } else if (this.modalType === 'bank') {
                if (this.newBank.default) {
                    this.banks.forEach((bank) => (bank.default = false));
                } else {
                    this.banks.push({ ...this.newBank });
                }
            }
            this.closeModal();
        },
        deleteCard(index) {
            if (!this.cards[index].default) {
                this.cards.splice(index, 1);
            }
        },
        setAsDefault(index) {
            this.cards.forEach((addr) => (addr.default = false));
            this.cards[index].default = true;
        },
        deleteBank(index) {
            if (!this.banks[index].default) {
                this.banks.splice(index, 1);
            }
        },
        setAsDefaultBank(index) {
            this.banks.forEach((bank) => (bank.default = false));
            this.banks[index].default = true;
        },
        closeModal() {
            this.showModal = false;
            this.newCard = {
                cardnum: '',
                expiry: '',
                cvv: '',
                namecard: '',
                default: false,
            };
            this.newBank = {
                fullname: '',
                accountnum: '',
                bankname: '',
                default: false,
            };
        },
        handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.imageSrc = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        maskedCardNumber(cardnum) {
            return `**** **** **** ${cardnum.slice(-4)}`;
        },
        maskedBankNumber(accountnum) {
            return `*${accountnum.slice(-4)}`;
        },
    },
    components: {
        'custom-button': Button,
    },
};
</script>

<style scoped>
/* Add custom styles here */
.profile-image {
    width: 73px; /* Adjust size as needed */
    height: 73px; /* Adjust size as needed */
    border-radius: 100%; /* Ensures the image is circular */
    object-fit: cover; /* Maintains aspect ratio and covers the circular area */
    background-color: #d1d5db; /* Fallback background color */
}
</style>
