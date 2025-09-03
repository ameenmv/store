<template>
  <div>
    <Navbar />
    <Header />
  </div>
</template>

<script>
import Header from "../components/Header.vue";
import Navbar from "../components/Navbar.vue";

export default {
  name: "Home",
  components: {
    Navbar,
    Header,
  },
};
</script>

<style lang="scss" scoped></style>
