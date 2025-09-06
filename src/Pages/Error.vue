<template>
  <div>
    <Navbar />
    <div class="py-20">
      <div class="containerr">
        <div class="breadcrum py-10">
          <p>Home &ensp;/&ensp; About</p>
        </div>
        <div class="py-20 flex flex-col gap-10 justify-center items-center">
          <p class="text-[110px] font-bold">404 Not Found</p>
          <p class="font-medium">
            Your visited page not found. You may go home page.
          </p>
          <router-link to="/">
            <div class="btn mt-8">Back to home page</div>
          </router-link>
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
