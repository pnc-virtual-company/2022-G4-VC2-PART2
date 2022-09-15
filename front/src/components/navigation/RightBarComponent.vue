<template>
  <div class="sidebar fixed top-[62px] bottom-0 lg:left-0 left-[-300px] duration-1000 w-[200px] overflow-auto text-center h-screen z-10" style="background:var(--main-color-light)">
    <div class="text-gray-100 text-xl">
      <div class="">
    
          <router-link to="/teacherList" class="bg-gray-400 p-2 flex items-center px-4 duration-300 cursor-pointer border-b-1">
            <i class="bi bi-house-door-fill">
              <img src="../../assets/teacher.png" alt="" width="40" height="40">
            </i>
            <span class="text-[18px] ml-4 text-black self-center whitespace-nowrap dark:text-white">List Teacher</span>
        </router-link>
     
          <router-link to="/studentList" class="bg-gray-400 p-2 flex items-center px-4 duration-300 cursor-pointer border-[1px]" >
            <i >
              <img src="../../assets/student.png" alt="" width="40" height="40">
            </i>
            <span class="text-[18px] ml-4 text-black self-center whitespace-nowrap dark:text-white">List Students</span>
          </router-link>
        
          <router-link to="/listFollowUp" class="bg-gray-400 p-2 flex items-center px-4 duration-300 cursor-pointer border-[1px]">
            <i >
              <img src="../../assets/sfu.png" alt="" width="40" height="40">
            </i>
            <span class="text-[18px] ml-4 text-black self-center whitespace-nowrap dark:text-white">List Follow Up</span>
          </router-link>
         
      </div>
    </div>
  </div>
</template>
<script>

export default {
 
  data(){
    return {
      isTeacher: false,
      isStudent: false,
      isFollowUp: false,
      getPageStading:{teacher:null,student:null, follow:null}
    }
  },
  methods: {
     
}
} 

</script>

