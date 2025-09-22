<template>
  <div class="pt-8 border-b border-[var(--border)] !pb-5">
    <div class="containerr flex justify-between items-center">
      <router-link to="/"
        ><div class="logo font-bold text-[25px]">Exclusive</div></router-link
      >

      <div class="flex gap-5">
        <p class="cursor-pointer font-bold text-[20px]" @click="logOut">
          Logout
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { useCartStore } from "../Stores/Products";

export default {
  data() {
    return {
      token: localStorage.getItem("token"),
    };
  },
  methods: {
    logOut() {
      localStorage.removeItem("token");
      localStorage.removeItem("role");
      localStorage.removeItem("userId");
      this.token = null;
      const store = useCartStore();
      store.clearCart();
      this.$router.push("/login");
    },
  },
};
</script>

<style lang="scss" scoped></style>
