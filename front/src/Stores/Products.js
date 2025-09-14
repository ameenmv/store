// stores/cart.js
import { defineStore } from "pinia";

export const useCartStore = defineStore("cart", {
  state: () => ({
    cartId: null,
  }),
  actions: {
    setCartId(id) {
      this.cartId = id;
    },
    clearCart() {
      this.cartId = null;
    },
  },
  persist: true,
});
