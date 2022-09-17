<template>
    <div class="bg-grey-lighter min-h-screen flex flex-col">
      <div
        class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2"
      >
      <div class="align-start">
          <p class="font-semibold">Student <span class="text-blue-400">Follow Up</span></p>
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
            <div class="mb-3 flex justify-end">
              <span class="w-full font-semibold">Forget Passsword?</span>
            </div>
            <div class="flex justify-center">
              <button
                class="w-1/3 text-center align-center px-2.5 py-1.5 rounded hover:bg-green-dark focus:outline-none my-1 bg-blue-400 uppercase font-bold"
                >
                Submit

              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  <script>
import router from '@/router'
import axios from 'axios'
    export default{
      data(){
        return{
          password:""
        }
      },
      methods:{
        checkPassword(){
          axios.post(" http://localhost:8000/api/login",{'email':localStorage.getItem('user'),'password':this.password}).then(response=>{
            console.log(response.data)
            if(response.data.sms !== "Invalid password"){
              localStorage.setItem('token',response.data.token)
              localStorage.setItem('coorId',response.data.id)
              console.log('Login Success')
              if(localStorage.getItem('role') == "coordinator"){
                router.push('/coorNavigation');
                //emit back
                this.$emit('loginSuccess');
              }
            }
          })
        }
      }
    }
  </script>
  <style>
      .icon1 {
          position:relative;
          padding-left: 2.5rem;
          padding-right: 2rem;
          background: url("https://cdn4.iconfinder.com/data/icons/music-ui-solid-24px/24/lock_security_password_encryption-2-256.png") no-repeat left;
          background-size: 35px;
      }
  
  </style>
  