<template>
  <div class="sidebar fixed top-16 bottom-0 lg:left-0 left-[-300px] duration-1000 w-[260px] overflow-auto text-center bg-teal-600 h-screen z-10" >
    <div class="text-gray-100 text-xl">

      <div class="">
        <!-- Teacher Page-->
        <div class="bg-gray-400 p-2.5 mt-0.5 flex items-center px-4 duration-300 cursor-pointer hover:bg-white" :class="{'bg-white':isTeacher}" @click="showTeacher">
          <i class="bi bi-house-door-fill">
        
            <img src="../../assets/teacher.png" alt="" width="40" height="40">
          </i>
          <span class="text-[18px] ml-4 text-black self-center text-xl font-semibold whitespace-nowrap dark:text-white">TEACHERS</span>
        </div>
        <!-- STUDENTs Page -->
        <div class=" bg-gray-400 p-2.5 mt-0.5 flex items-center px-4 duration-300 cursor-pointer  hover:hover:bg-white">
          <router-link to="/studentList" class="flex items-center ">
              <i >
                <img src="../../assets/student.png" alt="" width="40" height="40">
              </i>
              <span class="text-[18px] ml-4 text-black self-center text-xl font-semibold whitespace-nowrap dark:text-white">STUDENTS</span>
          </router-link>
        </div>

          <!-- lIST STUDENT FOLLOW UP -->
        <div class=" bg-gray-400 p-2.5 mt-0.5 flex items-center px-4 duration-300 cursor-pointer  hover:hover:bg-white">
          <router-link to="/studentList" class="flex items-center ">
              <i >
                <img src="../../assets/student.png" alt="" width="40" height="40">
              </i>
              <span class="text-[18px] ml-4 text-black self-center text-xl font-semibold whitespace-nowrap dark:text-white">STUDENTS</span>
          </router-link>
        </div>
        
      </div>
    </div>
  </div>
</template>
<script>

export default {
  data(){
    return {
   
    }

  },
  
}
</script>
<style>
    
</style>