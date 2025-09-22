<template>
  <div>
    <div class="containerr">
      <div class="py-10 pt-30">
        <div
          class="flex bg-[var(--black)] w-[100%] h-[100%] px-12 py-15 justify-between text-[white]"
        >
          <div class="w-[48%] flex flex-col justify-center gap-1">
            <div class="flex gap-3 items-center">
              <p class="text-[16px] font-medium text-[var(--green)] mb-3">
                Categories
              </p>
            </div>
            <p class="font-semibold text-[48px]">
              Enhance Your <br />
              Music Experience
            </p>
            <div class="flex gap-[20px] mt-6">
              <div
                class="flex justify-center items-center flex-col w-[62px] h-[62px] rounded-[50%] bg-[var(--bg)] text-[black] font-medium"
              >
                <p class="font-bold">23</p>
                <p class="mt-[-5px] text-[12px]">Hours</p>
              </div>
              <div
                class="flex justify-center items-center flex-col w-[62px] h-[62px] rounded-[50%] bg-[var(--bg)] text-[black] font-medium"
              >
                <p class="font-bold">05</p>
                <p class="mt-[-5px] text-[12px]">Days</p>
              </div>
              <div
                class="flex justify-center items-center flex-col w-[62px] h-[62px] rounded-[50%] bg-[var(--bg)] text-[black] font-medium"
              >
                <p class="font-bold">59</p>
                <p class="mt-[-5px] text-[12px]">Minutes</p>
              </div>
              <div
                class="flex justify-center items-center flex-col w-[62px] h-[62px] rounded-[50%] bg-[var(--bg)] text-[black] font-medium"
              >
                <p class="font-bold">35</p>
                <p class="mt-[-5px] text-[12px]">Seconds</p>
              </div>
            </div>
            <div class="btn mt-8 !bg-[var(--green)] font-bold w-[fit-content]">
              Buy Now!
            </div>
          </div>
          <div class="w-[48%] relative">
            <img class="!z-5 relative" src="../assets/jbl.png " alt="" />
            <div
              class="absolute opacity-[.8] left-[0] top-[0] w-[100%] bg-[var(--blur)] z-1 h-[100%] rounded-[50%] blur-[200px]"
            ></div>
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
