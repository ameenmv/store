<template>
  <div>
    <Navbar />
    <div class="pt-14 pb-30 flex">
      <div class="left w-[55%] flex justify-center items-center bg-[#CBE4E8]">
        <img class="w-[65%] pt-20" src="../assets/login.jpg" alt="" />
      </div>
      <form
        @submit="onSubmit"
        class="left w-[45%] p-20 px-40 flex flex-col justify-center"
      >
        <h1 class="text-[36px] font-medium">Login in To Exclusive</h1>
        <p class="mt-3 text-[18px]">Enter your details below</p>
        <div class="mt-8">
          <!-- Email -->
          <input
            v-model.trim="form.email"
            @input="setTouched('email')"
            :class="v$.form.email.$error ? 'is-invalid' : ''"
            class="border-[none] pb-2 mt-10 w-[100%] border-b border-[var(--border)] outline-none"
            type="email"
            placeholder="Email"
          />
          <div
            v-for="error of v$.form.email.$errors"
            class="text-[var(--red)] mt-1 font-medium"
            :key="error.$uid"
          >
            {{ error.$message }}
          </div>

          <!-- Password -->
          <input
            v-model.trim="form.password"
            @input="setTouched('password')"
            :class="v$.form.password.$error ? 'is-invalid' : ''"
            class="border-[none] pb-2 mt-10 w-[100%] border-b border-[var(--border)] outline-none"
            type="password"
            placeholder="Password"
          />
          <div
            v-for="error of v$.form.password.$errors"
            class="text-[var(--red)] mt-1 font-medium"
            :key="error.$uid"
          >
            {{ error.$message }}
          </div>
          <div class="flex mt-10 justify-between items-center">
            <button type="submit" class="btn">Log in</button>
            <p class="text-[var(--red)]">Forger Password?</p>
          </div>

          <p class="m-auto mt-8 flex justify-center">
            didn't have account?&nbsp;&nbsp;
            <router-link to="register"
              ><span
                class="pb-1 cursor-pointer border-b border-[var(--border)] font-medium"
                >Sign Up</span
              ></router-link
            >
          </p>
        </div>
      </form>
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";

import useVuelidate from "@vuelidate/core";
import {
  required,
  email,
  alpha,
  numeric,
  minLength,
  maxLength,
} from "@vuelidate/validators";

export default {
  components: {
    Navbar,
    Footer,
  },
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
      },
    };
  },
  validations() {
    return {
      form: {
        name: {
          required,
          minLength: minLength(3),
          maxLength: maxLength(15),
        },
        email: { required, email },
        password: {
          required,
          minLength: minLength(6),
        },
      },
    };
  },
  methods: {
    submitForm() {
      alert("Form submitted!");
    },
    setTouched(theModel) {
      if (theModel == "name" || theModel == "all") {
        this.v$.form.name.$touch();
      }
      if (theModel == "email" || theModel == "all") {
        this.v$.form.email.$touch();
      }
      if (theModel == "password" || theModel == "all") {
        this.v$.form.password.$touch();
      }
    },
    async onSubmit(event) {
      event.preventDefault();
      this.setTouched("all");
      if (!this.v$.$invalid) {
        this.$router.push("/");
      }
    },
  },
};
</script>

<style lang="scss" scoped></style>
