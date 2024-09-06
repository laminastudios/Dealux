<template>
    <div class="w-1/4 pt-16 bg-background">
        <div class="flex items-center">
            <img
                :src="'https://placehold.co/84x67'"
                alt="Profile Picture"
                class="ml-1 profile-image"
            />
            <input
                type="file"
                @change="handleImageUpload"
                accept="image/*"
                style="display: none"
                ref="fileInput"
            />
            <div class="flex flex-col ml-7 font-bold label-1">
                <span id="USERNAME">Username</span>
                <button class="text-neutral-400 font-bold label-1 mt-2">
                    <i class="bx bx-pencil"></i> Edit Profile
                </button>
            </div>
        </div>
        <nav class="mt-6 ml-2">
            <ul class="text-lg">
                <li class="py-2">
                    <a
                        href="#"
                        class="label-1 font-bold text-black hover:text-warning-600 flex items-center"
                    >
                        <i class="bx bxs-user w-6"></i>
                        <span class="ml-2">My Account</span>
                    </a>
                </li>

                <li class="py-2">
                    <router-link
                        to="/account/profile"
                        class="label-1 font-bold flex items-center"
                        :class="
                            isActive('/account/profile') ? 'text-yellow-400' : 'text-neutral-500 hover:text-warning-600'
                        "
                    >
                        <span class="w-6"></span>
                        <span class="ml-2">Profile</span>
                    </router-link>
                </li>
                <li class="py-2">
                    <router-link
                        to="/account/banks"
                        class="label-1 font-bold flex items-center"
                        :class="
                            isActive('/account/banks') ? 'text-yellow-400' : 'text-neutral-500 hover:text-warning-600'
                        "
                    >
                        <span class="w-6"></span>
                        <span class="ml-2">Banks and Cards</span>
                    </router-link>
                </li>
                <li class="py-2">
                    <router-link
                        to="/account/address"
                        class="label-1 font-bold flex items-center"
                        :class="
                            isActive('/account/address') ? 'text-yellow-400' : 'text-neutral-500 hover:text-warning-600'
                        "
                    >
                        <span class="w-6"></span>
                        <span class="ml-2">Addresses</span>
                    </router-link>
                </li>
                <li class="py-2 mt-2">
                    <a
                        href="#"
                        class="label-1 font-bold text-black flex hover:text-warning-600 items-center"
                    >
                        <i class="bx bx-crown w-6"></i>
                        <span class="ml-2">Subscription</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'Sidebar',
    methods: {
        isActive(route) {
            return this.$route.path === route;
        },
    },
};
</script>

<style scoped>
.profile-image {
    width: 73px; /* Adjust size as needed */
    height: 73px; /* Adjust size as needed */
    border-radius: 100%; /* Ensures the image is circular */
    object-fit: cover; /* Maintains aspect ratio and covers the circular area */
    background-color: #d1d5db; /* Fallback background color */
}
</style>
