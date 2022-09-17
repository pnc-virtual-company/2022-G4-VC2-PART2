<template>
  <div class="sidebar fixed top-16 bottom-0 lg:left-0 left-[-300px] duration-1000 w-[260px] overflow-auto text-center h-screen z-10" style="background:var(--main-color-light)">
    <div class="text-gray-100 text-xl">
      <div class="">
          <router-link to="/teacherList" class=" py-1 flex items-center px-4 duration-300 cursor-pointer">
            <i class="">
              <img src="../../assets/teacher.png" alt="" width="35" height="35">
            </i>
            <span class="text-[15px] ml-4 text-white self-center whitespace-nowrap dark:text-white">Teachers</span>
          </router-link>
     
          <router-link to="/studentList" class=" py-1 flex items-center px-4 duration-300 cursor-pointer " >
            <i >
              <img src="../../assets/student1.png" alt="" width="35" height="35">
            </i>
            <span class="text-[15px] ml-4 text-white self-center whitespace-nowrap dark:text-white">Students</span>
          </router-link>
        </div>

          <!-- lIST STUDENT FOLLOW UP -->
          <router-link to="/listFollowUp" class=" py-1 flex items-center px-4 duration-300 cursor-pointer ">
            <i >
              <img src="../../assets/sfu.png" alt="" width="35" height="35">
            </i>
            <span class="text-[16px] ml-4 text-white self-center whitespace-nowrap dark:text-white">Follow Up</span>
          </router-link>
      </div>
    </div>
  <!-- </div> -->
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