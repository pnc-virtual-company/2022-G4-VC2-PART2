<template >
<div class="flex px-2 sm:px-4 py-2.5 bg-white fixed h-24 z-0 top-0 right-0 items-center justify-end w-full drop-shadow-xl">
  <!-- LEFT NAV LOGO MENU TEXT -->
  <div class="w-4/12 flex justify-between">
    <div class="w-1/3 flex justify-center items-center ...">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#2f2f2f" class="w-[70px] h-[70px] hover:hover:bg-white p-2 rounded-full" @click="hiddeRightbar">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </div>

    <div class="flex-1 w-3/4 flex justify-start ...">
        <div class="rounded-md m-4">
            <img src="../../assets/logo.png" alt="" width="70" height="70">
        </div>
        <div class=" flex items-center m-2">
          <h1 class="font-extrabold text-white">
            STUDENT FOLLOW UP
          </h1>
        </div>
    </div>
  </div>
 <!-- RIGHT NAV PROFILE AND LOGOUT -->
  <div class="flex w-8/12 justify-end items-center ...  ">
     <div class="flex justify-center m-2">
        <div class="1/2 flex justify-between " >
          <i class="">
              <img src="https://i1.sndcdn.com/avatars-000044488704-nrdpod-t500x500.jpg" alt="" width="70" height="70" class="rounded-full">
          </i>
          <i>Veang Kroh</i>
        </div>
        <div class="w-1/2 flex items-center m-4">
          <router-link to="/logout" class="text-black flex justify-center bg-blue-300 rounded-sm py-2 px-4" >
              <p class="text-white text-center">LOGOUT</p>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
              </svg>
            </router-link>
        </div>
     </div>
  </div>

</div>

</template>
<script>
  export default {
  emits:['emits-nav'],
  data(){
      return {
        isShowed: false,
        width: "w-full",
      }
  },
  methods: { 
    hiddeRightbar(){
      this.isShowed = !this.isShowed;
      this.$emit('emits-nav', this.isShowed)
    }
  },
}
</script>