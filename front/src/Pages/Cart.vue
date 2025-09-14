<template>
  <div>
    <Navbar />
    <div class="py-20">
      <div class="containerr">
        <div class="breadcrum py-10">
          <p>Home / Cart</p>
        </div>
        <p class="mt-20 mb-20 font-bold text-[30px]" v-if="loading">
          Loading...
        </p>
        <p v-if="error" class="mt-20 font-bold text-[30px]">{{ error }}</p>
        <table
          v-if="products != ''"
          class="w-[100%] border-separate border-spacing-y-4"
        >
          <tr>
            <th class="py-4">Product</th>
            <th class="py-4 !text-center">price</th>
            <th class="py-4 !text-center">Quantity</th>
            <th class="py-4 !text-end">Subtotal</th>
          </tr>
          <tr>
            <td class="py-6 flex items-center gap-6 !w-full">
              <img
                class="w-[50px] h-[50px]"
                src="../assets/product.png"
                alt=""
              />
              <p>H1 Gamepad</p>
            </td>
            <td class="py-6 !text-center">$650</td>
            <td class="py-6 !text-center">
              <input
                placeholder="1"
                min="1"
                class="outline-none rounded-[4px] border border-[var(--border)] w-[fit-content] p-1 !w-[60px]"
                type="number"
              />
            </td>
            <td class="py-6 !text-end">$650</td>
          </tr>
          <tr>
            <td class="py-6 flex items-center gap-6 !w-full">
              <img
                class="w-[50px] h-[50px]"
                src="../assets/product.png"
                alt=""
              />
              <p>H1 Gamepad</p>
            </td>
            <td class="py-6 !text-center">$650</td>
            <td class="py-6 !text-center">
              <input
                placeholder="1"
                min="1"
                class="outline-none rounded-[4px] border border-[var(--border)] w-[fit-content] p-1 !w-[60px]"
                type="number"
              />
            </td>
            <td class="py-6 !text-end">$650</td>
          </tr>
        </table>
        <div class="flex justify-between items-center mt-12">
          <button class="!bg-[white] font-medium !text-[black] border btn">
            Return To Shop</button
          ><button class="!bg-[white] font-medium !text-[black] border btn">
            Update Cart
          </button>
        </div>
        <div class="flex justify-between mt-20">
          <div class="flex gap-4 h-[fit-content]">
            <input
              placeholder="Cupon Code"
              class="py-3 px-4 pr-15 border border-[var(--border)] rounded-[5px]"
              type="text"
              name=""
              id=""
            />
            <button class="btn">Apply Coupon</button>
          </div>
          <div class="border rounded-[5px] p-5 min-w-[450px]">
            <p class="text-[20px] font-medium">Cart Total</p>
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
            <div class="flex items-center justify-center mt-5">
              <router-link to="/cart/checkout">
                <button class="btn m-auto">Process to checkout</button>
              </router-link>
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
import { useCartStore } from "../Stores/Products";
import axios from "axios";

export default {
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      cartId: null,
      token: localStorage.getItem("token"),
      products: [],
      loading: true,
    };
  },
  async mounted() {
    const cartStore = useCartStore();
    this.cartId = cartStore.cartId;

    if (!this.cartId) {
      console.warn("No cartId found in store, skipping request");
      this.loading = false;
      return;
    }

    try {
      const res = await axios.get(
        `http://127.0.0.1:8000/api/cart/${this.cartId}`,
        {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        }
      );

      console.log("Cart data:", res.data.data.items);
      this.products = res.data.data.items;
      this.loading = false;
    } catch (err) {
      console.error("Error loading cart:", err.response?.data || err.message);
      this.loading = false;
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
