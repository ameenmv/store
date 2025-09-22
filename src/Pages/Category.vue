<template>
  <div>
    <Navbar />
    <div class="">
      <div
        class="containerr border-b border-[var(--border)] !pt-[100px] !pb-[50px]"
      >
        <div class="header">
          <div class="rectangle"></div>
          <p>Our Products</p>
        </div>
        <div class="header2">
          <h1>{{ category }} products</h1>
        </div>

        <!-- Loading & Error -->
        <p class="mt-20 font-bold text-[30px]" v-if="loading">Loading...</p>
        <p v-if="error" class="mt-20 font-bold text-[30px]">{{ error }}</p>

        <!-- Products -->
        <div
          class="products justify-around flex-wrap"
          v-if="!loading && !error && filteredProducts.length > 0"
        >
          <div
            v-for="product in filteredProducts"
            @click="details(product.id, product.category.name)"
            :key="product.id"
            class="product hover:scale-105 transition"
          >
            <div class="imgbg">
              <img
                :src="
                  product.image
                    ? `http://127.0.0.1:8000/storage/${product.image}`
                    : 'https://via.placeholder.com/200'
                "
                alt=""
              />
            </div>
            <p class="title">{{ product.name }}</p>
            <div class="flex">
              <p class="price">${{ product.price }}</p>
            </div>
          </div>
        </div>

        <!-- لو مفيش منتجات -->
        <p
          v-if="!loading && !error && filteredProducts.length === 0"
          class="mt-20 font-bold text-[30px]"
        >
          No products found in this category
        </p>

        <div class="flex justify-center items-center mt-[60px]">
          <div class="btn">View All Products</div>
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
      products: [],
      loading: true,
      error: null,
    };
  },
  computed: {
    category() {
      return this.$route.params.category || "all";
    },
    filteredProducts() {
      if (this.category.toLowerCase() === "all") {
        return this.products;
      }
      return this.products.filter(
        (p) => p.category.name.toLowerCase() === this.category.toLowerCase()
      );
    },
  },
  methods: {
    details(id, category) {
      this.$router.push(`/${category}/${id}`);
    },
  },
  async mounted() {
    try {
      const res = await axios.get("http://127.0.0.1:8000/api/products");
      this.products = res.data.data;
      this.loading = false;

      const categories = [
        "all",
        ...new Set(this.products.map((p) => p.category.name.toLowerCase())),
      ];

      if (!categories.includes(this.category.toLowerCase())) {
        this.error = "Category not found";
      }
    } catch (err) {
      this.error = "Failed to load products";
      this.loading = false;
      console.error("Error loading products:", err);
    }
  },
};
</script>
