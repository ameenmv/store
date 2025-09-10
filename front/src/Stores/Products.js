import { defineStore } from "pinia";
import { ref } from "vue";
import axios from "axios";

export const useProductsStore = defineStore("products", () => {
  const products = ref([]);
  const loading = ref(false);
  const error = ref(null);

  // 🟢 fetch products from API
  const fetchProducts = async () => {
    loading.value = true;
    error.value = null;
    try {
      const res = await axios.get("https://dummyjson.com/products");
      products.value = res.data.products; // عشان الـ API بيرجع object فيه products
    } catch (err) {
      error.value = err.message || "Something went wrong!";
    } finally {
      loading.value = false;
    }
  };

  return {
    products,
    loading,
    error,
    fetchProducts,
  };
});
