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
            <p class="text-[18px] font-medium">Add Products</p>
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
            <p class="text-[18px] font-medium">Account Details</p>
          </div>
        </div>
        <div class="w-[72%] p-8 bg-white rounded-[12px] boxshadow">
          <div v-if="active === 'one'">
            <div class="flex gap-3 flex-col w-[100%]">
              <div class="flex flex-col gap-3 w-[100%]">
                <label class="font-medium">Product Name</label>
                <input
                  v-model="productName"
                  class="border border-[#00000021] py-2 px-2 outline-none rounded-[4px]"
                  type="text"
                  name=""
                  id=""
                />
                <label class="font-medium">Product Description</label>
                <input
                  v-model="productDescription"
                  class="border border-[#00000021] py-2 px-2 outline-none rounded-[4px]"
                  type="text"
                  name=""
                  id=""
                />
                <label class="font-medium">Product Price</label>
                <input
                  v-model="productPrice"
                  class="border border-[#00000021] py-2 px-2 outline-none rounded-[4px]"
                  type="text"
                  name=""
                  id=""
                />
                <label class="font-medium">Stock</label>
                <input
                  v-model="productStock"
                  class="border border-[#00000021] py-2 px-2 outline-none rounded-[4px]"
                  type="text"
                  name=""
                  id=""
                />
                <label class="font-medium">Select Category</label>
                <select
                  v-model="productCategory"
                  class="border border-[#00000021] py-2 px-2 outline-none rounded-[4px]"
                  type="text"
                  name=""
                  id=""
                >
                  <option value="phones">phones</option>
                  <option value="phones">computers</option>
                  <option value="phones">smartwatch</option>
                  <option value="phones">camera</option>
                  <option value="phones">gaming</option>
                  <option value="phones">headphones</option>
                </select>

                <button
                  @click="addProduct"
                  class="btn w-[fit-content] self-center mt-4"
                >
                  Add
                </button>
              </div>
            </div>
          </div>
          <div v-if="active === 'two'">
            <p class="font-semibold text-[22px]">Account Details</p>
            <p class="mt-2 opacity-[.5] font-medium">
              Manage Your Exclusive Profile
            </p>
            <div class="flex mt-10 gap-8 items-center p-6">
              <img
                v-if="user && user.image_url"
                :src="`http://127.0.0.1:8000/storage/${user.image_url}`"
                class="w-[100px] h-[100px] rounded-[50%]"
                alt=""
              />
              <img
                v-else
                src="../assets/user.jpg"
                class="w-[100px] h-[100px] rounded-[50%]"
                alt=""
              />

              <div class="flex flex-col">
                <p class="font-medium">Profile Picture</p>
                <p class="mt-2 opacity-[.5] font-medium">
                  PNG, JPG, GIF max size of 5MB
                </p>
              </div>
              <input
                ref="fileInput"
                @change="handleFile"
                type="file"
                accept="image/*"
                class="p-4 border border-[var(--border)] font-semibold cursor-pointer w-[300px] rounded-[30px]"
                placeholder="Change Avatar "
              />
            </div>
            <div class="flex gap-3 mt-10 flex-col w-[100%]">
              <div class="flex flex-col gap-3 w-[100%]">
                <label class="font-medium">Name</label>
                <input
                  v-model="form.name"
                  @input="setTouched('name')"
                  :class="v$.form.name.$error ? 'is-invalid' : ''"
                  class="border border-[#00000021] py-2 px-2 outline-none rounded-[4px]"
                  :placeholder="user ? user.name : ''"
                  type="name"
                  name=""
                  id=""
                />
                <div
                  v-for="error of v$.form.name.$errors"
                  :key="error.$uid"
                  class="text-[var(--red)] mt-1 font-medium"
                >
                  {{ error.$message }}
                </div>
              </div>
              <div class="flex flex-col gap-3 w-[100%]">
                <label class="font-medium">Email</label>
                <input
                  v-model="form.email"
                  @input="setTouched('email')"
                  :class="v$.form.email.$error ? 'is-invalid' : ''"
                  class="border border-[#00000021] py-2 px-2 outline-none rounded-[4px]"
                  :placeholder="user ? user.email : ''"
                  type="email"
                />

                <div
                  v-for="error of v$.form.email.$errors"
                  :key="error.$uid"
                  class="text-[var(--red)] mt-1 font-medium"
                >
                  {{ error.$message }}
                </div>
                <p
                  v-if="errors.email"
                  class="text-[var(--red)] mt-1 font-medium"
                >
                  {{ errors.email[0] }}
                </p>
              </div>
              <div class="flex flex-col gap-3 w-[100%]">
                <label class="font-medium">Phone</label>
                <input
                  v-model="form.phone"
                  @input="setTouched('phone')"
                  :class="v$.form.phone.$error ? 'is-invalid' : ''"
                  class="border border-[#00000021] py-2 px-2 outline-none rounded-[4px]"
                  :placeholder="user ? user.phone : ''"
                  type="phone"
                  name=""
                  id=""
                />
                <div
                  v-for="error of v$.form.phone.$errors"
                  :key="error.$uid"
                  class="text-[var(--red)] mt-1 font-medium"
                >
                  {{ error.$message }}
                </div>
              </div>
              <div class="flex flex-col gap-3 w-[100%]">
                <label class="font-medium">Address</label>
                <input
                  v-model="form.address"
                  @input="setTouched('address')"
                  :class="v$.form.address.$error ? 'is-invalid' : ''"
                  class="border border-[#00000021] py-2 px-2 outline-none rounded-[4px]"
                  :placeholder="user ? user.address : ''"
                  type="Address"
                  name=""
                  id=""
                />
                <div
                  v-for="error of v$.form.address.$errors"
                  :key="error.$uid"
                  class="text-[var(--red)] mt-1 font-medium"
                >
                  {{ error.$message }}
                </div>
              </div>
            </div>
            <div class="flex items-center justify-between mt-10">
              <button class="btn">Delete Account</button>
              <button @click="update" class="btn !bg-[#000222]">Update</button>
            </div>
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
const token = localStorage.getItem("token");

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
  components: { Navbar2, Footer },
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      token: localStorage.getItem("token"),
      userId: localStorage.getItem("userId"),
      active: "one",
      users: [],
      user: null,
      form: {
        name: "",
        email: "",
        phone: "",
        address: "",
      },
      changeimg: "",
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
    handleFile(event) {
      const file = event.target.files[0];
      if (file) {
        this.changeimg = file;
      }
    },
    setTouched(theModel) {
      if (theModel == "name" || theModel == "all") {
        this.v$.form.name.$touch();
      }
      if (theModel == "email" || theModel == "all") {
        this.v$.form.email.$touch();
      }
      if (theModel == "phone" || theModel == "all") {
        this.v$.form.phone.$touch();
      }
      if (theModel == "address" || theModel == "all") {
        this.v$.form.address.$touch();
      }
    },
    async fetchUser() {
      try {
        const usersRes = await axios.get("http://127.0.0.1:8000/api/users", {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        });
        this.users = usersRes.data.data;
        const user = this.users.find((i) => i.id == this.userId);
        this.user = user;
        this.form.name = this.user.name;
        this.form.email = this.user.email;
        this.form.phone = this.user.phone;
        this.form.address = this.user.address;
        this.errors = "";

        console.log("Logged in user:", this.user);
      } catch (err) {
        console.error(
          "Error fetching users:",
          err.response?.data || err.message
        );
      }
    },

    async addProduct() {
      const newProduct = {
        name: this.productName,
        description: this.productDescription,
        price: this.productPrice,
        stock: this.productStock,
        category: this.productCategory,
      };
      console.log(newProduct);
    },

    async update() {
      this.setTouched("all");

      const formData = new FormData();
      if (this.changeimg) {
        // اسم الحقل لازم يطابق اللي في Laravel
        formData.append("image_url", this.changeimg);
      }
      formData.append("name", this.form.name);
      formData.append("email", this.form.email);
      formData.append("phone", this.form.phone);
      formData.append("address", this.form.address);

      try {
        await axios.post(
          `http://127.0.0.1:8000/api/users/${this.userId}?_method=PUT`, // 👈 خليها POST مع _method=PUT
          formData,
          {
            headers: {
              Authorization: `Bearer ${this.token}`,
              "Content-Type": "multipart/form-data",
            },
          }
        );
        console.log("Profile updated:", formData);
        this.changeimg = "";
        if (this.$refs.fileInput) {
          this.$refs.fileInput.value = "";
        }

        this.fetchUser();
      } catch (err) {
        if (err.response && err.response.data.errors) {
          this.errors = err.response.data.errors;
          console.error("Validation errors:", this.errors);
        }
        console.error(
          "Error updating profile:",
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
