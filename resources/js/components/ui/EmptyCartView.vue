<template>
    <div class="container flex gap-11 py-10">
        <img
            src="/assets/empty_cart_graphic.png"
            alt="Empty cart graphic"
        />

        <div class="flex flex-col gap-11 justify-center">
            <h1 class="font-extrabold">Your cart seems as <span class="text-primary-500">empty</span> as a desert!</h1>
            <p class="text-neutral-400">
                It looks like you haven&apos;t picked anything yet. Why not explore our amazing products and start
                filling it up? Happy shopping!
            </p>

            <RouterLink to="/home">
                <Button
                    variant="filled"
                    color="yellow"
                    class="w-fit"
                >
                    <span class="font-extrabold label"> Go Shopping Now </span>
                </Button>
            </RouterLink>
        </div>
    </div>
</template>

<script>
import { RouterLink } from 'vue-router';
import Button from './Button.vue';

export default {
    name: 'EmptyCartView',
    components: {
        Button,
    },
};
</script>
