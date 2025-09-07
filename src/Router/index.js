import { createRouter, createWebHistory } from "vue-router";
import Home from "../Pages/Home.vue";
import Register from "../Pages/Register.vue";
import Login from "../Pages/Login.vue";
import Wishlist from "../Pages/Wishlist.vue";
import Cart from "../Pages/Cart.vue";
import Checkout from "../Pages/Checkout.vue";
import About from "../Pages/About.vue";
import Contact from "../Pages/Contact.vue";
import Profile from "../Pages/Profile.vue";
import error from "../Pages/Error.vue";
import ProductDetails from "../Pages/ProductDetails.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/register",
    name: "register",
    component: Register,
  },
  {
    path: "/login",
    name: "Login",
    component: Login,
  },
  {
    path: "/wishlist",
    name: "Wishlist",
    component: Wishlist,
  },
  {
    path: "/cart",
    name: "Cart",
    component: Cart,
  },
  {
    path: "/cart/checkout",
    name: "Checkout",
    component: Checkout,
  },
  {
    path: "/about",
    name: "About",
    component: About,
  },
  {
    path: "/contact",
    name: "Contact",
    component: Contact,
  },
  {
    path: "/profile",
    name: "Profile",
    component: Profile,
  },
  {
    path: "/details",
    name: "ProductDetails",
    component: ProductDetails,
  },
  { path: "/:pathMatch(.*)*", name: "NotFound", component: error },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
