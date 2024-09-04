<template>
    <section class="min-h-screen">
        <div class="container mx-auto py-20">
            <div class="flex">
                <!-- Sidebar -->
                <Sidebar></Sidebar>

                <!-- Main Content -->
                <div class="w-3/4 ml-12 px-[38px] py-[36px] bg-neutral-100">
                    <div class="border-b border-black pb-2 mb-4 flex justify-between items-center">
                        <div>
                            <h5 class="font-semibold">My Addresses</h5>
                            <p class="font-semibold label-3 mt-4 text-neutral-400">Manage and protect your account</p>
                        </div>
                        <custom-button
                            variant="filled"
                            size="sm"
                            class="gap-[10px]"
                            color="neutral-400"
                            @click="showModal = true"
                        >
                            <p class="label-4 font-semibold">Add New Address</p>
                            <i class="bx bx-add-to-queue"></i>
                        </custom-button>
                    </div>
                    <h6 class="font-semibold pt-6">Addresses</h6>

                    <!-- Addresses List -->
                    <div v-if="addresses.length > 0">
                        <div
                            v-for="(address, index) in addresses"
                            :key="index"
                            :class="[
                                { 'border-b border-black pb-16': index !== addresses.length - 1 },
                                'mb-4 mt-10 pb-16',
                            ]"
                        >
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-bold label-4">
                                        {{ address.name }} | <span class="text-neutral-400">{{ address.phone }}</span>
                                    </p>
                                    <p class="font-bold label-4 text-neutral-400 mt-4">
                                        {{ address.street }}, {{ address.region }}
                                    </p>
                                    <p class="font-bold label-4 text-neutral-400 mt-4 mb-2">
                                        {{ address.city }}, {{ address.province }}, {{ address.zip }}
                                    </p>
                                    <span
                                        v-if="address.default"
                                        class="text-red-600 font-bold label-4"
                                        >Default</span
                                    >
                                </div>
                                <div class="flex flex-col items-end space-y-2">
                                    <div class="flex space-x-4">
                                        <button
                                            @click="editAddress(index)"
                                            class="text-blue-600 label-4"
                                        >
                                            Edit
                                        </button>
                                        <button
                                            v-if="!address.default"
                                            @click="deleteAddress(index)"
                                            class="text-blue-600 label-4"
                                        >
                                            <span
                                                class="text-black"
                                                style="margin-right: 16px"
                                                >|</span
                                            >Delete
                                        </button>
                                    </div>
                                    <custom-button
                                        v-if="!address.default"
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
                    <p
                        v-else
                        class="label-3"
                    >
                        No addresses added yet. Click "Add New Address" to start adding your addresses.
                    </p>
                </div>
            </div>
        </div>

        <!-- Add/Edit Address Modal -->
        <div
            v-if="showModal"
            class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center"
        >
            <div class="bg-white p-8 rounded shadow-lg max-w-lg w-full">
                <h3 class="text-xl border-b border-black pb-2 font-bold mb-4">
                    {{ isEdit ? 'Edit Address' : 'Add New Address' }}
                </h3>
                <form @submit.prevent="submitAddress">
                    <div class="pt-4 mb-4 flex space-x-2">
                        <float-input
                            v-model="newAddress.name"
                            type="input"
                            label="Full Name"
                            class="w-full w-1/3"
                            required
                        />
                        <float-input
                            v-model="newAddress.phone"
                            type="input"
                            label="Phone Number"
                            class="w-full w-1/3"
                            required
                        />
                    </div>
                    <div class="mb-4 flex space-x-2">
                        <float-input
                            v-model="newAddress.region"
                            type="input"
                            label="Region"
                            class="w-full w-1/3"
                            required
                        />
                        <float-input
                            v-model="newAddress.province"
                            type="text"
                            label="Province"
                            class="w-full w-1/3"
                            required
                        />
                        <float-input
                            v-model="newAddress.city"
                            type="input"
                            label="City"
                            class="w-full w-1/3"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <float-input
                            v-model="newAddress.zip"
                            type="input"
                            label="Postal Code"
                            class="w-full"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <float-input
                            v-model="newAddress.street"
                            type="textarea"
                            label="Street Name, Building No. House No."
                            class="w-full"
                            :style="{ height: '100px' }"
                            required
                        />
                    </div>
                    <div class="mb-4">
                        <label>
                            <input
                                v-model="newAddress.default"
                                type="checkbox"
                                class="mr-2"
                                :disabled="isEdit && newAddress.default"
                            />
                            Set as Default
                        </label>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <custom-button
                            variant="filled"
                            size="sm"
                            class="gap-[10px]"
                            color="neutral-400"
                            @click="closeModal"
                        >
                            <p class="label-4 font-semibold">Cancel</p>
                        </custom-button>

                        <custom-button
                            variant="filled"
                            size="sm"
                            class="gap-[10px]"
                            color="neutral-400"
                        >
                            <p class="label-4 font-semibold">{{ isEdit ? 'Update' : 'Submit' }}</p>
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
    name: 'ProfileAddressPage',
    data() {
        return {
            showModal: false,
            isEdit: false,
            editIndex: null,
            addresses: [],
            newAddress: {
                name: '',
                phone: '',
                region: '',
                province: '',
                city: '',
                zip: '',
                street: '',
                default: false,
            },
        };
    },
    methods: {
        submitAddress() {
            if (this.newAddress.default) {
                this.addresses.forEach((addr) => (addr.default = false));
            }
            if (this.isEdit && this.editIndex !== null) {
                this.addresses.splice(this.editIndex, 1, { ...this.newAddress });
            } else {
                this.addresses.push({ ...this.newAddress });
            }
            this.closeModal();
        },
        editAddress(index) {
            this.isEdit = true;
            this.editIndex = index;
            this.newAddress = { ...this.addresses[index] };
            this.showModal = true;
        },
        deleteAddress(index) {
            if (!this.addresses[index].default) {
                this.addresses.splice(index, 1);
            }
        },
        setAsDefault(index) {
            this.addresses.forEach((addr) => (addr.default = false));
            this.addresses[index].default = true;
        },
        closeModal() {
            this.showModal = false;
            this.isEdit = false;
            this.editIndex = null;
            this.newAddress = {
                name: '',
                phone: '',
                region: '',
                province: '',
                city: '',
                zip: '',
                street: '',
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
.profile-image {
    width: 73px; /* Adjust size as needed */
    height: 73px; /* Adjust size as needed */
    border-radius: 100%; /* Ensures the image is circular */
    object-fit: cover; /* Maintains aspect ratio and covers the circular area */
    background-color: #d1d5db; /* Fallback background color */
}
</style>
