import { createRouter, createWebHistory } from "vue-router";
import Home from "../Pages/Home.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
];

const router = createRouter({
  history: createWebHistory(), // دي مهمة جداً عشان ال URL يتغير بشكل طبيعي
  routes,
});

export default router;
