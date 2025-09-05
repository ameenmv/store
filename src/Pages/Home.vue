<template>
  <div class="">
    <Navbar />
    <Header />
    <Flash />
    <Categories />
    <Best />
    <Jbl />
    <OurProducts />
    <Featured />
    <Last />
    <Footer />
  </div>
</template>

<script>
import Best from "../components/Best.vue";
import Categories from "../components/Categories.vue";
import Featured from "../components/Featured.vue";
import Flash from "../components/Flash.vue";
import Footer from "../components/Footer.vue";
import Header from "../components/Header.vue";
import Jbl from "../components/Jbl.vue";
import Last from "../components/last.vue";
import Navbar from "../components/Navbar.vue";
import OurProducts from "../components/OurProducts.vue";

export default {
  name: "Home",
  components: {
    Navbar,
    Header,
    Flash,
    Categories,
    Best,
    Jbl,
    OurProducts,
    Featured,
    Last,
    Footer,
  },
};
</script>

<style lang="scss" scoped></style>
