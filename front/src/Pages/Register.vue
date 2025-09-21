<template>
  <div>
    <Navbar />
    <div class="pt-14 pb-30 flex">
      <div class="left w-[55%] flex justify-center items-center bg-[#CBE4E8]">
        <img class="w-[65%] pt-20" src="../assets/login.jpg" alt="" />
      </div>

      <div class="left w-[45%] p-20 px-40 flex flex-col justify-center">
        <h1 class="text-[36px] font-medium">Create an account</h1>
        <p class="mt-3 text-[18px]">Enter your details below</p>

        <form @submit="onSubmit" class="mt-8">
          <!-- Name -->
          <input
            v-model.trim="form.name"
            @input="setTouched('name')"
            :class="v$.form.name.$error ? 'is-invalid' : ''"
            class="border-[none] pb-2 w-[100%] border-b border-[var(--border)] outline-none"
            type="text"
            placeholder="Name"
          />
          <div
            v-for="error of v$.form.name.$errors"
            class="text-[var(--red)] mt-1 font-medium"
            :key="error.$uid"
          >
            {{ error.$message }}
          </div>

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
          <p v-if="errors.email" class="text-[var(--red)] mt-1 font-medium">
            {{ errors.email[0] }}
          </p>

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
          <p v-if="errors.password" class="text-[var(--red)] mt-1 font-medium">
            {{ errors.password[0] }}
          </p>

          <!-- phone -->
          <input
            v-model.trim="form.phone"
            @input="setTouched('phone')"
            :class="v$.form.phone.$error ? 'is-invalid' : ''"
            class="border-[none] pb-2 mt-10 w-[100%] border-b border-[var(--border)] outline-none"
            type="phone"
            placeholder="phone"
          />
          <div
            v-for="error of v$.form.phone.$errors"
            class="text-[var(--red)] mt-1 font-medium"
            :key="error.$uid"
          >
            {{ error.$message }}
          </div>
          <p v-if="errors.phone" class="text-[var(--red)] mt-1 font-medium">
            {{ errors.phone[0] }}
          </p>

          <!-- Address -->
          <input
            v-model.trim="form.address"
            @input="setTouched('address')"
            :class="v$.form.address.$error ? 'is-invalid' : ''"
            class="border-[none] pb-2 mt-10 w-[100%] border-b border-[var(--border)] outline-none"
            type="address"
            placeholder="address"
          />
          <div
            v-for="error of v$.form.address.$errors"
            class="text-[var(--red)] mt-1 font-medium"
            :key="error.$uid"
          >
            {{ error.$message }}
          </div>
          <p v-if="errors.address" class="text-[var(--red)] mt-1 font-medium">
            {{ errors.address[0] }}
          </p>

          <!-- role -->
          <select
            v-model.trim="form.role"
            @input="setTouched('role')"
            class="border-[none] pb-2 mt-10 w-[100%] border-b border-[var(--border)] outline-none cursor-pointer"
            type="role"
            placeholder="role"
          >
            <option value="customer">customer</option>
            <option value="company">company</option>
          </select>

          <button type="submit" class="btn mt-10 w-[100%]">
            Create Account
          </button>

          <button
            style="background: transparent"
            class="btn !text-[black] mt-6 w-[100%] flex justify-center items-center border border-[var(--border)]"
          >
            <svg
              width="25px"
              fill="black"
              class="mr-2"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 640 640"
            >
              <path
                d="M564 325.8C564 467.3 467.1 568 324 568C186.8 568 76 457.2 76 320C76 182.8 186.8 72 324 72C390.8 72 447 96.5 490.3 136.9L422.8 201.8C334.5 116.6 170.3 180.6 170.3 320C170.3 406.5 239.4 476.6 324 476.6C422.2 476.6 459 406.2 464.8 369.7L324 369.7L324 284.4L560.1 284.4C562.4 297.1 564 309.3 564 325.8z"
              />
            </svg>
            <p>Sign up with Google</p>
          </button>

          <p class="m-auto mt-6 flex justify-center">
            Already have account?&nbsp;&nbsp;
            <router-link to="login">
              <span
                class="pb-1 cursor-pointer border-b border-[var(--border)] font-medium"
              >
                Log in
              </span>
            </router-link>
          </p>
        </form>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../components/Navbar.vue";
import Footer from "../components/Footer.vue";

import axios from "axios";

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
        phone: "",
        address: "",
        role: "customer",
      },
      errors: {},
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
        phone: {
          required,
          numeric,
          minLength: minLength(10),
        },
        address: {
          required,
          minLength: minLength(2),
        },
      },
    };
  },
  methods: {
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
      if (theModel == "phone" || theModel == "all") {
        this.v$.form.phone.$touch();
      }
      if (theModel == "address" || theModel == "all") {
        this.v$.form.address.$touch();
      }
    },

    async onSubmit(event) {
      event.preventDefault();
      this.setTouched("all");

      const formData = {
        name: this.form.name,
        email: this.form.email,
        password: this.form.password,
        phone: this.form.phone,
        address: this.form.address,
        role: this.form.role,
      };
      console.log(formData);

      try {
        const res = await axios.post(
          "http://127.0.0.1:8000/api/users",
          formData,
          {
            headers: {
              "Content-Type": "application/json",
            },
          }
        );

        // اصفر الفيلدس
        this.form.name = "";
        this.form.email = "";
        this.form.password = "";
        this.form.phone = "";
        this.form.address = "";
        this.form.role = "";
        this.errors = "";
        this.v$.$reset();
        // اوديه للوجين
        this.$router.push("/login");

        console.log("User registered successfully:", res.data);
        errors.value = {};
      } catch (err) {
        if (err.response && err.response.data.errors) {
          this.errors = err.response.data.errors;
        } else {
          console.error("Error message:", err.message);
        }
      }
    },
  },
};
</script>

<style lang="scss" scoped></style>
