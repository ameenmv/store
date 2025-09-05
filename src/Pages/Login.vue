<template>
  <div>
    <Navbar />
    <div class="pt-14 pb-30 flex">
      <div class="left w-[55%] flex justify-center items-center bg-[#CBE4E8]">
        <img class="w-[65%] pt-20" src="../assets/login.jpg" alt="" />
      </div>
      <div class="left w-[45%] p-20 px-40 flex flex-col justify-center">
        <h1 class="text-[36px] font-medium">Login in To Exclusive</h1>
        <p class="mt-3 text-[18px]">Enter your details below</p>
        <div class="mt-8">
          <input
            class="border-[none] pb-2 w-[100%] border-b border-[var(--border)] outline-none"
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
          <div class="flex mt-10 justify-between items-center">
            <button class="btn">Log in</button>
            <p class="text-[var(--red)]">Forger Password?</p>
          </div>

          <p class="m-auto mt-8 flex justify-center">
            didn't have account?&nbsp;&nbsp;
            <router-link to="register"
              ><span
                class="pb-1 cursor-pointer border-b border-[var(--border)] font-medium"
                >Sign Up</span
              ></router-link
            >
          </p>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script setup>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";
</script>

<style lang="scss" scoped></style>
