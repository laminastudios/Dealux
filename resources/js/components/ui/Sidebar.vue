<template>
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
                    <router-link
                        to="/account/profile"
                        class="label-2 font-bold flex items-center"
                        :class="
                            isActive('/account/profile')
                                ? 'text-warning-600'
                                : 'text-neutral-500 hover:text-warning-600'
                        "
                    >
                        <span class="w-6"></span>
                        <span class="ml-2">Profile</span>
                    </router-link>
                </li>
                <li class="py-2">
                    <router-link
                        to="/account/banks"
                        class="label-2 font-bold flex items-center"
                        :class="isActive('/') ? 'text-warning-600' : 'text-neutral-500 hover:text-warning-600'"
                    >
                        <span class="w-6"></span>
                        <span class="ml-2">Banks and Cards</span>
                    </router-link>
                </li>
                <li class="py-2">
                    <router-link
                        to="/account/address"
                        class="label-2 font-bold flex items-center"
                        :class="
                            isActive('/account/address')
                                ? 'text-warning-600'
                                : 'text-neutral-500 hover:text-warning-600'
                        "
                    >
                        <span class="w-6"></span>
                        <span class="ml-2">Addresses</span>
                    </router-link>
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
</template>

<script>
export default {
    name: 'Sidebar',
    data() {
        return {
            imageSrc: 'path/to/placeholder-image.jpg', // Default placeholder image
        };
    },
    methods: {
        isActive(route) {
            return this.$route.path === route;
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
