<template>
  <div>
    <Navbar />
    <div class="py-10 pb-30">
      <div class="containerr">
        <div class="breadcrum py-10">
          <p>Home &ensp;/&ensp; Contact</p>
        </div>
        <div class="flex mt-12 justify-between">
          <div class="w-[25%]">
            <div
              class="flex flex-col gap-5 pb-8 border-b border-[var(--border)]"
            >
              <div class="flex flex-col gap-[10px]">
                <div class="flex gap-[10px]">
                  <div
                    class="w-[40px] h-[40px] rounded-[50%] bg-[var(--red)] flex justify-center items-center"
                  >
                    <svg
                      width="20px"
                      height="20px"
                      fill="white"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 640 640"
                    >
                      <path
                        d="M224.2 89C216.3 70.1 195.7 60.1 176.1 65.4L170.6 66.9C106 84.5 50.8 147.1 66.9 223.3C104 398.3 241.7 536 416.7 573.1C493 589.3 555.5 534 573.1 469.4L574.6 463.9C580 444.2 569.9 423.6 551.1 415.8L453.8 375.3C437.3 368.4 418.2 373.2 406.8 387.1L368.2 434.3C297.9 399.4 241.3 341 208.8 269.3L253 233.3C266.9 222 271.6 202.9 264.8 186.3L224.2 89z"
                      />
                    </svg>
                  </div>
                  <p class="font-medium flex justify-center items-center">
                    Call To Us
                  </p>
                </div>
              </div>
              <p class="">We are available 24/7, 7 days a week.</p>
              <p class="">Phone: +201017025076</p>
            </div>
            <div class="flex flex-col gap-5 pt-8">
              <div class="flex flex-col gap-[10px]">
                <div class="flex gap-[10px]">
                  <div
                    class="w-[40px] h-[40px] rounded-[50%] bg-[var(--red)] flex justify-center items-center"
                  >
                    <svg
                      width="20px"
                      height="20px"
                      fill="white"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 640 640"
                    >
                      <path
                        d="M267.7 576.9C267.7 576.9 267.7 576.9 267.7 576.9L229.9 603.6C222.6 608.8 213 609.4 205 605.3C197 601.2 192 593 192 584L192 512L160 512C107 512 64 469 64 416L64 192C64 139 107 96 160 96L480 96C533 96 576 139 576 192L576 416C576 469 533 512 480 512L359.6 512L267.7 576.9zM332 472.8C340.1 467.1 349.8 464 359.7 464L480 464C506.5 464 528 442.5 528 416L528 192C528 165.5 506.5 144 480 144L160 144C133.5 144 112 165.5 112 192L112 416C112 442.5 133.5 464 160 464L216 464C226.4 464 235.3 470.6 238.6 479.9C239.5 482.4 240 485.1 240 488L240 537.7C272.7 514.6 303.3 493 331.9 472.8z"
                      />
                    </svg>
                  </div>
                  <p class="font-medium flex justify-center items-center">
                    Write To Us
                  </p>
                </div>
              </div>
              <p class="">
                Fill out our form and we will contact you within 24 hours.
              </p>
              <p class="">Emails: ameeenmv@gmail.com</p>
              <p class="">Emails: support@exclusive.com</p>
            </div>
          </div>
          <div class="w-[70%%]">
            <div class="flex gap-5">
              <input
                placeholder="Your Name *"
                class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                type="text"
                name=""
                id=""
              /><input
                placeholder="Your Email *"
                class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                type="text"
                name=""
                id=""
              /><input
                placeholder="Your Phone *"
                class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                type="text"
                name=""
                id=""
              />
            </div>
            <textarea
              placeholder="Your Message"
              class="mt-6 py-3 mt-2 px-4 w-[100%] h-[200px] bg-[var(--input)] outline-none rounded-[5px]"
              name=""
              id=""
              cols="30"
              rows="10"
            ></textarea>
            <div class="btn mt-6 items-end w-[fit-content] place-self-end">
              Send Message
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
