<template >
<div class="flex px-4 py-2 fixed h-18 top-0 z-10 items-center justify-between w-full drop-shadow-xl " style="background:var(--main-color)">
    <div class="logo w-1/6 px-5 flex justify-start">
       <span  class="hover:bg-blue-400">
        <img src="../../assets/sfu-logo.png" alt="" width="60" height="60">
       </span>
    </div>

    <!-- ___LINK PAGE STUDENT SOCIAL AFIA_____ -->
    <div class="constainer flex justify-between w-8/12 ">
      <!-- _______SEE ONLY STUDETT_______ -->
      <div class="w-8/12 flex justify-end" v-if="false">
          <div class="group inline-block w-5/12  text-center px-4">
            <div @click="$router.push({ path: '/studetnCommentview'})" class="w-11/12 py-1 flex items-center justify-center mx-1 duration-300 cursor-pointer rounded-sm  hover:bg-[#173043]">
              <span class="z-0 mx-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z" />
                </svg>
              </span> 
              <span class="rounded-full text-white w-4 h-4 p-2.5 text-[10px] flex justify-center items-center z-10 absolute left-[815px] " :class="{'bg-red-600':listnoteds.length>0}" v-if="listnoteds.length>0">{{ listnoteds.length }}</span>
              <span class="text-4 text-white self-center whitespace-nowrap dark:text-white">
                Notifications
              </span>
            </div>

            <div class="w-3/12 scale-0 group-hover:scale-100  absolute duration-150 ease-in-out origin-top">
                <div class="rounded-sm z-40 py-2" v-if='listnoteds.length>0'>
                  <span v-for="item of listnoteds" :key="item" class=" rounded-sm px-1 py-1 flex bg-white items-center font-extralight border text-black justify-start cursor-pointer hover:bg-gray-100" 
                    @click="$router.push({ path: '/'})" @mouseover="mouseoverEvent(item.id)">
                    <i class="bg-green-600 rounded-full">
                      <img :src="item.img" alt="" width="40" height="40" class="rounded-full">
                    </i>
                    <i class="mx-2">{{ item.name }}</i>
                    <p class="font-extralight absolute left-[250px]" v-if="item.id != mouseID">{{ item.time }}</p>
                    <p class="font-extralight absolute left-[280px]" v-if="item.id == mouseID" @click="deleteByOne(item.id)"> 
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>
                    </p>
                  </span>
                 
                  <span class="rounded-sm px-1 py-4 flex bg-[#97CBDC] items-center font-extralight border text-black justify-start cursor-pointer" @click="deleteByGroup">
                    <p class="font-extralight absolute left-[250px] hover:text-red-600">Clear All</p>
                  </span>
                </div>
            </div>

          </div>
        </div>
        <!-- _____END STUDENT VIEW_____ -->

      <!-- _____START PAGE VIEW_____ -->
     <div class="page w-4/6 500 flex justify-between px-3"  v-if="checkRole == 'coordinator'">
        <router-link :to="item.link" class="w-2/6 py-1 flex items-center justify-center mx-7 duration-300 cursor-pointer" v-for="item of pages" :key="item">
          <img :src="item.icon" alt="" width="20" class="mr-5">
          <span class="text-4 text-white self-center whitespace-nowrap dark:text-white">{{ item.title }}</span>
        </router-link>
      </div>
      <!-- ____________Teacher Page___________________ -->
     <div class="page w-4/6 500 flex justify-between px-3"  v-if="checkRole == 'teacher'">
        <router-link :to="item.link" class="w-2/6 py-1 flex items-center justify-center mx-7 duration-300 cursor-pointer" v-for="item of teacherPages" :key="item">
          <img :src="item.icon" alt="" width="20" class="mr-5">
          <span class="text-4 text-white self-center whitespace-nowrap dark:text-white">{{ item.teacher }}</span>
        </router-link>
      </div>
      <!-- ____________Students Page___________________ -->
     <div class="page w-4/6 500 flex justify-between px-3"  v-if="checkRole == 'student'">
        <router-link :to="item.link" class="w-2/6 py-1 flex items-center justify-center mx-7 duration-300 cursor-pointer" v-for="item of studentPages" :key="item">
          <img :src="item.icon" alt="" width="20" class="mr-5">
          <span class="text-4 text-white self-center whitespace-nowrap dark:text-white">{{ item.student }}</span>
        </router-link>
      </div>

      <!-- ________STUDENT, ADMIN, COORDINATOR_____ -->
      <div class="group inline-block w-0.5/6 text-center" >
        <button class="outline-none focus:outline-none px-3 py-2 rounded-sm flex items-center min-w-32 hover:bg-[#0b0d4a]">
          <span class="pr-1 flex-1 text-white">Coordinator</span>
          <span>
            <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" >
              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
            </svg>
          </span>
        </button>
      <!-- ________BUTTON GET TO DO ________-->
        <ul class="bg-gra-500 rounded-sm scale-0 group-hover:scale-100 absolute duration-150 ease-in-out origin-top min-w-32 z-40" style="background:var(--main-color)">
          <li class="rounded-sm px-2 py-1 bg-[#004581] hover:bg-gray-400 flex justify-start cursor-pointer text-white" @click="$router.push({ path: '/profiles'})">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-white mx-1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Profile
          </li>
          <li class="rounded-sm px-2 py-1 bg-[#004581] hover:bg-gray-400 flex justify-start cursor-pointer text-white" @click="Logout">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-white mx-1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
            </svg>
            Logout
          </li>
        </ul>
      </div>
      <!-- _________END BUTTON __________ -->
      <!-- _________END PROFILE__________ -->
  </div>
</div>
</template>
<script>
import ls from 'localstorage-slim'
import router from '@/router';
export default {
    data(){
      return {
          pages: [
            {title:'Follow Up', link:'/listFollowUp', icon:'https://cdn-icons-png.flaticon.com/512/8486/8486151.png'},
            {title:'Teachers', link:'/teacherList', icon:'https://cdn-icons-png.flaticon.com/512/65/65882.png'},
            {title:'Students', link:'/listStudent', icon:'https://cdn-icons-png.flaticon.com/512/57/57073.png'},
          ],
          teacherPages: [
            {teacher:'Follow Up', link:'/followUp', icon:'https://cdn-icons-png.flaticon.com/512/8486/8486151.png'},
            {teacher:'Students', link:'/studentList', icon:'https://cdn-icons-png.flaticon.com/512/57/57073.png'},
          ],
          studentPages:[
            {student:'Comments', link:'/studetnCommentview', icon:'https://cdn-icons-png.flaticon.com/512/8486/8486151.png'},
          ],
          listnoteds: [
            {id:1, name: 'Veang Ly', time: '8:00 PM', img:'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/480px-User_icon_2.svg.png'},
            {id:2, name: 'Nga Ly', time: '9:00 AM', img:'https://cdn-icons-png.flaticon.com/512/149/149071.png'},
            {id:3, name: 'Hak Ly', time: '10:00 PM', img:'https://cdn-icons-png.flaticon.com/512/219/219986.png'},
          ],
          mouseID: '',
          checkRole: ls.get("role"),
          isTeacher: false,
          isStudent: false,
          isFollowUp: false,
          getPageStading: { teacher: null, student: null, follow: null },
      }
    },
    methods: {
      Logout(){
          localStorage.removeItem(ls.get('role')+'_token');
          localStorage.removeItem('role',)
          localStorage.removeItem('user');
          localStorage.removeItem('email');
          router.push('/')
      },
       mouseoverEvent(id){
         this.mouseID = id;
       },
       deleteByOne(id){
        for (var i = 0; i < this.listnoteds.length; i++){
          if(this.listnoteds[i].id == id){
            this.listnoteds.splice(i, 1);
          }
        }
       },
       deleteByGroup(){
        for (var i = 0; i < this.listnoteds.length; i++){
          // this.deleteByOne(this.listnoteds[i].id); 
          this.listnoteds.splice(i, 1);
        }
       }
    }
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
