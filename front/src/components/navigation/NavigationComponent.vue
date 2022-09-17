<template >
<div class="flex px-4 py-3 sm:px-4 fixed h-18 z-50 top-0 right-0 items-center justify-end w-full drop-shadow-xl " style="background:var(--main-color)">
  <div class="flex w-4justify-end items-center ">
    <!-- ________STUDENT, ADMIN, COORDINATOR_____ -->
    <div class="group inline-block z-40">
      <button class="outline-none focus:outline-none border px-3 py-2 rounded-sm flex items-center min-w-32">
        <span class="pr-1 font-semibold flex-1 text-white">Student</span>
        <span>
          <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" >
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
          </svg>
        </span>
      </button>
      <!-- ________BUTTON GET TO DO ________-->
      <ul class="bg-gray-500 border rounded-sm transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32 z-40">
        <li class="rounded-sm px-2 py-1 bg-[#018ABD] hover:bg-gray-400 flex justify-start cursor-pointer text-white" @click="$router.push({ path: '/profiles'})">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-white mx-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          Profile
        </li>

        <li class="rounded-sm px-2 py-1 bg-[#018ABD] hover:bg-gray-400 flex justify-start cursor-pointer text-white" @click="$router.push({ path: '/listFollowUp'})">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-white mx-1">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
          </svg>
          Logout
        </li>
      </ul>
      <!-- <Base_Dropdrown>
      </Base_Dropdrown> -->
      <!--__________LOOKING GOOD____________ -->
    </div>
  </div>
</div>
</template>
<script>

export default {

}
  
</script> 
<style>
  li>ul                 { transform: translatex(100%) scale(0) }
  li:hover>ul           { transform: translatex(101%) scale(1) }
  li > button svg       { transform: rotate(-90deg) }
  li:hover > button svg { transform: rotate(-270deg) }
  .group:hover .group-hover\:scale-100 { transform: scale(1) }
  .group:hover .group-hover\:-rotate-180 { transform: rotate(180deg) }
  .scale-0 { transform: scale(0) }
  .min-w-32 { min-width: 8rem }
</style>
