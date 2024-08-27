<!-- resources/js/components/Navbar.vue -->
<template>
    <nav class="h-[60px] bg-neutral-300">
        <div
            v-if="isAuthenticated"
            class="container border border-red-500 h-full flex flex-row"
        >
            <div class="my-auto">
                <router-link to="/home">
                    <Button>Logo</Button>
                </router-link>
            </div>
            <ul class="m-auto flex flex-row gap-[76px]">
                <li class="label-3 font-bold">
                    <router-link to="/home">Home</router-link>
                </li>
                <li class="label-3 font-bold">
                    <router-link to="/cart">My Cart</router-link>
                </li>
                <li class="label-3 font-bold">
                    <router-link to="#">My Purchase</router-link>
                </li>
                <li class="label-3 font-bold">
                    <router-link to="/support">Support Center</router-link>
                </li>
            </ul>
            <div class="my-auto">
                <button>Username</button>
            </div>
        </div>
        <div
            v-else
            class="container border border-red-500 h-full flex justify-between"
        >
            <div class="my-auto">
                <button>Logo</button>
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
import Button from './ui/Button.vue';
export default {
    name: 'Navbar',
    props: {
        isAuthenticated: {
            type: Boolean,
            required: true,
        },
    },
    components: {
        Button,
    },
};
</script>
