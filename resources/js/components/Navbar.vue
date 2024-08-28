<!-- resources/js/components/Navbar.vue -->
<template>
    <nav class="h-[60px] bg-neutral-300 text-white">
        <div
            v-if="isAuthenticated"
            class="container border border-red-500 h-full flex flex-row"
        >
            <div class="my-auto">
                <router-link to="/home">
                    <Button>Logo</Button>
                </router-link>
            </div>
            <ul class="m-auto flex flex-row items-center gap-[76px]">
                <li class="label-3 font-bold">
                    <router-link to="/home">Home</router-link>
                </li>
                <li class="label-3 font-bold">
                    <router-link to="/cart">My Cart</router-link>
                </li>
                <li class="label-3 font-bold">
                    <DropDownLink
                        variant="bare"
                        :links="purchaseLinks"
                    >
                        <p class="label-3 font-bold my-auto">My Purchase</p>
                        <i class="bx bxs-down-arrow"></i>
                    </DropDownLink>
                </li>
                <li class="label-3 font-bold">
                    <router-link to="/support">Support Center</router-link>
                </li>
            </ul>
            <DropDownLink
                class="my-auto"
                variant="bare"
                :links="accountLinks"
            >
                <img
                    src="https://cdn.vectorstock.com/i/500p/08/19/gray-photo-placeholder-icon-design-ui-vector-35850819.jpg"
                    alt="test"
                    class="w-[29px] h-[29px] rounded-full"
                />
                <p class="label-3 font-bold my-auto">{{ userName }}</p>
                <i class="bx bxs-down-arrow bx-xs"></i>
            </DropDownLink>
        </div>
        <div
            v-else
            class="container border border-red-500 h-full flex justify-between"
        >
            <div class="my-auto">
                <router-link to="/home">
                    <Button>Logo</Button>
                </router-link>
            </div>
            <div class="flex gap-[8px] my-auto">
                <router-link to="/register">
                    <Button variant="outline"> Sign Up </Button>
                </router-link>
                <router-link to="/login">
                    <Button> Sign In </Button>
                </router-link>
            </div>
        </div>
    </nav>
</template>

<script>
import DropDownLink from '../components/ui/DropDownLink.vue';
import Button from './ui/Button.vue';
export default {
    name: 'Navbar',
    props: {
        isAuthenticated: {
            type: Boolean,
            required: true,
        },
    },
    data() {
        return {
            userName: '',
            purchaseLinks: [
                {
                    text: 'Active Orders',
                    link: '/purchase/active',
                },
                {
                    text: 'Purchase History',
                    link: '/purchase/history',
                },
            ],
            accountLinks: [
                {
                    text: 'My Account',
                    link: '/account/profile',
                },
                {
                    text: 'Log Out',
                    link: '/logout',
                    callback: 'logout',
                },
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
                this.userName = data.user.user_name || 'Guest'; // Adjust according to your user data structure
            } catch (error) {
                console.error('Error fetching user data:', error);
                this.userName = 'Guest'; // Default value if user data can't be fetched
            }
        },
    },
    components: {
        Button,
        DropDownLink,
    },
};
</script>
