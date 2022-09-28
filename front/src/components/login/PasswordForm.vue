<template>
  <div>
    <ForgotPassword v-if="isForgetPassword" />
    <div class="bg-grey-lighter min-h-screen flex flex-col" v-if="!isForgetPassword">
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
            <p v-if="isCorrectPassword==false" class="text-red-500">Incorrect Password!</p>
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
import ls from 'localstorage-slim'
ls.config.encrypt = true;
export default {
  components: {
    ForgotPassword,
  },
  props:['isPassword'],
  data() {
    return {
      password: "",
      isForgetPassword: false,
      isCorrectPassword:null,
      email:ls.get("user")
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
            console.log("Login Success");
            if (ls.get("role") == "coordinator") {
              ls.set("coordinator_token", response.data.token);
              router.push("/listStudent");
            }else if(ls.get("role") == "teacher"){
              ls.set("teacher_token", response.data.token);
              router.push("/studentList");
            }else{
              ls.set("student_token", response.data.token);
              router.push("/studetnCommentview");
            }
            this.$emit("loginSuccess");
          }
        });
    },
    forgetPassword() {
      axios.post("http://127.0.0.1:8000/api/sendVeifyCode",{'email':this.email}).then(response=>{
        console.log(response.data)
        ls.set('code',response.data.code)
      })
      this.isForgetPassword = true
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
