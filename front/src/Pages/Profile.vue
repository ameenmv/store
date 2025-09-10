<template>
  <div>
    <Navbar />
    <div class="py-20">
      <div class="containerr">
        <div class="breadcrum py-10 flex justify-between items-center">
          <p>Home &ensp;/&ensp; About</p>
          <p>Welcome <span class="text-[var(--red)]">Ameen</span></p>
        </div>
        <div class="mt-8 flex justify-between">
          <div class="w-[20%]">
            <p class="font-medium">Manage My Account</p>
            <div class="pl-8">
              <p class="text-[black] opacity-[.8] mt-4">My Profile</p>
              <p class="text-[black] opacity-[.8] mt-2">Address Book</p>
              <p class="text-[black] opacity-[.8] mt-2">My Payment Options</p>
            </div>
            <p class="font-medium mt-5">Manage My Account</p>
            <div class="pl-8">
              <p class="text-[black] opacity-[.8] mt-4">My Returns</p>
              <p class="text-[black] opacity-[.8] mt-2">My Cancellations</p>
            </div>
            <p class="font-medium mt-5">My WishList</p>
          </div>
          <div class="w-[70%] pt-8">
            <p class="font-medium text-[var(--red)] text-[20px]">
              Edit Your Profile
            </p>
            <div class="mt-5 flex gap-14">
              <div class="flex flex-col">
                <label for="" class="">First Name</label>
                <input
                  class="py-3 pr-[50px] mt-2 px-4 w-[350px] bg-[var(--input)] outline-none rounded-[5px]"
                  type="text"
                  name=""
                  id=""
                />
              </div>
              <div class="flex flex-col">
                <label for="" class="">Last Name</label>
                <input
                  class="py-3 pr-[50px] mt-2 px-4 w-[350px] bg-[var(--input)] outline-none rounded-[5px]"
                  type="text"
                  name=""
                  id=""
                />
              </div>
            </div>
            <div class="mt-6 flex gap-14">
              <div class="flex flex-col">
                <label for="" class="">Email</label>
                <input
                  class="py-3 pr-[50px] mt-2 px-4 w-[350px] bg-[var(--input)] outline-none rounded-[5px]"
                  type="email"
                  name=""
                  id=""
                />
              </div>
              <div class="flex flex-col">
                <label for="" class="">Address</label>
                <input
                  class="py-3 pr-[50px] mt-2 px-4 w-[350px] bg-[var(--input)] outline-none rounded-[5px]"
                  type="address"
                  name=""
                  id=""
                />
              </div>
            </div>
            <div class="mt-6">
              <div class="flex flex-col">
                <label for="" class="">Password Change</label>
                <input
                  placeholder="Current Password"
                  class="py-3 pr-[50px] mt-2 px-4 w-[85%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="email"
                  name=""
                  id=""
                />
                <input
                  placeholder="New Password"
                  class="py-3 pr-[50px] mt-4 px-5 w-[85%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="email"
                  name=""
                  id=""
                />
                <input
                  placeholder="Confirm New Password"
                  class="py-3 pr-[50px] mt-4 px-5 w-[85%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="email"
                  name=""
                  id=""
                />
              </div>
            </div>
            <div
              class="mt-14 mr-[130px] place-self-end flex gap-10 justify-center items-center"
            >
              <p class="font-mdeium">Cencel</p>
              <button class="btn">Save Changes</button>
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

<style lang="scss" scoped></style>
