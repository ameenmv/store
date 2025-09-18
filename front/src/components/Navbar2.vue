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
        <!-- <svg
          width="25px"
          fill="black"
          class="cursor-pointer"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 640 640"
        >
          <path
            d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"
          />
        </svg> -->
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
      this.token = null;
      const store = useCartStore();
      store.clearCart();
      this.$router.push("/login");
    },
  },
};
</script>

<style lang="scss" scoped></style>
