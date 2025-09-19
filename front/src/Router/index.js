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
import Category from "../Pages/Category.vue";

import CompanyDashboard from "../Pages/CompanyDashboard.vue";
import AdminDashboard from "../Pages/AdminDashboard.vue";

const allowedCategories = [
  "all",
  "phones",
  "computers",
  "smartwatch",
  "camera",
  "gaming",
  "headphones",
];

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
    meta: { role: "customer" },
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
    meta: { role: "customer" },
  },
  {
    path: "/cart",
    name: "Cart",
    component: Cart,
    meta: { role: "customer" },
  },
  {
    path: "/cart/checkout",
    name: "Checkout",
    component: Checkout,
    meta: { role: "customer" },
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
    meta: { role: "customer" },
  },
  {
    path: "/company",
    name: "CompanyDashboard",
    component: CompanyDashboard,
    meta: { role: "company" },
  },
  {
    path: "/admin",
    name: "AdminDashboard",
    component: AdminDashboard,
    meta: { role: "admin" },
  },
  {
    path: "/:category",
    name: "Category",
    component: Category,
    beforeEnter: (to, from, next) => {
      if (allowedCategories.includes(to.params.category.toLowerCase())) {
        next();
      } else {
        next({ name: "NotFound" });
      }
    },
  },
  {
    path: "/:category/:id",
    name: "ProductDetails",
    component: ProductDetails,
    props: true,
  },
  { path: "/:pathMatch(.*)*", name: "NotFound", component: error },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// 🚨 الحماية بالـ Router Guards
router.beforeEach((to, from, next) => {
  const token = localStorage.getItem("token");
  const role = localStorage.getItem("role");

  if (!token && to.name !== "Login" && to.name !== "register") {
    return next({ name: "Login" });
  }

  if (to.meta.role && to.meta.role !== role) {
    return next({ name: "NotFound" });
  }

  next();
});

export default router;
