<template>
 <div>
    <div class="bg-grey-lighter min-h-screen flex flex-col" v-if="!passwordForm">
      <div
        class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2"
      >
        <div class="align-start">
          <p class="font-semibold">
            Student <span class="text-blue-400">Follow Up</span>
          </p>
        </div>
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
          <form @submit.prevent="finalLogin">
            <h1 class="mb-8 text-3xl text-center">Reset New Password</h1>
            <input
              type="password"
              class="block border border-grey-light w-full p-3 rounded mb-4 icon1"
              name="password"
              placeholder="New Password"
              v-model="newPassword"
            />
            <input
              type="password"
              class="block border border-grey-light w-full p-3 rounded mb-4 icon1"
              name="password"
              placeholder="Conform Password "
              v-model="confirmPassword"
            />
            <p v-if="isMatchPwd == false" class="text-red-400">Password doesn't match!!</p>
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
    <div class="bg-grey-lighter min-h-screen flex flex-col" v-if="passwordForm">
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
import router from '@/router';
import ls from 'localstorage-slim'
ls.config.encrypt = true;
import axios from 'axios';
export default {
    data(){
        return{
          password: "",
          isForgetPassword: false,
          isCorrectPassword:null,
          email:ls.get("user"),
          isFileInput:false,
          newPassword:'',
          confirmPassword:'',
          passwordForm:false,
          isMatchPwd:null,
          isPassword:false
        }
    },
    methods:{
      finalLogin(){
        if(this.newPassword == this.confirmPassword){
          let id = JSON.parse(ls.get("id"));
          axios.post("http://127.0.0.1:8000/api/resetPassword/"+id, {'password':this.newPassword}).then(()=>{
            console.log(this.newPassword)
            console.log(id)
            this.passwordForm = true
          }) .catch((error)=>{
            console.log(error);
            alert("please check your confirm password")
          });
        }else{
          this.isMatchPwd = false;
        }
      },
      checkPassword() {
      axios.post(" http://localhost:8000/api/login", {
          email:this.email,
          password: this.password,
        })
        .then((response) => {
          console.log(response.data);
          if (response.data.sms !== "Invalid password") {
            console.log("Login Success");
            if (ls.get("role") == "coordinator") {
              ls.set("coordinator_token", response.data.token);
            }else if(ls.get("role") == "teacher"){
              ls.set("teacher_token", response.data.token);
            }else{
              ls.set("student_token", response.data.token);
            }
            router.push("/navigation");
            this.$emit("loginSuccess");
          }else{
            this.isCorrectPassword = false;
          }
        });
    },
    }


}
</script>

<style>

</style>