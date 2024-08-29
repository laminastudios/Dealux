<template>
    <section class="min-h-screen">
        <div class="container border border-blue-500 h-full flex flex-col items-center justify-center">
            <h1 class="text-2xl font-bold mb-4">Maayong gabii</h1>
            <h2 class="text-xl mb-6">This page's development has started!</h2>
            <!-- Add more content here -->
            <form
                action="/checkout"
                method="POST"
                class="w-full max-w-sm"
            >
                <input
                    type="hidden"
                    name="_token"
                    :value="csrfToken"
                />
                <button
                    type="submit"
                    class="btn-primary"
                >
                    Checkout
                </button>
            </form>
        </div>
    </section>
</template>

<script>
export default {
    name: 'CheckoutPage',
    data() {
        return {
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        };
    },
};
</script>

<style scoped>
h1,
h2 {
    color: #333;
    text-align: center;
}
.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 0.375rem;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.btn-primary:hover {
    background-color: #0056b3;
}
</style>
