<template>
 <div>
  <PasswordForm v-if="passwordForm "/>
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
import axios from 'axios';
import PasswordForm from './PasswordForm.vue'
export default {
  components:{
    PasswordForm
  },
    data(){
        return{
            isFileInput:false,
            newPassword:'',
            confirmPassword:'',
            passwordForm:false
        }
    },
    methods:{
        finalLogin(){
            if(this.newPassword == this.confirmPassword){
               let id = JSON.parse(localStorage.getItem("id"));
               axios.post("http://127.0.0.1:8000/api/resetPassword/"+id, {'password':this.newPassword}).then(()=>{
                console.log(this.newPassword)
                console.log(id)
                this.passwordForm = true
             
               }) .catch((error)=>{
                  console.log(error);
                  alert("please check your confirm password")
        }
        );
            }
        },

    }


}
</script>

<style>

</style>