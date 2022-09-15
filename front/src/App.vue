<template>
    <!-- <section> -->
      <!-- <RightBar v-show ="!isClosed" @dataStanding="groupOfBoolean" />
      <NavBar @emits-nav="isHidden"/>  -->
    <!-- </section> -->
    <div class="flex px-4 py-3 sm:px-4 fixed h-18 z-0 top-0 right-0 items-center justify-between w-full drop-shadow-xl" style="background:var(--main-color)">
  <!-- LEFT NAV LOGO MENU TEXT -->
  <div class="w-3/12 flex justify-start">
    <div class="w-1/3 flex justify-start items-center ...">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#2f2f2f" class="w-[40px] h-[40px] bg-white p-1 rounded " @click="hiddeRightbar">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
    </div>
  </div>
  
 <!-- RIGHT NAV PROFILE AND LOGOUT -->
  <div class="flex w-8/12 justify-end items-center ...  ">
     <div class="flex justify-center m-2 text-white">
           Veang Kroh
     </div>
  </div>

</div>

    <div class="sidebar fixed top-16 bottom-0 lg:left-0 left-[-300px] duration-1000 w-[260px] overflow-auto text-center h-screen z-10" style="background:var(--main-color-light)">
    <div class="text-gray-100 text-xl">
      <div class="">
        <!-- Teacher Page-->
          <router-link to="/teacherList" class="bg-gray-400 p-2 flex items-center px-4 duration-300 cursor-pointer border-[1px]">
            <i class="bi bi-house-door-fill">
              <img src="../../front/src/assets/teacher.png" alt="" width="40" height="40">
            </i>
            <span class="text-[18px] ml-4 text-black self-center text-xl font-semibold whitespace-nowrap dark:text-white">List Teacher</span>
        </router-link>
        <!-- STUDENTs PAGES -->
          <router-link to="/studentList" class="bg-gray-400 p-2 flex items-center px-4 duration-300 cursor-pointer border-[1px] hover:hover:bg-white" >
            <i >
              <img src="../../front/src/assets/student.png" alt="" width="40" height="40">
            </i>
            <span class="text-[18px] ml-4 text-black self-center text-xl font-semibold whitespace-nowrap dark:text-white">List Students</span>
          </router-link>
          <!-- LIST Follow UP -->
          <router-link to="/listFollowUp" class="bg-gray-400 p-2 flex items-center px-4 duration-300 cursor-pointer border-[1px] hover:hover:bg-white">
            <i >
              <img src="../../front/src/assets/sfu.png" alt="" width="40" height="40">
            </i>
            <span class="text-[18px] ml-4 text-black self-center text-xl font-semibold whitespace-nowrap dark:text-white">List Follow Up</span>
          </router-link>
         
      </div>
    </div>
  </div>
  <router-view />
</template>
<script>
// import RightBar from '@/components/navigation/RightBarComponent.vue'
// import NavBar from '@/components/navigation/NavigationComponent.vue'
export default {
  // components: {RightBar, NavBar },
  data(){
    return {
      isClosed:false,
      groupBoolean:{},
    }
  },
  methods:{
    isHidden(value){
        this.isClosed = value
    },
    groupOfBoolean(group){
        this.groupBoolean = group
        localStorage.setItem('group', this.groupBoolean)
        // console.log(localStorage.getItem("group"))
        console.log(this.groupBoolean)
    }
  },

}
</script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
  
  :root {
    --main-color: #004581;
    --main-color-light: #018ABD;
    --main-color-active: #abdff2;
  }
  
  * {
    box-sizing: border-box;
  }
  
  html {
    font-family: 'Roboto', sans-serif;
  }
  
  body {
    margin: 0;
  }
a.router-link-exact-active {
  color: white;
  background: var(--main-color-active);
}
a.router-link-exact-active:hover {
  color: white;
  background: var(--main-color-active);
}
  </style>