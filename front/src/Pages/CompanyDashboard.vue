<template>
  <div>
    <navbar2 />
    <div class="bg-[#F6F8FA] h-[100vh]">
      <div class="!pt-25 flex justify-between containerr">
        <div class="w-[20%]">
          <div
            @click="active = 'one'"
            :class="active === 'one' ? 'active' : ''"
            class="flex gap-3 items-center p-3 rounded-[8px] cursor-pointer"
          >
            <div
              class="w-[20px] h-[20px] rounded-[50%] flex justify-center items-center bg-[#0E0E0E]"
            >
              <svg
                width="15px"
                fill="white"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 640"
              >
                <path
                  d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"
                />
              </svg>
            </div>
            <p class="text-[18px] font-medium">Account Details</p>
          </div>
          <div
            @click="active = 'two'"
            :class="active === 'two' ? 'active' : ''"
            class="flex gap-3 items-center p-3 rounded-[8px] cursor-pointer"
          >
            <div
              class="w-[20px] h-[20px] rounded-[50%] flex justify-center items-center bg-[#0E0E0E]"
            >
              <svg
                width="15px"
                fill="white"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 640"
              >
                <path
                  d="M128 512L512 512C547.3 512 576 483.3 576 448L576 208C576 172.7 547.3 144 512 144L362.7 144C355.8 144 349 141.8 343.5 137.6L305.1 108.8C294 100.5 280.5 96 266.7 96L128 96C92.7 96 64 124.7 64 160L64 448C64 483.3 92.7 512 128 512z"
                />
              </svg>
            </div>
            <p class="text-[18px] font-medium">Products</p>
          </div>
        </div>
        <div class="w-[75%]">s</div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import Navbar2 from "../components/Navbar2.vue";

export default {
  components: { Navbar2, Footer },
  data() {
    return {
      token: localStorage.getItem("token"),
      active: "one",
    };
  },
};
</script>

<style lang="scss" scoped>
.active {
  background: #dfe1e3;
}
</style>
