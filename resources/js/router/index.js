import { createRouter, createWebHistory } from'vue-router';
import LandingPage from '../pages/LandingPage.vue';
import SignUpPage from '../pages/SignUpPage.vue';
import SignInPage from '../pages/SignInPage.vue';
import CartPage from '../pages/CartPage.vue';
import CheckoutPage from '../pages/CheckoutPage.vue';
import ActiveOrderPage from '../pages/ActiveOrderPage.vue';
import PurchaseHistoryPage from '../pages/PurchaseHistoryPage.vue';
import SupportPage from '../pages/SupportPage.vue';
import SubscriptionPage from '../pages/SubscriptionPage.vue';
import ProfilePage from '../pages/ProfilePage.vue';
import HomePage from '../pages/HomePage.vue';
import AboutPage from '../pages/AboutPage.vue';
import SearchProductPage from '../pages/SearchProductPage.vue';
import ProductPage from '../pages/ProductPage.vue';
import RegisterInformationPage from '../pages/RegisterInformationPage.vue';

const routes = [
    { path: '/', name: 'landing', component: LandingPage },
    { path: '/register', name: 'signup', component: SignUpPage },
    { path: '/login', name: 'signin', component: SignInPage },
    { path: '/cart', name: 'cart', component: CartPage },
    { path: '/checkout', name: 'checkout', component: CheckoutPage },
    { path: '/support', name: 'support', component: SupportPage },
    { path: '/register/info', name: 'registerinfo', component: RegisterInformationPage },
    { path: '/purchase/active', name: 'activeorder', component: ActiveOrderPage },
    { path: '/purchase/history', name: 'purchasehistory', component: PurchaseHistoryPage },
    { path: '/account/profile', name: 'profile', component: ProfilePage },
    { path: '/account/subscription', name: 'subscription', component: SubscriptionPage },
    { path: '/home', name: 'home', component: HomePage },
    { path: '/about', name: 'about', component: AboutPage },
    { path: '/search', name: 'seachproduct', component: SearchProductPage },
    { path: '/search/product', name: 'product', component: ProductPage },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;