import { createRouter, createWebHistory } from'vue-router';
import LandingPage from '../pages/LandingPage.vue';
import SignUpPage from '../pages/SignUpPage.vue';
import SignInPage from '../pages/SignInPage.vue';
import CartPage from '../pages/CartPage.vue';
import CheckoutPage from '../pages/CheckoutPage.vue';
import ComparePage from '../pages/ComparePage.vue';
import ActiveOrderPage from '../pages/ActiveOrderPage.vue';
import PurchaseHistoryPage from '../pages/PurchaseHistoryPage.vue';
import SupportPage from '../pages/SupportPage.vue';
import SubscriptionPage from '../pages/SubscriptionPage.vue';
import ProfilePage from '../pages/ProfilePage.vue';
import HomePage from '../pages/HomePage.vue';
import AboutPage from '../pages/AboutPage.vue';

const routes = [
    { path: '/', name: 'landing', component: LandingPage },
    { path: '/register', name: 'signup', component: SignUpPage },
    { path: '/login', name: 'signin', component: SignInPage },
    { path: '/cart', name: 'cart', component: CartPage },
    { path: '/subscription', name: 'subscription', component: SubscriptionPage },
    { path: '/checkout', name: 'checkout', component: CheckoutPage },
    { path: '/compare', name: 'compare', component: ComparePage },
    { path: '/purchase/active', name: 'activeorder', component: ActiveOrderPage },
    { path: '/purchase/history', name: 'purchasehistory', component: PurchaseHistoryPage },
    { path: '/account/support', name: 'support', component: SupportPage },
    { path: '/account/profile', name: 'profile', component: ProfilePage },
    { path: '/home', name: 'home', component: HomePage },
    { path: '/about', name: 'about', component: AboutPage },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
