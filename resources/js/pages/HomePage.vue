<template>
    <div>
        <h1>Welcome to our Home Page!</h1>
        <h2>This page's development hasn't started yet.</h2>

        <!-- Display the username if available -->
        <h3 v-if="userName">Hello, {{ userName }}!</h3>

        <!-- Logout button -->
        <form @submit.prevent="logout">
            <button type="submit">Logout</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "HomePage",
    data() {
        return {
            userName: '',
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
        async logout() {
            try {
                const response = await fetch('/logout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken
                    }
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }

                window.location.href = '/login'; // Redirect after logout
            } catch (error) {
                console.error('Error logging out:', error);
            }
        }
    }
};
</script>

<style scoped>
/* Add styles here */
</style>
