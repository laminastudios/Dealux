<template>
    <section class="min-h-screen bg-background flex items-center justify-center">
        <div class="container text-center">
            <div class="flex flex-col items-center md:flex-row">
                <img
                    src="/assets/404.png"
                    alt="Error Robot"
                    style="width: 488px; height: 445px"
                    class="pl-10"
                />
                <div class="text-left pl-[104px] mr-10">
                    <h1 class="font-extrabold mb-7 mt-12">Oops,</h1>
                    <h1 class="font-extrabold text-primary-500 mb-7">
                        nothing <span class="text-black">here...</span>
                    </h1>
                    <h6
                        class="label-1 font-semibold text-neutral-400 mt-6"
                        style="line-height: 1.5"
                    >
                        Looks like the page you're searching for took a detour. Maybe it's lost in cyberspace or never
                        existed at all. But don't worry, let's get you back on track!
                    </h6>

                    <custom-button
                        variant="filled"
                        size="lg"
                        class="mt-10"
                        :style="{ backgroundColor: '#0F6DD7' }"
                        @click="$router.push('/home')"
                    >
                        <p class="label-2 font-extrabold text-white rounded-md">Go Back to Home Page</p>
                    </custom-button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Button from '../components/ui/Button.vue';

export default {
    name: 'Page-NotFound',
    components: {
        'custom-button': Button,
    },
};
</script>

<style scoped></style>
