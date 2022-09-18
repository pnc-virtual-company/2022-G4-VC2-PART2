<template>
    <div class="bg-grey-lighter min-h-screen flex flex-col">
      <div
        class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2"
      >
      <div class="align-start">
          <p class="font-semibold">Student <span class="text-blue-400">Follow Up</span></p>
      </div>
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
          <form >
            <form class="p-5 bg-white rounded-b-md">
                <p class="text-blue-400"><a href="">{{this.email}}</a></p>
                <div class="mb-2 mt-2 relative">
                    <label class="block text-gray-700 text-sm font-bold  mb-1">
                        Type code
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-primary focus:shadow-outline"  type="text" placeholder="Verify code..">
                </div>
                <div class= "text-red-500 mb-4"></div>
                <div class="flex text-right justify-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-primary focus:shadow-outline" type="submit">
                        Submit
                    </button>
                </div>
            </form>
          </form>
        </div>
      </div>
    </div>

  </template>
  <script>

// import router from '@/router';
    export default{
     
      data(){
        return{
          email:localStorage.getItem('user')
        }
      },
      methods:{
      
        },
    }
  </script>
  <style>
      .icon {
          position:relative;
          padding-left: 2.5rem;
          padding-right: 2rem;
          background: url("https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/mail-512.png") no-repeat left;
          background-size: 35px;
      }
      .icon1 {
          position:relative;
          padding-left: 2.5rem;
          padding-right: 2rem;
          background: url("https://cdn4.iconfinder.com/data/icons/music-ui-solid-24px/24/lock_security_password_encryption-2-256.png") no-repeat left;
          background-size: 35px;
      }
  
  </style>
  