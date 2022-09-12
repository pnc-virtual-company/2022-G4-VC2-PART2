<template>
  <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000 w-[300px] overflow-y-auto text-center bg-teal-600 h-screen z-30">
    <div class="text-gray-100 text-xl">

      <div class="h-24 mt-1 flex justify-center items-center">
        <i class="rounded-md">
            <img src="../../assets/logo.png" alt="" width="80" height="80">
        </i>
      </div>

      <div class="mt-3">
        <!-- Teacher Page-->
        <div class="bg-gray-400 p-2.5 mt-0.5 flex items-center px-4 duration-300 cursor-pointer hover:bg-white" :class="{'bg-white':isTeacher}" @click="showTeacher">
          <i class="bi bi-house-door-fill">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg> -->
            <img src="../../assets/teacher.png" alt="" width="40" height="40">
          </i>
          <span class="text-[18px] ml-4 text-black self-center text-xl font-semibold whitespace-nowrap dark:text-white">TEACHERS</span>
        </div>
        <!-- STUDENTs Page -->
        <div class=" bg-gray-400 p-2.5 mt-0.5 flex items-center px-4 duration-300 cursor-pointer  hover:hover:bg-white" :class="{'bg-white':isStudent}" @click="showStudent">
          <i >
            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg> -->
            <img src="../../assets/student.png" alt="" width="40" height="40">
          </i>
          <span class="text-[18px] ml-4 text-black self-center text-xl font-semibold whitespace-nowrap dark:text-white">STUDENTS</span>
        </div>
        <!-- lIST STUDENT FOLLOW UP -->
        <div class="bg-gray-400 p-2.5 mt-0.5 flex items-center-md px-4 duration-300 cursor-pointer  hover:hover:bg-white">
          <i >
            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg> -->
            <img src="../../assets/sfu.png" alt="" width="40" height="40">
          </i>
          <span class="text-18px] ml-4 text-black self-center text-xl font-semibold whitespace-nowrap dark:text-white">STUDENTS FOLLOW UP</span>
        </div> 
        
      </div>
    </div>
  </div>
</template>
<script>
import router from '@/router';

export default {
  inject:['isStudent','isTeacher'],
  data(){
    return{
      
    }
  },
  methods:{
    showTeacher(){
      router.push("/teacherList")
    },
    showStudent(){
      router.push("/studentList")
    }
  }
}
</script>
<style>
    
</style>