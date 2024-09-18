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
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue';
import ProfileSidebar from '../components/ui/ProfileSidebar.vue';
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
        ProfileSidebar,
        'custom-button': Button,
        'float-input': FloatingLabelInput,
    },
};
</script>

<style scoped></style>
