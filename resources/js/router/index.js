import { createRouter, createWebHistory } from'vue-router';
import LandingPage from '../pages/LandingPage.vue';
import SignUpPage from '../pages/SignUpPage.vue';
import SignInPage from '../pages/SignInPage.vue';
import CartPage from '../pages/CartPage.vue';
import CheckoutPage from '../pages/CheckoutPage.vue';
import ComparePage from '../pages/ComparePage.vue';
import PurchasePage from '../pages/PurchasePage.vue';
import ActiveOrderPage from '../pages/ActiveOrderPage.vue';
import PurchaseHistoryPage from '../pages/PurchaseHistoryPage.vue';
import AccountPage from '../pages/AccountPage.vue';
import SupportPage from '../pages/SupportPage.vue';
import SubscriptionPage from '../pages/SubscriptionPage.vue';
import ProfilePage from '../pages/ProfilePage.vue';
import SettingsPage from '../pages/SettingsPage.vue';

const routes = [
    { path: '/', name: 'landing', component: LandingPage },
    { path: '/signup', name: 'signup', component: SignUpPage },
    { path: '/signin', name: 'signin', component: SignInPage },
    { path: '/cart', name: 'cart', component: CartPage },
    { path: '/checkout', name: 'checkout', component: CheckoutPage },
    { path: '/compare', name: 'compare', component: ComparePage },
    { path: '/purchase', name: 'purchase', component: PurchasePage },
    { path: '/purchase/active', name: 'activeorder', component: ActiveOrderPage },
    { path: '/purchase/history', name: 'purchasehistory', component: PurchaseHistoryPage },
    { path: '/account', name: 'account', component: AccountPage },
    { path: '/account/support', name: 'support', component: SupportPage },
    { path: '/account/subscription', name: 'subscription', component: SubscriptionPage },
    { path: '/account/profile', name: 'profile', component: ProfilePage },
    { path: '/account/settings', name: 'settings', component: SettingsPage },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
