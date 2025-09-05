import { createRouter, createWebHistory } from "vue-router";
import Home from "../Pages/Home.vue";
import Register from "../Pages/Register.vue";
import Login from "../Pages/Login.vue";
import Wishlist from "../Pages/Wishlist.vue";
import Cart from "../Pages/Cart.vue";
import Checkout from "../Pages/Checkout.vue";

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
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
