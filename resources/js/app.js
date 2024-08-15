// Importing Vue
import { createApp } from "vue";

// Importing components
import LandingPage from "./components/LandingPage.vue";
import SignUpPage from "./components/SignUpPage.vue";
import SignInPage from "./components/SignInPage.vue";
import CartPage from "./components/CartPage.vue";
import PurchasePage from "./components/PurchasePage.vue";
import ComparePage from "./components/ComparePage.vue";
import AccountPage from "./components/AccountPage.vue";
import ActiveOrderPage from "./components/ActiveOrderPage.vue";
import PurchaseHistoryPage from "./components/PurchaseHistoryPage.vue";
import SupportPage from "./components/SupportPage.vue";
import SubscriptionPage from "./components/SubscriptionPage.vue";
import ProfilePage from "./components/ProfilePage.vue";
import SettingsPage from "./components/SettingsPage.vue";
import CheckoutPage from "./components/CheckoutPage.vue";

// Creating a new Vue application instance
const app = createApp({});

// Registering components globally
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

// Mounting the Vue application to the DOM element with id="app"
app.mount("#app");
