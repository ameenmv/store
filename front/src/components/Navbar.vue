<template>
  <div class="pt-8 border-b border-[var(--border)] !pb-5">
    <div class="containerr flex justify-between items-center">
      <router-link to="/"
        ><div class="logo font-bold text-[25px]">Exclusive</div></router-link
      >
      <div class="links flex gap-8 items-center">
        <router-link to="/"><p class="cursor-pointer">Home</p></router-link>
        <router-link to="/contact"
          ><p class="cursor-pointer">Contact</p></router-link
        >
        <router-link to="about"
          ><p class="cursor-pointer">About</p></router-link
        >
        <router-link v-if="token === null" to="/register">
          <p class="cursor-pointer">Sign Up</p>
        </router-link>

        <p @click="logOut" v-if="token !== null" class="cursor-pointer">
          Log Out
        </p>
      </div>
      <div class="flex gap-5 items-center">
        <div class="relative">
          <input
            type="text"
            placeholder="What are you looking for?"
            class="px-4 py-2 outline-none bg-[var(--bg)] rounded-[8px] w-fit-content min-w-[280px] w-[100%]"
          />
          <svg
            width="20px"
            class="absolute top-[25%] right-[20px] opacity-[.8]"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 640 640"
          >
            <path
              d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"
            />
          </svg>
        </div>

        <router-link to="/cart" class="flex"
          ><svg
            width="25px"
            class="cursor-pointer"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 640 640"
          >
            <path
              d="M24 48C10.7 48 0 58.7 0 72C0 85.3 10.7 96 24 96L69.3 96C73.2 96 76.5 98.8 77.2 102.6L129.3 388.9C135.5 423.1 165.3 448 200.1 448L456 448C469.3 448 480 437.3 480 424C480 410.7 469.3 400 456 400L200.1 400C188.5 400 178.6 391.7 176.5 380.3L171.4 352L475 352C505.8 352 532.2 330.1 537.9 299.8L568.9 133.9C572.6 114.2 557.5 96 537.4 96L124.7 96L124.3 94C119.5 67.4 96.3 48 69.2 48L24 48zM208 576C234.5 576 256 554.5 256 528C256 501.5 234.5 480 208 480C181.5 480 160 501.5 160 528C160 554.5 181.5 576 208 576zM432 576C458.5 576 480 554.5 480 528C480 501.5 458.5 480 432 480C405.5 480 384 501.5 384 528C384 554.5 405.5 576 432 576z"
            /></svg
        ></router-link>
        <router-link to="/profile"
          ><p v-if="token !== null" class="cursor-pointer">
            <svg
              width="25px"
              fill="black"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 640 640"
            >
              <path
                d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"
              />
            </svg></p
        ></router-link>
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
      localStorage.removeItem("orderId");
      this.token = null;
      const store = useCartStore();
      store.clearCart();
      this.$router.push("/login");
    },
  },
};
</script>

<style lang="scss" scoped></style>
