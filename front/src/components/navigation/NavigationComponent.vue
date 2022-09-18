<template >
<div class="flex px-4 py-3 sm:px-4 fixed h-18 z-0 top-0 right-0 items-center justify-end w-full drop-shadow-xl " style="background:var(--main-color)">
  <div class="flex w-8/12 justify-end items-center ...  ">
     <router-link to="/profiles" class="flex justify-start text-white border px-6 rounded py-1 pb-2 hover:bg-cyan-400" style="background:var(--main-color)">
          Veang Kroh
     </router-link>
     <svg class=" absolute mr-1 mx-2 w-5 h-5 text-white" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
  </div>

  <div x-show="open" x-transition:enter="transition ease-out duration-100" 
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 rounded-md shadow-lg md:w-32 mt-[125px] mr-[17px] z-40">

        <div class="py-1 text-blue-800 text-sm rounded-sm border border-main-color shadow-sm">

            <a class="flex justify-cneter py-2 text-sm md:mt-0 focus:text-gray-900 hover:bg-indigo-100 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
             <i>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </i>
              <i>
                Profile
              </i>
            </a>

            <div class="flex px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out focus:outline-none hover:bg-warning hover:text-white" @click="submitLogout">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            logout
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
        isLoggingOut:false
      }
  },
  methods: { 
    hiddeRightbar(){
      this.isShowed = !this.isShowed;
      this.$emit('emits-nav', this.isShowed)
    },
    submitLogout(){
            this.isLoggingOut = true;
            setTimeout(() => {
                this.isLoggingOut = false;
                this.$store.dispatch('logout')
                this.$router.push('/')
            }, 1000);
        },
  },

}
</script> 