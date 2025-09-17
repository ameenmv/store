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
          class="w-[100%] border-separate border-spacing-y-4 relative"
        >
          <tr>
            <th class="py-4">Product</th>
            <th class="py-4 !text-center">price</th>
            <th class="py-4 !text-center">Quantity</th>
            <th class="py-4 !text-start">Subtotal</th>
            <th class="py-4 !text-end">Delete</th>
          </tr>
          <tr v-for="product in products" :key="product.id">
            <td class="py-6 flex items-center gap-6 !w-full">
              <img
                class="w-[50px] h-[50px]"
                :src="`http://127.0.0.1:8000/storage/${product.product.image}`"
                alt=""
              />
              <p>{{ product.product.name }}</p>
            </td>
            <td class="py-6 !text-center">${{ product.product.price }}</td>
            <td class="py-6 !text-center">{{ product.quantity }}</td>
            <!-- <td class="py-6 !text-center">
              <input
                :placeholder="product.quantity"
                min="1"
                class="outline-none rounded-[4px] border border-[var(--border)] w-[fit-content] p-1 !w-[60px]"
                type="number"
              />
            </td> -->
            <td class="py-6 !text-start">
              ${{ product.product.price * product.quantity }}
            </td>
            <td class="py-6 !text-end">
              <svg
                @click="
                  showPopup = true;
                  currentProduct = product.id;
                "
                class="cursor-pointer"
                width="25px"
                fill="var(--red)"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 640"
              >
                <path
                  d="M232.7 69.9L224 96L128 96C110.3 96 96 110.3 96 128C96 145.7 110.3 160 128 160L512 160C529.7 160 544 145.7 544 128C544 110.3 529.7 96 512 96L416 96L407.3 69.9C402.9 56.8 390.7 48 376.9 48L263.1 48C249.3 48 237.1 56.8 232.7 69.9zM512 208L128 208L149.1 531.1C150.7 556.4 171.7 576 197 576L443 576C468.3 576 489.3 556.4 490.9 531.1L512 208z"
                />
              </svg>
            </td>
          </tr>
          <!-- البوب أب -->
          <div
            v-if="showPopup"
            class="fixed popup bg-white shadow-lg rounded-lg p-6 w-[450px] text-center z-50 border border-[var(--border)]"
          >
            <h2 class="text-lg font-semibold mb-6">
              Are you sure you want to delete this item?
            </h2>
            <div class="flex justify-center gap-4">
              <button
                @click="confirmDelete"
                class="bg-red-500 text-white px-4 py-2 rounded cursor-pointer"
              >
                yes
              </button>
              <button
                @click="
                  showPopup = false;
                  currentProduct = null;
                "
                class="bg-gray-300 px-4 py-2 rounded cursor-pointer"
              >
                cencel
              </button>
            </div>
          </div>
          <!-- <tr>
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
          </tr> -->
        </table>
        <div class="flex justify-between items-center mt-12">
          <router-link to="/"
            ><button class="!bg-[white] font-medium !text-[black] border btn">
              Return To Shop
            </button></router-link
          >
          <button
            @click="updateCart"
            class="!bg-[white] font-medium !text-[black] border btn"
          >
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
              <p>${{ cartTotal }}</p>
            </div>
            <div
              class="pb-2 mt-4 border-b border-[var(--border)] flex justify-between"
            >
              <p>shipping:</p>
              <p>free</p>
            </div>
            <div class="pb-2 mt-4 flex justify-between">
              <p>Total</p>
              <p>${{ cartTotal }}</p>
            </div>
            <div class="flex items-center justify-center mt-5">
              <router-link to="/cart/checkout">
                <button @click="createPayment" class="btn m-auto">
                  Process to checkout
                </button>
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
      showPopup: false,
      currentProduct: null,
    };
  },
  // cart data
  async mounted() {
    // get cart id
    const cartRes = await axios.post(
      "http://127.0.0.1:8000/api/cart",
      {},
      {
        headers: {
          Authorization: `Bearer ${this.token}`,
        },
      }
    );

    this.cartId = cartRes.data.data.id;
    console.log("Cart created:", this.cartId);

    // const cartStore = useCartStore();
    // this.cartId = cartStore.cartId;

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
  methods: {
    // create payment

    async createPayment() {
      axios.post(
        `http://127.0.0.1:8000/api/payment`,
        { order_id },
        {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        }
      );
    },

    // delete
    confirmDelete() {
      axios.delete(
        `http://127.0.0.1:8000/api/cart/${this.cartId}/items/${this.currentProduct}`,
        {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        }
      );
      console.log("تم الحذف ✅");
      this.showPopup = false;
      this.currentProduct = null;

      this.updateCart();
    },

    // update cart
    async updateCart() {
      // const cartStore = useCartStore();
      // this.cartId = cartStore.cartId;

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

        console.log("Updated Cart data:", res.data.data.items);
        this.products = res.data.data.items;
      } catch (err) {
        console.error(
          "Error updating cart:",
          err.response?.data || err.message
        );
      } finally {
        this.loading = false;
      }
    },
  },

  computed: {
    cartTotal() {
      return this.products.reduce((sum, item) => {
        return sum + parseFloat(item.product.price) * item.quantity;
      }, 0);
    },
  },
};
</script>

<style lang="scss" scoped>
th,
td {
  text-align: left;
  width: 25%;
}
.popup {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}
</style>
