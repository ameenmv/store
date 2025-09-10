<template>
  <div class="">
    <div class="containerr flex">
      <div
        class="w-[20%] flex flex-col border-r border-[var(--border)] gap-3 py-10"
      >
        <p class="text-[18px] font-medium mb-2 cursor-pointer">
          Woman’s Fashion
        </p>
        <p class="text-[18px] font-medium mb-2 cursor-pointer">Men’s Fashion</p>
        <p class="text-[18px] font-medium mb-2 cursor-pointer">Electronics</p>
        <p class="text-[18px] font-medium mb-2 cursor-pointer">
          Home & Lifestyle
        </p>
        <p class="text-[18px] font-medium mb-2 cursor-pointer">Medicine</p>
        <p class="text-[18px] font-medium mb-2 cursor-pointer">
          Sports & Outdoor
        </p>
        <p class="text-[18px] font-medium mb-2 cursor-pointer">Baby’s & Toys</p>
        <p class="text-[18px] font-medium mb-2 cursor-pointer">
          Groceries & Pets
        </p>
        <p class="text-[18px] font-medium mb-2 cursor-pointer">
          Health & Beauty
        </p>
      </div>
      <div class="w-[80%] p-12">
        <div
          class="flex bg-[var(--black)] w-[100%] h-[100%] p-12 justify-between text-[white]"
        >
          <div class="w-[48%] flex flex-col justify-center gap-1">
            <div class="flex gap-3 items-center ml-[-10px]">
              <svg
                width="70px"
                fill="white"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 640"
              >
                <path
                  d="M447.1 332.7C446.9 296 463.5 268.3 497.1 247.9C478.3 221 449.9 206.2 412.4 203.3C376.9 200.5 338.1 224 323.9 224C308.9 224 274.5 204.3 247.5 204.3C191.7 205.2 132.4 248.8 132.4 337.5C132.4 363.7 137.2 390.8 146.8 418.7C159.6 455.4 205.8 545.4 254 543.9C279.2 543.3 297 526 329.8 526C361.6 526 378.1 543.9 406.2 543.9C454.8 543.2 496.6 461.4 508.8 424.6C443.6 393.9 447.1 334.6 447.1 332.7zM390.5 168.5C417.8 136.1 415.3 106.6 414.5 96C390.4 97.4 362.5 112.4 346.6 130.9C329.1 150.7 318.8 175.2 321 202.8C347.1 204.8 370.9 191.4 390.5 168.5z"
                />
              </svg>
              <p class="text-[16px]">iPhone 14 Series</p>
            </div>
            <p class="font-semibold text-[48px]">
              Up to 10% <br />
              off Voucher
            </p>
            <div class="flex items-center mt-2 w-[fit-content] cursor-pointer">
              <p class="border-b text-[16px] mr-2">Shop Now</p>
              <svg
                width="20px"
                fill="white"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 640"
              >
                <path
                  d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"
                />
              </svg>
            </div>
          </div>
          <div class="w-[48%] relative">
            <img
              class="absolute top-[-20px] h-[365px] w-[100%] left-[0]"
              src="../assets/headerimg.jpg"
              alt=""
            />
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
