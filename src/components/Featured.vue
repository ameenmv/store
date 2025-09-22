<template>
  <div class="">
    <div class="containerr !pt-[150px] !pb-[50px]">
      <div class="header">
        <div class="rectangle"></div>
        <p>Featured</p>
      </div>
      <div class="header2">
        <h1>New Arrival</h1>
      </div>
      <div class="flex justify-between mt-14">
        <div class="w-[48%]">
          <div
            class="bg-[black] w-100% h-[100%] pt-20 flex justify-center relative"
          >
            <img src="../assets/ps5.png" alt="" />
            <div
              class="absolute flex flex-col gap-3 left-[30px] bottom-[30px] text-white"
            >
              <p class="font-medium text-[24px]">PlayStaition 5</p>
              <p class="text-[14px] text-[#FAFAFA]">
                Black and White version of the PS5 <br />
                coming out on sale.
              </p>
              <p class="border-b border-[var(--border)] w-[fit-content]">
                Shop Now
              </p>
            </div>
          </div>
        </div>
        <div class="w-[48%] flex flex-col justify-between">
          <div class="h-[48%]">
            <div
              class="bg-[black] w-100% h-[100%] pt-20 flex justify-center relative"
            >
              <img
                class="absolute right-[0] max-w-[430px] bottom-[0]"
                src="../assets/women.jpg"
                alt=""
              />
              <div
                class="absolute flex flex-col gap-3 left-[30px] bottom-[30px] text-white"
              >
                <p class="font-medium text-[26px]">Women’s Collections</p>
                <p class="text-[#FAFAFA]">
                  Featured woman collections that <br />
                  ive you another vibe.
                </p>
                <p class="border-b border-[var(--border)] w-[fit-content]">
                  Shop Now
                </p>
              </div>
            </div>
          </div>
          <div class="h-[48%] flex justify-between">
            <div class="flex justify-between bg-[black] w-[48%] relative">
              <div
                class="absolute opacity-[.8] left-[0] top-[0] w-[100%] bg-[var(--blur)] z-1 h-[100%] rounded-[50%] blur-[200px]"
              ></div>
              <div
                class="w-[100%] w-100% h-[100%] pt-20 flex justify-center relative z-6"
              >
                <img class="mt-[-40px]" src="../assets/speakers.png" alt="" />
                <div
                  class="absolute flex flex-col gap-1 left-[30px] bottom-[30px] text-white"
                >
                  <p class="font-medium text-[26px]">Speakers</p>
                  <p class="text-[#FAFAFA]">Amazon Wireless Speakers</p>
                  <p class="border-b border-[var(--border)] w-[fit-content]">
                    Shop Now
                  </p>
                </div>
              </div>
            </div>
            <div class="flex justify-between w-[48%] relative bg-[black]">
              <div
                class="absolute opacity-[.8] left-[0] top-[0] w-[100%] bg-[var(--blur)] z-1 h-[100%] rounded-[50%] blur-[200px]"
              ></div>
              <div
                class="w-[100%] w-100% h-[100%] pt-20 flex justify-center relative z-5"
              >
                <img class="mt-[-40px]" src="../assets/gucci.png" alt="" />
                <div
                  class="absolute flex flex-col gap-1 left-[30px] bottom-[30px] text-white"
                >
                  <p class="font-medium text-[26px]">Perfume</p>
                  <p class="text-[#FAFAFA]">GUCCI INTENSE OUD EDP</p>
                  <p class="border-b border-[var(--border)] w-[fit-content]">
                    Shop Now
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  setup() {
    return {};
  },
};
</script>

<style lang="scss" scoped></style>
