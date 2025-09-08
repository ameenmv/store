<template>
  <div>
    <Navbar />
    <div class="pt-14 pb-30 flex">
      <div class="left w-[55%] flex justify-center items-center bg-[#CBE4E8]">
        <img class="w-[65%] pt-20" src="../assets/login.jpg" alt="" />
      </div>
      <div class="left w-[45%] p-20 px-40 flex flex-col justify-center">
        <h1 class="text-[36px] font-medium">Create an account</h1>
        <p class="mt-3 text-[18px]">Enter your details below</p>
        <form @submit="onSubmit" class="mt-8">
          <input
            class="border-[none] pb-2 w-[100%] border-b border-[var(--border)] outline-none"
            type="name"
            name=""
            id=""
            placeholder="Name"
          />

          <input
            class="border-[none] pb-2 mt-10 w-[100%] border-b border-[var(--border)] outline-none"
            type=""
            name=""
            id=""
            placeholder="Email or Phone Number"
          />
          <input
            class="border-[none] pb-2 mt-10 w-[100%] border-b border-[var(--border)] outline-none"
            type="password"
            name=""
            id=""
            placeholder="Password"
          />
          <button type="sybmit" class="btn mt-10 w-[100%]">
            Create Account
          </button>

          <button
            style="background: transparent"
            class="btn !text-[black] mt-6 w-[100%] flex justify-center items-center border border-[var(--border)]"
          >
            <svg
              width="25px"
              fill="black"
              class="mr-2"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 640 640"
            >
              <path
                d="M564 325.8C564 467.3 467.1 568 324 568C186.8 568 76 457.2 76 320C76 182.8 186.8 72 324 72C390.8 72 447 96.5 490.3 136.9L422.8 201.8C334.5 116.6 170.3 180.6 170.3 320C170.3 406.5 239.4 476.6 324 476.6C422.2 476.6 459 406.2 464.8 369.7L324 369.7L324 284.4L560.1 284.4C562.4 297.1 564 309.3 564 325.8z"
              />
            </svg>
            <p>Sign up with Google</p>
          </button>
          <p class="m-auto mt-6 flex justify-center">
            Already have account?&nbsp;&nbsp;
            <router-link to="login"
              ><span
                class="pb-1 cursor-pointer border-b border-[var(--border)] font-medium"
                >Log in</span
              ></router-link
            >
          </p>
        </form>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";

import { required, minLength, maxLength } from "@vuelidate/validators";

export default {
  components: {
    Navbar,
    Footer,
  },
};
</script>

<style lang="scss" scoped></style>
