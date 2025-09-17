<template>
  <div>
    <Navbar />
    <div class="py-20">
      <div class="containerr">
        <div class="breadcrum py-10">
          <p>Home &ensp;/&ensp; About</p>
        </div>
        <p class="mt-20 font-bold text-[30px]" v-if="loading">Loading...</p>
        <p v-if="error" class="text-red-500">{{ error }}</p>
        <div class="flex justify-between" v-if="product">
          <div class="w-[60%] flex gap-5">
            <div class="flex flex-col justify-between">
              <div
                class="w-[170px] h-[140px] py-5 px-7 bg-[var(--bg)] flex justify-center items-center mb-[20px] cursor-pointer"
              >
                <img
                  :src="`http://127.0.0.1:8000/storage/${product.image}`"
                  alt=""
                />
              </div>
              <div
                class="w-[170px] h-[140px] py-5 px-7 bg-[var(--bg)] flex justify-center items-center mb-[20px] cursor-pointer"
              >
                <img
                  :src="`http://127.0.0.1:8000/storage/${product.image}`"
                  alt=""
                />
              </div>
              <div
                class="w-[170px] h-[140px] py-5 px-7 bg-[var(--bg)] flex justify-center items-center mb-[20px] cursor-pointer"
              >
                <img
                  :src="`http://127.0.0.1:8000/storage/${product.image}`"
                  alt=""
                />
              </div>
              <div
                class="w-[170px] h-[140px] py-5 px-7 bg-[var(--bg)] flex justify-center items-center cursor-pointer"
              >
                <img
                  :src="`http://127.0.0.1:8000/storage/${product.image}`"
                  alt=""
                />
              </div>
            </div>
            <div
              v-if="product"
              class="flex justify-center items-center py-5 px-7 w-[100%] h-[640px] bg-[var(--bg)] cursor-pointer"
            >
              <img
                :src="`http://127.0.0.1:8000/storage/${product.image}`"
                alt=""
              />
            </div>
          </div>
          <div class="w-[35%]">
            <p class="text-[24px] font-medium">{{ product.name }}</p>
            <div class="flex items-center mt-3 gap-4">
              <div class="flex justify-center items-center stars">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                  <path
                    d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                  /></svg
                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                  <path
                    d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                  /></svg
                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                  <path
                    d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                  /></svg
                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                  <path
                    d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                  /></svg
                ><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                  <path
                    d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                  />
                </svg>
              </div>
              <div class="number text-[#000] opacity-[.7]">(150 Reviews)</div>
              <div class="opacity-[.6]">|</div>
              <div class="text-[var(--green)] opacity-[.6]">In Stock</div>
            </div>
            <div class="mt-3 text-[24px]">${{ product.price }}</div>
            <p class="mt-3 pb-5 border-b border-[var(--border)]">
              {{ product.description }}
            </p>
            <!-- <div class="flex mt-3">
              <p class="text-[20px]">Colours:</p>
              <div class="flex ml-4 gap-2 items-center">
                <div
                  class="w-[20px] h-[20px] rounded-[50%] bg-[var(--red)] cursor-pointer"
                ></div>
                <div
                  class="w-[20px] h-[20px] rounded-[50%] bg-[var(--green)] cursor-pointer"
                ></div>
              </div>
            </div> -->
            <!-- <div class="flex mt-4">
              <p class="text-[20px]">Size:</p>
              <div class="flex ml-5 gap-4 items-center">
                <div
                  class="h-[32px] w-[32px] rounded-[5px] border border-[var(--border)] flex justify-center items-center font-medium cursor-pointer"
                >
                  XS
                </div>
                <div
                  class="h-[32px] w-[32px] rounded-[5px] border border-[var(--border)] flex justify-center items-center font-medium cursor-pointer"
                >
                  S
                </div>
                <div
                  class="h-[32px] w-[32px] rounded-[5px] border border-[var(--border)] flex justify-center items-center font-medium cursor-pointer"
                >
                  M
                </div>
                <div
                  class="h-[32px] w-[32px] rounded-[5px] border border-[var(--border)] flex justify-center items-center font-medium cursor-pointer"
                >
                  L
                </div>
                <div
                  class="h-[32px] w-[32px] rounded-[5px] border border-[var(--border)] flex justify-center items-center font-medium cursor-pointer"
                >
                  XL
                </div>
              </div>
            </div> -->
            <div class="flex mt-4 gap-4 items-center">
              <div
                class="w-[160px] h-[45px] border border-[var(--border)] rounded-[5px] flex justify-between center"
              >
                <div
                  @click="minus"
                  class="w-[25%] flex justify-center items-center text-[35px] font-medium border-r border-[var(--border)] cursor-pointer"
                >
                  -
                </div>
                <div
                  class="w-[50%] flex justify-center items-center text-[20px] font-medium"
                >
                  {{ number }}
                </div>
                <div
                  @click="plus"
                  class="w-[25%] flex justify-center items-center text-[30px] font-medium bg-[var(--red)] text-[#eee] cursor-pointer"
                >
                  +
                </div>
              </div>
              <div @click="addToCart" class="btn !pt-[10px] !pb-[10px]">
                Add To Cart
              </div>

              <div
                class="flex justify-center items-center border border-[var(--border)] rounded-[5px] w-[40px] h-[40px] cursor-pointer"
              >
                <svg
                  class="cursor-pointer !w-[20px] !h-[20px] !fill-[black]"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 640 640"
                >
                  <path
                    d="M442.9 144C415.6 144 389.9 157.1 373.9 179.2L339.5 226.8C335 233 327.8 236.7 320.1 236.7C312.4 236.7 305.2 233 300.7 226.8L266.3 179.2C250.3 157.1 224.6 144 197.3 144C150.3 144 112.2 182.1 112.2 229.1C112.2 279 144.2 327.5 180.3 371.4C221.4 421.4 271.7 465.4 306.2 491.7C309.4 494.1 314.1 495.9 320.2 495.9C326.3 495.9 331 494.1 334.2 491.7C368.7 465.4 419 421.3 460.1 371.4C496.3 327.5 528.2 279 528.2 229.1C528.2 182.1 490.1 144 443.1 144zM335 151.1C360 116.5 400.2 96 442.9 96C516.4 96 576 155.6 576 229.1C576 297.7 533.1 358 496.9 401.9C452.8 455.5 399.6 502 363.1 529.8C350.8 539.2 335.6 543.9 320 543.9C304.4 543.9 289.2 539.2 276.9 529.8C240.4 502 187.2 455.5 143.1 402C106.9 358.1 64 297.7 64 229.1C64 155.6 123.6 96 197.1 96C239.8 96 280 116.5 305 151.1L320 171.8L335 151.1z"
                  />
                </svg>
              </div>
            </div>
            <div
              class="flex flex-col mt-8 border border-[var(--border)] rounded-[5px] p-5"
            >
              <div class="flex items-center gap-5 pb-5">
                <svg
                  width="30px"
                  fill="black"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 640 640"
                >
                  <path
                    d="M147 170.7L117.2 256L240.1 256L240.1 160L162.2 160C155.4 160 149.3 164.3 147.1 170.7zM48.6 257.9L86.5 149.6C97.8 117.5 128.1 96 162.1 96L360 96C385.2 96 408.9 107.9 424 128L520.2 256.3C587.1 260.5 640 316.1 640 384L640 400C640 435.3 611.3 464 576 464L559.6 464C555.6 508.9 517.9 544 472 544C426.1 544 388.4 508.9 384.4 464L239.7 464C235.7 508.9 198 544 152.1 544C106.2 544 68.5 508.9 64.5 464L64.1 464C28.8 464 .1 435.3 .1 400L.1 320C.1 289.9 20.8 264.7 48.7 257.9zM440 256L372.8 166.4C369.8 162.4 365 160 360 160L288 160L288 256L440 256zM152 496C174.1 496 192 478.1 192 456C192 433.9 174.1 416 152 416C129.9 416 112 433.9 112 456C112 478.1 129.9 496 152 496zM512 456C512 433.9 494.1 416 472 416C449.9 416 432 433.9 432 456C432 478.1 449.9 496 472 496C494.1 496 512 478.1 512 456z"
                  />
                </svg>
                <div class="flex flex-col">
                  <p class="text-[18px] font-medium">Free Delivery</p>
                  <p class="underline text-[12px]">
                    Enter your postal code for Delivery Availability
                  </p>
                </div>
              </div>
              <div
                class="flex items-center gap-5 pt-5 border-t border-[var(--border)]"
              >
                <svg
                  width="30px"
                  fill="black"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 640 640"
                >
                  <path
                    d="M216.3 124C262.5 44 378 44 424.2 124L461.5 188.6L489.2 172.6C497.6 167.7 508.1 168.4 515.8 174.3C523.5 180.2 526.9 190.2 524.4 199.6L500.9 287C497.5 299.8 484.3 307.4 471.5 304L384.1 280.6C374.7 278.1 367.8 270.2 366.5 260.6C365.2 251 369.9 241.5 378.3 236.7L406 220.7L368.7 156.1C347.1 118.8 293.3 118.8 271.7 156.1L266.4 165.2C257.6 180.5 238 185.7 222.7 176.9C207.4 168.1 202.2 148.5 211 133.1L216.3 124zM513.7 343.1C529 334.3 548.6 339.5 557.4 354.8L562.7 363.9C608.9 443.9 551.2 543.9 458.8 543.9L384.2 543.9L384.2 575.9C384.2 585.6 378.4 594.4 369.4 598.1C360.4 601.8 350.1 599.8 343.2 592.9L279.2 528.9C269.8 519.5 269.8 504.3 279.2 495L343.2 431C350.1 424.1 360.4 422.1 369.4 425.8C378.4 429.5 384.2 438.3 384.2 448L384.2 480L458.8 480C501.9 480 528.9 433.3 507.3 396L502 386.9C493.2 371.6 498.4 352 513.7 343.2zM115 299.4L87.3 283.4C78.9 278.5 74.2 269.1 75.5 259.5C76.8 249.9 83.7 242 93.1 239.5L180.5 216C193.3 212.6 206.5 220.2 209.9 233L233.3 320.4C235.8 329.8 232.4 339.7 224.7 345.7C217 351.7 206.5 352.3 198.1 347.4L170.4 331.4L133.1 396C111.5 433.3 138.5 480 181.6 480L192.2 480C209.9 480 224.2 494.3 224.2 512C224.2 529.7 209.9 544 192.2 544L181.6 544C89.3 544 31.6 444 77.8 364L115 299.4z"
                  />
                </svg>
                <div class="flex flex-col">
                  <p class="text-[18px] font-medium">Return Delivery</p>
                  <p class="text-[12px]">
                    Free 30 Days Delivery Returns. Details
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- reviews -->
        <div class="reviews">
          <div class="header mt-15">
            <div class="rectangle"></div>
            <p>Reviews</p>
          </div>
          <div v-for="review in productReviews" :key="review.id" class="flex">
            <span
              v-for="star in 5"
              :key="star"
              class="text-yellow-400 text-2xl"
            >
              {{ star <= review.rating ? "★" : "☆" }}
            </span>

            {{ review.comment }}
          </div>
        </div>
        <!-- rating -->
        <div class="rating">
          <div class="header mt-15">
            <div class="rectangle"></div>
            <p>Rating</p>
          </div>
          <div class="flex mt-5">
            <span
              v-for="star in 5"
              :key="star"
              @click="setRating(star)"
              class="cursor-pointer text-5xl"
              :class="star <= rating ? 'text-yellow-400' : 'text-gray-400'"
            >
              ★
            </span>
          </div>
          <div class="flex flex-col gap-6">
            <textarea
              v-model="review"
              placeholder="write a review"
              class="py-3 mt-5 px-4 w-[700px] h-[150px] bg-[var(--input)] outline-none rounded-[5px]"
              type="text"
              name=""
              id=""
            />
            <p v-if="reviewError" class="text-red-500">{{ reviewError }}</p>
            <button @click="addReview" class="btn w-[fit-content]">
              Submit
            </button>
          </div>
          <div class="mt-15">
            <div class="containerr !pt-[80px] !pb-[50px]">
              <div class="header pb-8">
                <div class="rectangle"></div>
                <p>Related Items</p>
              </div>

              <div class="products">
                <div class="product">
                  <div class="imgbg">
                    <img src="../assets/product.png" alt="" />
                  </div>
                  <p class="title">HAVIT HV-G92 Gamepad</p>
                  <div class="flex">
                    <p class="price">$120</p>
                    <p class="old-price">$160</p>
                  </div>
                  <div class="flex">
                    <div class="flex">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        />
                      </svg>
                    </div>
                    <div class="number">(88)</div>
                  </div>
                </div>
                <div class="product">
                  <div class="imgbg">
                    <img src="../assets/product.png" alt="" />
                  </div>
                  <p class="title">HAVIT HV-G92 Gamepad</p>
                  <div class="flex">
                    <p class="price">$120</p>
                    <p class="old-price">$160</p>
                  </div>
                  <div class="flex">
                    <div class="flex">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        />
                      </svg>
                    </div>
                    <div class="number">(88)</div>
                  </div>
                </div>
                <div class="product">
                  <div class="imgbg">
                    <img src="../assets/product.png" alt="" />
                  </div>
                  <p class="title">HAVIT HV-G92 Gamepad</p>
                  <div class="flex">
                    <p class="price">$120</p>
                    <p class="old-price">$160</p>
                  </div>
                  <div class="flex">
                    <div class="flex">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        />
                      </svg>
                    </div>
                    <div class="number">(88)</div>
                  </div>
                </div>
                <div class="product">
                  <div class="imgbg">
                    <img src="../assets/product.png" alt="" />
                  </div>
                  <p class="title">HAVIT HV-G92 Gamepad</p>
                  <div class="flex">
                    <p class="price">$120</p>
                    <p class="old-price">$160</p>
                  </div>
                  <div class="flex">
                    <div class="flex">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        /></svg
                      ><svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 640"
                      >
                        <path
                          d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"
                        />
                      </svg>
                    </div>
                    <div class="number">(88)</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";

import axios from "axios";
import { useCartStore } from "../Stores/Products";

export default {
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      token: localStorage.getItem("token"),
      product: null,
      products: [],
      loading: true,
      number: 1,
      cartId: "",
      rating: 0,
      review: "",
      reviewError: "",
      reviews: [],
    };
  },
  methods: {
    // stars
    setRating(star) {
      this.rating = star;
    },

    plus() {
      this.number++;
    },
    minus() {
      if (this.number > 1) {
        this.number--;
      }
    },

    async addReview() {
      const form = {
        product_id: this.product.id,
        rating: this.rating,
        comment: this.review,
      };

      if (this.review === "" && this.rating === 0) {
        this.reviewError = "Review & Rate is required";
        return;
      } else if (this.rating === 0) {
        this.reviewError = "Rate is required";
        return;
      } else if (this.review === "") {
        this.reviewError = "Review is required";
        return;
      }

      this.reviewError = "";

      try {
        await axios.post("http://127.0.0.1:8000/api/reviews", form, {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        });
        this.review = ""; // امسح التعليق بعد ما يتسجل
        this.rating = 0; // رجّع النجوم فاضية
        await this.fetchReviews();
      } catch (err) {
        console.error(
          "Error adding review:",
          err.response?.data || err.message
        );
      }
    },
    async addToCart() {
      const formData = {
        product_id: this.product.id,
        quantity: this.number,
        price: this.product.price,
      };

      try {
        // get cart id
        const cartRes = await axios.post(
          "http://127.0.0.1:8000/api/cart",
          formData,
          {
            headers: {
              Authorization: `Bearer ${this.token}`,
            },
          }
        );

        this.cartId = cartRes.data.data.id;
        console.log("Cart created:", this.cartId);

        const cartStore = useCartStore();
        cartStore.setCartId(cartRes.data.data.id);
        console.log("Cart ID stored:", cartStore.cartId);

        // create itme on cart
        const itemsRes = await axios.post(
          `http://127.0.0.1:8000/api/cart/${this.cartId}/items`,
          formData,
          {
            headers: {
              Authorization: `Bearer ${this.token}`,
            },
          }
        );

        console.log("Item added:", itemsRes.data);
        this.$router.back();
      } catch (err) {
        console.error(
          "Error while adding to cart:",
          err.response?.data || err.message
        );
      }
    },

    // fetch reviews
    async fetchReviews() {
      try {
        const res = await axios.get(`http://127.0.0.1:8000/api/reviews`, {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        });
        this.reviews = res.data.data;
        console.log("Reviews loaded:", this.reviews);
      } catch (err) {
        console.error(
          "Error loading reviews:",
          err.response?.data || err.message
        );
      }
    },
  },
  async mounted() {
    // get products
    try {
      const res = await axios.get("http://127.0.0.1:8000/api/products");
      console.log("Products loaded:", res.data);
      this.products = res.data.data || res.data;

      const projectId = parseInt(this.$route.params.id);
      this.product = this.products.find((p) => p.id === projectId) || null;

      console.log("selected product:", this.product);
      this.loading = false;
    } catch (err) {
      console.error("Error loading products:", err);
      this.loading = false;
    }
    // get veviews
    await this.fetchReviews();
  },
  computed: {
    productReviews() {
      return this.reviews.filter((r) => r.product_id === this.product.id);
    },
  },
};
</script>

<style lang="scss" scoped>
.stars svg {
  width: 15px;
  fill: var(--yellow);
}
</style>
