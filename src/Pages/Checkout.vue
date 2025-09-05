<template>
  <div>
    <Navbar />
    <div class="py-20">
      <div class="containerr">
        <div class="breadcrum py-10">
          <p>Home &ensp;/&ensp; Cart &ensp;/&ensp; Checkout</p>
        </div>
        <div class="flex justify-between mt-6">
          <div class="form w-[42%]">
            <h1 class="text-[36px] font-semibold mb-8">Biliing Details</h1>
            <div class="flex flex-col w-[100%] gap-5">
              <div>
                <label for="" class="text-[var(--border)]"
                  >First Name<span class="text-[var(--red)]">*</span></label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--bg)] outline-none rounded-[5px]"
                  type="text"
                  name=""
                  id=""
                />
              </div>
              <div>
                <label for="" class="text-[var(--border)]">Company Name</label>
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--bg)] outline-none rounded-[5px]"
                  type="text"
                  name=""
                  id=""
                />
              </div>
              <div>
                <label for="" class="text-[var(--border)]"
                  >Streat Address<span class="text-[var(--red)]">*</span></label
                >

                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--bg)] outline-none rounded-[5px]"
                  type="text"
                  name=""
                  id=""
                />
              </div>
              <div>
                <label for="" class="text-[var(--border)]"
                  >Apartment, floor, etc. (optional)
                </label>
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--bg)] outline-none rounded-[5px]"
                  type="text"
                  name=""
                  id=""
                />
              </div>
              <div>
                <label for="" class="text-[var(--border)]"
                  >Town / City<span class="text-[var(--red)]">*</span></label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--bg)] outline-none rounded-[5px]"
                  type="text"
                  name=""
                  id=""
                />
              </div>
              <div>
                <label for="" class="text-[var(--border)]"
                  >Phone Number<span class="text-[var(--red)]">*</span></label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--bg)] outline-none rounded-[5px]"
                  type="text"
                  name=""
                  id=""
                />
              </div>
              <div>
                <label for="" class="text-[var(--border)]"
                  >Email Address<span class="text-[var(--red)]">*</span></label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--bg)] outline-none rounded-[5px]"
                  type="text"
                  name=""
                  id=""
                />
              </div>
            </div>
          </div>
          <div class="w-[42%] pt-20">
            <div class="py-4 flex justify-between items-center gap-6 !w-full">
              <div class="flex gap-5 items-center">
                <img
                  class="w-[50px] h-[50px]"
                  src="../assets/product.png"
                  alt=""
                />
                <p>H1 Gamepad</p>
              </div>
              <p>$650</p>
            </div>
            <div class="py-4 flex justify-between items-center gap-6 !w-full">
              <div class="flex gap-5 items-center">
                <img
                  class="w-[50px] h-[50px]"
                  src="../assets/product.png"
                  alt=""
                />
                <p>H1 Gamepad</p>
              </div>
              <p>$650</p>
            </div>

            <div
              class="pb-2 mt-4 border-b border-[var(--border)] flex justify-between"
            >
              <p>Subtotal:</p>
              <p>$1750</p>
            </div>
            <div
              class="pb-2 mt-4 border-b border-[var(--border)] flex justify-between"
            >
              <p>shipping:</p>
              <p>free</p>
            </div>
            <div class="pb-2 mt-4 flex justify-between">
              <p>Total</p>
              <p>$1750</p>
            </div>
          </div>
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

<style lang="scss" scoped>
th,
td {
  text-align: left;
  width: 25%;
}
</style>
