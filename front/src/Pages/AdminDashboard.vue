<template>
  <div>
    <navbar2 />
    <div class="bg-[#F6F8FA]">
      <div class="!pt-20 !pb-20 flex justify-between containerr">
        <div class="w-[25%] pt-10">
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
                  d="M128 512L512 512C547.3 512 576 483.3 576 448L576 208C576 172.7 547.3 144 512 144L362.7 144C355.8 144 349 141.8 343.5 137.6L305.1 108.8C294 100.5 280.5 96 266.7 96L128 96C92.7 96 64 124.7 64 160L64 448C64 483.3 92.7 512 128 512z"
                />
              </svg>
            </div>
            <p class="text-[18px] font-medium">Manage Users</p>
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
                  d="M320 312C386.3 312 440 258.3 440 192C440 125.7 386.3 72 320 72C253.7 72 200 125.7 200 192C200 258.3 253.7 312 320 312zM290.3 368C191.8 368 112 447.8 112 546.3C112 562.7 125.3 576 141.7 576L498.3 576C514.7 576 528 562.7 528 546.3C528 447.8 448.2 368 349.7 368L290.3 368z"
                />
              </svg>
            </div>
            <p class="text-[18px] font-medium">Manage Products</p>
          </div>
        </div>
        <div class="w-[72%] p-8 bg-white rounded-[12px] boxshadow">
          <div v-if="active === 'one'">
            <div class="flex gap-3 flex-col w-[100%] relative">
              <table
                class="w-[100%] border-separate border-spacing-y-4 relative"
              >
                <tr class="p-3">
                  <th class="py-4 !text-start">Image</th>
                  <th class="py-4 !text-start">Name</th>
                  <th class="py-4 !text-start">email</th>
                  <th class="py-4 !text-start">role</th>
                  <th class="py-4 !text-start">phone</th>
                  <th class="py-4 !text-start">Delete</th>
                </tr>
                <tr v-for="user in users" :key="user.id">
                  <td class="py-6 flex items-center gap-6 !w-full">
                    <img
                      class="w-[50px] h-[50px]"
                      :src="`http://127.0.0.1:8000/storage/${users.image_url}`"
                      alt=""
                    />
                  </td>
                  <td class="py-6 !text-start">{{ user.name }}</td>
                  <td class="py-6 !text-start">{{ user.email }}</td>
                  <td class="py-6 !text-start">{{ user.role }}</td>

                  <td class="py-6 !text-start">
                    {{ user.phone }}
                  </td>
                  <td class="py-6 !text-end">
                    <svg
                      @click="openPopup($event, user.id)"
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
                <!-- popup -->
                <div
                  v-if="showPopup"
                  :style="{
                    top: popupPosition.top + 'px',
                    left: popupPosition.left + 'px',
                  }"
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
              </table>
            </div>
          </div>
          <div v-if="active === 'two'">
            <table class="w-[100%] border-separate border-spacing-y-4 relative">
              <tr>
                <th class="py-4 !text-start">Product</th>
                <th class="py-4 !text-center">price</th>
                <th class="py-4 !text-center">Quantity</th>
                <th class="py-4 !text-start">Company</th>
                <th class="py-4 !text-start">Delete</th>
              </tr>
              <tr v-for="product in products" :key="product.id">
                <td class="py-6 flex items-start gap-6 !w-full">
                  <img
                    class="w-[50px] h-[50px]"
                    :src="`http://127.0.0.1:8000/storage/${product.image}`"
                    alt=""
                  />
                  <p>{{ product.name }}</p>
                </td>
                <td class="py-6 !text-center">${{ product.price }}</td>
                <td class="py-6 !text-center">{{ product.stock }}</td>

                <td class="py-6 !text-start">{{ product.company.name }}</td>
                <td class="py-6 !text-center">
                  <svg
                    @click="openPopup2($event, product.id)"
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
                v-if="showPopup2"
                :style="{
                  top: popupPosition.top + 'px',
                  left: popupPosition.left + 'px',
                }"
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
                      showPopup2 = false;
                      currentProduct = null;
                    "
                    class="bg-gray-300 px-4 py-2 rounded cursor-pointer"
                  >
                    cancel
                  </button>
                </div>
              </div>
            </table>
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import Navbar2 from "../components/Navbar2.vue";

import axios from "axios";

export default {
  components: { Navbar2, Footer },

  data() {
    return {
      token: localStorage.getItem("token"),
      userId: localStorage.getItem("userId"),
      active: "one",
      users: [],
      products: [],
      showPopup: false,
      showPopup2: false,
      popupPosition: { top: 0, left: 0 },
    };
  },

  methods: {
    // open popup
    openPopup(event, userId) {
      this.currentUser = userId;
      const rect = event.target.getBoundingClientRect();
      this.popupPosition = {
        top: rect.bottom + window.scrollY + 5, // 5px تحت الزر
        left: rect.left + window.scrollX - 150,
      };
      this.showPopup = true;
    },
    // open popup2
    openPopup2(event, productId) {
      this.currentProduct = productId;
      const rect = event.target.getBoundingClientRect();
      this.popupPosition = {
        top: rect.bottom + window.scrollY + 5,
        left: rect.left + window.scrollX - 150,
      };
      this.showPopup2 = true;
    },
    // delete user
    async deleteUser() {
      try {
        await axios.delete(
          `http://127.0.0.1:8000/api/users/${this.currentUser}`,
          {
            headers: {
              Authorization: `Bearer ${this.token}`,
              "Content-Type": "application/json",
            },
          }
        );

        console.log("Deleted user:", this.currentUser);
        await this.fetchUser();
        this.showPopup = false;
      } catch (err) {
        console.error(
          "Error deleting user:",
          err.response?.data || err.message
        );
      }
    },
    // delete product
    async confirmDelete() {
      try {
        await axios.delete(
          `http://127.0.0.1:8000/api/products/${this.currentProduct}`,
          {
            headers: {
              Authorization: `Bearer ${this.token}`,
            },
          }
        );
        await this.fetchProducts();
        this.showPopup2 = false;
      } catch (err) {
        console.error(
          "Error deleting product:",
          err.response?.data || err.message
        );
      }
    },
    // get user data
    async fetchUser() {
      try {
        const usersRes = await axios.get("http://127.0.0.1:8000/api/users", {});
        this.users = usersRes.data.data;

        console.log("Logged in user:", this.users);
      } catch (err) {
        console.error(
          "Error fetching users:",
          err.response?.data || err.message
        );
      }
    },
    // get product data
    async fetchProducts() {
      try {
        const productsRes = await axios.get(
          "http://127.0.0.1:8000/api/products",
          {}
        );
        this.products = productsRes.data.data;

        console.log("Products:", this.products);
      } catch (err) {
        console.error(
          "Error fetching products:",
          err.response?.data || err.message
        );
      }
    },
  },
  async mounted() {
    if (!this.token) {
      this.$router.push("/login");
    } else {
      this.fetchUser();
      this.fetchProducts();
    }
  },
};
</script>

<style lang="scss" scoped>
.active {
  background: #dfe1e3;
  color: hsla(0, 0%, 0%, 0.536) C0D;
}
.boxshadow {
  box-shadow: rgba(0, 0, 0, 0.18) 0px 2px 4px;
}
</style>
