<template>
  <div>
    <ForgotPassword v-if="isForgetPassword" />
    <div class="bg-grey-lighter min-h-screen flex flex-col">
      <div
        class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2"
      >
        <div class="align-start">
          <p class="font-semibold">
            Student <span class="text-blue-400">Follow Up</span>
          </p>
        </div>
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
          <form @submit.prevent="checkPassword">
            <h1 class="mb-8 text-3xl text-center">Sign in to Account</h1>
            <input
              type="password"
              class="block border border-grey-light w-full p-3 rounded mb-4 icon1"
              name="password"
              placeholder="Password"
              v-model="password"
            />
            <a @click="forgetPassword">Forget Password</a>
            <div class="flex text-right justify-end">
              <button
                class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-primary focus:shadow-outline"
              >
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import router from "@/router";
import axios from "axios";
import ForgotPassword from "./ForgotPassword.vue";
export default {
  components: {
    ForgotPassword,
  },
  data() {
    return {
      password: "",
      isForgetPassword: false,
      email:localStorage.getItem("user")
    };
  },
  methods: {
    checkPassword() {
      axios
        .post(" http://localhost:8000/api/login", {
          email:this.email,
          password: this.password,
        })
        .then((response) => {
          console.log(response.data);
          if (response.data.sms !== "Invalid password") {
            localStorage.setItem("token", response.data.token);
            localStorage.setItem("coorId", response.data.id);
            console.log("Login Success");
            if (localStorage.getItem("role") == "coordinator") {
              router.push("/coorNavigation");
              //emit back
              this.$emit("loginSuccess");
            }
          }
        });
    },
    forgetPassword() {
      axios.post("http://127.0.0.1:8000/api/sendVeifyCode",{'email':this.email}).then(response=>{
        console.log(response.data)
        localStorage.setItem('code',response.data.code)
      })
      if(this.code == localStorage.getItem('code')){
        this.isForgetPassword = true;
      }
    },
  },
};
</script>
<style>
.icon1 {
  position: relative;
  padding-left: 2.5rem;
  padding-right: 2rem;
  background: url("https://cdn4.iconfinder.com/data/icons/music-ui-solid-24px/24/lock_security_password_encryption-2-256.png")
    no-repeat left;
  background-size: 35px;
}
</style>
