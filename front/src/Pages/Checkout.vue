<template>
  <div>
    <Navbar />
    <div class="py-20">
      <div class="containerr">
        <div class="breadcrum py-10">
          <p>Home &ensp;/&ensp; Cart &ensp;/&ensp; Checkout</p>
        </div>

        <div class="flex justify-between mt-6">
          <!-- Billing Details -->
          <div class="form w-[42%]">
            <h1 class="text-[36px] font-semibold mb-8">Billing Details</h1>
            <div class="flex flex-col w-[100%] gap-5">
              <div>
                <label class="text-[var(--border)]"
                  >First Name<span class="text-[var(--red)]">*</span></label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="text"
                />
              </div>
              <div>
                <label class="text-[var(--border)]">Company Name</label>
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="text"
                />
              </div>
              <div>
                <label class="text-[var(--border)]"
                  >Street Address<span class="text-[var(--red)]">*</span></label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="text"
                />
              </div>
              <div>
                <label class="text-[var(--border)]"
                  >Apartment, floor, etc. (optional)</label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="text"
                />
              </div>
              <div>
                <label class="text-[var(--border)]"
                  >Town / City<span class="text-[var(--red)]">*</span></label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="text"
                />
              </div>
              <div>
                <label class="text-[var(--border)]"
                  >Phone Number<span class="text-[var(--red)]">*</span></label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="text"
                />
              </div>
              <div>
                <label class="text-[var(--border)]"
                  >Email Address<span class="text-[var(--red)]">*</span></label
                >
                <input
                  class="py-3 mt-2 px-4 w-[100%] bg-[var(--input)] outline-none rounded-[5px]"
                  type="text"
                />
              </div>
            </div>
          </div>

          <!-- Order Summary -->
          <div class="w-[42%] pt-20">
            <!-- لو فيه منتجات -->
            <div v-if="orderItems.length">
              <div
                v-for="item in orderItems"
                :key="item.id"
                class="py-4 flex justify-between items-center gap-6 !w-full"
              >
                <div class="flex gap-5 items-center">
                  <img
                    class="w-[50px] h-[50px]"
                    :src="
                      item.product?.image
                        ? `http://127.0.0.1:8000/storage/${item.product.image}`
                        : 'https://via.placeholder.com/50'
                    "
                    alt="product"
                  />
                  <div>
                    <p class="font-medium">{{ item.product?.name }}</p>
                    <p class="text-sm text-gray-500">
                      {{ item.product?.category?.name }} |
                      {{ item.product?.company?.name }}
                    </p>
                    <p class="text-sm text-gray-500">
                      Qty: {{ item.quantity }}
                    </p>
                  </div>
                </div>
                <p class="font-semibold">
                  ${{ (parseFloat(item.product?.price) || 0) * item.quantity }}
                </p>
              </div>

              <!-- Totals -->
              <div
                class="pb-2 mt-4 border-b border-[var(--border)] flex justify-between"
              >
                <p>Subtotal:</p>
                <p>${{ subtotal }}</p>
              </div>
              <div
                class="pb-2 mt-4 border-b border-[var(--border)] flex justify-between"
              >
                <p>Shipping:</p>
                <p>Free</p>
              </div>
              <div class="pb-2 mt-4 flex justify-between">
                <p>Total:</p>
                <p>${{ subtotal }}</p>
              </div>
            </div>

            <!-- لو مفيش منتجات -->
            <p v-else class="text-center text-gray-500">
              No items in your order.
            </p>

            <!-- Payment methods -->
            <div
              class="flex justify-between mt-4 items-center"
              v-if="orderItems.length"
            >
              <div class="flex gap-3 cursor-pointer">
                <div
                  class="w-[24px] h-[24px] border border-[1.5px] rounded-[50%] flex justify-center items-center"
                >
                  <div class="w-[16px] h-[16px] rounded-[50%] bg-[black]"></div>
                </div>
                <div class="flex items-center">Bank</div>
              </div>
              <div class="flex gap-3 cursor-pointer">
                <div
                  class="w-[24px] h-[24px] border border-[1.5px] rounded-[50%] flex justify-center items-center"
                >
                  <div class="w-[16px] h-[16px] rounded-[50%] bg-[black]"></div>
                </div>
                <div class="flex items-center">Cash on delivery</div>
              </div>
            </div>

            <!-- Coupon -->
            <div class="flex gap-4 mt-10" v-if="orderItems.length">
              <input
                placeholder="Coupon Code"
                class="py-3 px-4 pr-30 border border-[var(--border)] rounded-[5px]"
                type="text"
              />
              <button class="btn">Apply Coupon</button>
            </div>

            <!-- Place Order -->
            <button class="btn mt-8" v-if="orderItems.length">
              Place Order
            </button>
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

export default {
  components: { Navbar, Footer },
  data() {
    return {
      order: null,
      orderItems: [],
      products: [],
      token: localStorage.getItem("token"),
      orderId: localStorage.getItem("orderId"),
    };
  },
  computed: {
    subtotal() {
      return this.orderItems.reduce((sum, item) => {
        return sum + (parseFloat(item.product?.price) || 0) * item.quantity;
      }, 0);
    },
  },
  async mounted() {
    if (!this.token) {
      this.$router.push("/login");
      return;
    }
    if (!this.orderId) {
      console.warn("No orderId found");
      return;
    }

    try {
     
      const orderRes = await axios.get(
        `http://127.0.0.1:8000/api/orders/${this.orderId}`,
        {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        }
      );
      this.order = orderRes.data.data;
      const orderItems = this.order.items || [];

      
      const productsRes = await axios.get(
        `http://127.0.0.1:8000/api/products`,
        {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        }
      );
      this.products = productsRes.data.data;

      
      this.orderItems = orderItems.map((item) => {
        const product = this.products.find((p) => p.id === item.product_id);
        return {
          ...item,
          product: product || null,
        };
      });

      console.log("Order items merged:", this.orderItems);
    } catch (err) {
      console.error("Error fetching order:", err.response?.data || err.message);
    }
  },
};
</script>

<style lang="scss" scoped>
th,
td {
  text-align: left;
  width: 25%;
}
</style>
