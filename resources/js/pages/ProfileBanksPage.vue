<template>
    <section class="min-h-screen bg-background">
        <div class="container mx-auto py-20">
            <div class="flex">
                <!-- Sidebar-->
                <Sidebar></Sidebar>

                <!-- Main Content -->
                <div class="w-3/4 ml-6 px-[38px] py-[36px] bg-white rounded-xl shadow-lg">
                    <!-- Credit Card Content -->
                    <div class="border-b border-black py-[26px] pb-2 mb-4 flex justify-between items-center">
                        <h5 class="font-semibold">Credit / Debit Card</h5>
                        <custom-button
                            variant="filled"
                            size="sm"
                            class="gap-[10px] rounded-lg"
                            color="yellow"
                            @click="
                                showModal = true;
                                modalType = 'card';
                            "
                        >
                            <p class="label-4 font-extrabold">Add New Card</p>
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
                                <img
                                    :src="'https://placehold.co/84x67'"
                                    class="ml-1 bank-image mt-4"
                                />
                                <p class="font-normal label-3 mt-8">VISA</p>
                                <span
                                    v-if="card.default"
                                    class="bg-primary-500 text-white rounded-2xl px-6 py-1 font-bold text-sm mt-6"
                                >
                                    Default
                                </span>
                            </div>
                            <div class="flex justify-between items-center w-full mt-4">
                                <p class="font-normal ml-12 label-4">{{ maskedCardNumber(card.cardnum) }}</p>
                                <div class="flex space-x-4">
                                    <button
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
                                        class="gap-[10px] rounded-lg bg-[#F9C163] hover:bg-[#D17600]"
                                    >
                                        <p class="label-4 font-semibold text-white">Set as Default</p>
                                    </custom-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p
                        v-else
                        class="label-3"
                    >
                        No cards added yet. Click "Add New Card" to start adding your cards.
                    </p>

                    <!-- Bank Account Content -->
                    <div class="border-b border-black pt-20 pb-4 mb-4 flex justify-between items-center">
                        <h5 class="font-semibold">Bank Accounts</h5>
                        <custom-button
                            variant="filled"
                            size="sm"
                            class="gap-[10px] rounded-lg"
                            color="yellow"
                            @click="
                                showModal = true;
                                modalType = 'bank';
                            "
                        >
                            <p class="label-4 font-extrabold">Add New Bank Account</p>
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
                            <div class="flex items-start w-full">
                                <img
                                    :src="'https://placehold.co/84x67'"
                                    class="ml-1 bank-image mt-4"
                                />
                                <div class="flex flex-col mt-5 ml-6">
                                    <p class="font-normal label-4">{{ bank.bankname }}</p>
                                    <p class="font-normal label-4 mt-2">Full name: {{ bank.fullname }}</p>
                                </div>
                                <span
                                    v-if="bank.default"
                                    class="bg-primary-500 text-white rounded-2xl px-6 py-1 font-bold text-sm mt-3 ml-4"
                                >
                                    Default
                                </span>
                            </div>
                            <div class="flex justify-between items-center w-2/3">
                                <p class="font-normal ml-6 label-4">{{ maskedBankNumber(bank.accountnum) }}</p>
                                <div class="flex space-x-4">
                                    <button
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
                                        class="gap-[10px] rounded-lg bg-[#F9C163] hover:bg-[#D17600]"
                                    >
                                        <p class="label-4 font-semibold text-white">Set as Default</p>
                                    </custom-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p
                        v-else
                        class="label-3"
                    >
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
            <div class="bg-background p-8 rounded shadow-lg max-w-xl w-full py-[78px] px-[100px]">
                <h5 class="border-b border-black pb-2 font-semibold mb-2 text-primary-600">
                    {{ modalType === 'card' ? 'Add New Credit Card' : 'Add Bank Account' }}
                </h5>
                <form @submit.prevent="submitForm">
                    <div v-if="modalType === 'card'">
                        <h6 class="font-medium label-3 mb-4 pt-3">Card Details</h6>
                        <div class="mb-4">
                            <float-input
                                v-model="newCard.cardnum"
                                id="cardnum"
                                type="input"
                                label="Card Number"
                                class="w-full bg-primary-50 shadow-md"
                                required
                            />
                        </div>
                        <div class="mb-4 flex space-x-2">
                            <float-input
                                v-model="newCard.expiry"
                                id="expiry"
                                type="input"
                                label="Expiry Date (MM/YY)"
                                class="w-full bg-primary-50 shadow-md"
                                required
                            />
                            <float-input
                                v-model="newCard.cvv"
                                id="cvv"
                                type="input"
                                label="CVV"
                                class="w-full bg-primary-50 shadow-md"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <float-input
                                v-model="newCard.namecard"
                                id="namecard"
                                type="input"
                                label="Name on Card"
                                class="w-full bg-primary-50 shadow-md"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <label>
                                <input
                                    v-model="newCard.default"
                                    type="checkbox"
                                    class="mr-2 rounded"
                                />
                                <span class="label-4">Set as Default</span>
                            </label>
                        </div>
                    </div>
                    <div v-else>
                        <div class="pt-2 mb-4">
                            <float-input
                                v-model="newBank.fullname"
                                id="fullname"
                                type="input"
                                label="Full name in the bank account"
                                class="w-full bg-primary-50 shadow-md"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <float-input
                                v-model="newBank.accountnum"
                                id="accountnum"
                                type="input"
                                label="Account No."
                                class="w-full bg-primary-50 shadow-md"
                                required
                            />
                        </div>
                        <div class="mb-4">
                            <float-input
                                v-model="newBank.bankname"
                                id="bankname"
                                type="input"
                                label="Bank name"
                                class="w-full bg-primary-50 shadow-md"
                                required
                            />
                        </div>
                        <div class="mb-12">
                            <label>
                                <input
                                    v-model="newBank.default"
                                    type="checkbox"
                                    class="mr-2 rounded"
                                />
                                <span class="label-4">Set as Default</span>
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 pt-12">
                        <custom-button
                            variant="filled"
                            size="xs"
                            class="gap-[10px] rounded"
                            color="yellow"
                        >
                            <p class="label-4 font-semibold">{{ isEdit ? 'Update' : 'Submit' }}</p>
                        </custom-button>
                        <custom-button
                            variant="filled"
                            size="xs"
                            class="gap-[10px] rounded"
                            color="yellow"
                            @click="closeModal"
                        >
                            <p class="label-4 font-semibold">Cancel</p>
                        </custom-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue';
import Sidebar from '../components/ui/Sidebar.vue';
import FloatingLabelInput from '../components/ui/Input.vue';

export default {
    name: 'ProfileBanksPage',
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
        };
    },
    methods: {
        submitForm() {
            if (this.modalType === 'card') {
                if (this.newCard.default) {
                    this.cards.forEach((card) => (card.default = false));
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
            this.cards.splice(index, 1);
        },
        setAsDefault(index) {
            this.cards.forEach((card) => (card.default = false));
            this.cards[index].default = true;
        },
        deleteBank(index) {
            this.banks.splice(index, 1);
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

        maskedCardNumber(cardnum) {
            return `**** **** **** ${cardnum.slice(-4)}`;
        },
        maskedBankNumber(accountnum) {
            return `*${accountnum.slice(-4)}`;
        },
    },
    components: {
        Sidebar,
        'custom-button': Button,
        'float-input': FloatingLabelInput,
    },
};
</script>

<style scoped>
/* Add custom styles here */
.bank-image {
    width: 45px; /* Adjust size as needed */
    height: 45px; /* Adjust size as needed */
    object-fit: cover; /* Maintains aspect ratio and covers the circular area */
    background-color: #d1d5db; /* Fallback background color */
}
</style>
