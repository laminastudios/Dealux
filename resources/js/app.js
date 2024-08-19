// Importing Vue
import { createApp } from "vue";

// Importing the Vue-router
import router from "./router";

// Importing pages
import LandingPage from "./pages/LandingPage.vue";
import SignUpPage from "./pages/SignUpPage.vue";
import SignInPage from "./pages/SignInPage.vue";
import CartPage from "./pages/CartPage.vue";
import PurchasePage from "./pages/PurchasePage.vue";
import ComparePage from "./pages/ComparePage.vue";
import AccountPage from "./pages/AccountPage.vue";
import ActiveOrderPage from "./pages/ActiveOrderPage.vue";
import PurchaseHistoryPage from "./pages/PurchaseHistoryPage.vue";
import SupportPage from "./pages/SupportPage.vue";
import SubscriptionPage from "./pages/SubscriptionPage.vue";
import ProfilePage from "./pages/ProfilePage.vue";
import SettingsPage from "./pages/SettingsPage.vue";
import CheckoutPage from "./pages/CheckoutPage.vue";
import HomePage from "./pages/HomePage.vue";

// Creating a new Vue application instance
const app = createApp({});

// Registering pages globally
app.component("landing-page", LandingPage); // Registers LandingPage component

app.component("signup-page", SignUpPage); // Registers SignUpPage component

app.component("signin-page", SignInPage); // Registers SignInPage component

app.component("cart-page", CartPage); // Registers CartPage component

app.component("checkout-page", CheckoutPage); // Registers CheckoutPage component

app.component("compare-page", ComparePage); // Registers ComparePage component

app.component("purchase-page", PurchasePage); // Registers PurchasePage component
app.component("activeorder-page", ActiveOrderPage); // Registers ActiveOrderPage component
app.component("purchasehistory-page", PurchaseHistoryPage); // Registers PurchaseHistoryPage component

app.component("account-page", AccountPage); // Registers AccountPage component
app.component("support-page", SupportPage); // Registers SupportPage component
app.component("subscription-page", SubscriptionPage); // Registers SubscriptionPage component
app.component("profile-page", ProfilePage); // Registers ProfilePage component
app.component("settings-page", SettingsPage); // Registers SettingsPage component

app.component("home-page", HomePage); // Registers HomePage component

// Using the Vue Router
app.use(router);

// Mounting the Vue application to the DOM element with id="app"
app.mount("#app");
