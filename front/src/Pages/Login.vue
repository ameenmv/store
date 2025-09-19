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
        email: "",
        password: "",
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

      const formData = {
        email: this.form.email,
        password: this.form.password,
        device_name: "iphone",
      };

      try {
        const res = await axios.post(
          "http://127.0.0.1:8000/api/login",
          formData,
          {
            headers: { "Content-Type": "application/json" },
          }
        );

        const token = res.data; // الـ token اللي رجع من السيرفر
        localStorage.setItem("token", token);

        // هات بيانات اليوزرين
        const usersRes = await axios.get("http://127.0.0.1:8000/api/users", {
          headers: { Authorization: `Bearer ${token}` },
        });

        const users = usersRes.data.data;
        const loggedUser = users.find(
          (u) => u.email.toLowerCase() === this.form.email.toLowerCase()
        );

        if (!loggedUser) {
          throw new Error("User not found in API");
        }

        localStorage.setItem("role", loggedUser.role);
        localStorage.setItem("userId", loggedUser.id);

        // نظّف الفورم
        this.form.email = "";
        this.form.password = "";
        this.errors = {};
        this.v$.$reset();

        // وديه حسب الـ role
        if (loggedUser.role === "admin") {
          this.$router.push("/admin");
        } else if (loggedUser.role === "company") {
          this.$router.push("/company");
        } else {
          this.$router.push("/");
        }
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
