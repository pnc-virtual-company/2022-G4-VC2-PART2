<template >
<nav class="px-2 sm:px-4 py-2.5 bg-teal-700 fixed w-10/12 h-28 z-0 top-0 right-0 flex items-center justify-end">

  <div class="w-1/4 m-4 p-2 flex">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-12 h-12 hover:hover:bg-emerald-600 p-2 rounded-full">
         <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
  </div>

    <div class="flex justify-center items-center" >
      <h1>STUDENT FOLLOW UP</h1>
    </div>
  </div>

  <div class="container flex items-center justify-end mx-auto mr-4">
    <div class="flex items-center justify-end md:order-2">
      <a href="#" class="flex items-center">
        <i class="p-0.5">
          <img src="https://data.whicdn.com/images/336359929/original.jpg" alt="" width="70" height="70" class="rounded-full mx-2 border-red-600">
        </i>
        <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Veang Kroh</span>
      </a>
    </div>

  </div> 

  <div class="flex items-center p-2 bg-blue-300 rounded-md hover:hover:bg-blue-600 ml-4 px-4 ">
    <router-link to="/logout" class="text-black flex justify-center" >
    <p class="text-white">LOGOUT</p>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
    </svg>
  </router-link>
  </div>

</nav>
</template>
<script>
export default {
    
}
</script>