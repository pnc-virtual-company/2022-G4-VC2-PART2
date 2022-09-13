<template >
<div class="flex px-4 py-3 sm:px-4 fixed h-18 z-0 top-0 right-0 items-center justify-between w-full drop-shadow-xl" style="background:var(--main-color)">
  <!-- LEFT NAV LOGO MENU TEXT -->
  <div class="w-3/12 flex justify-center">
    <div class="w-1/3 flex justify-center items-center ...">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#2f2f2f" class="w-40px] h-[40px] hover:hover:bg-gray-600 p-1 rounded" @click="hiddeRightbar">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </div>

    <div class="flex-1 w-3/4 flex justify-start ...">
        <div class=" flex items-center m-2 text-white">
            STUDENT FOLLOW UP
        </div>
    </div>
  </div>
 <!-- RIGHT NAV PROFILE AND LOGOUT -->
  <div class="flex w-8/12 justify-end items-center ...  ">
     <div class="flex justify-center m-2 text-white">
           Veang Kroh
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