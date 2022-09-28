<template>
    <div class="container fixed top-16 flex justify-between">
        <!-- __TITLE CARD show leftBar__ -->
        <div class="leftBar w-3/12 h-screen shadow-md px-1">
            <!--____ CARD TITLE___ -->
            <div class="py-4 shadow-md w-full bg-blue-100 text-center">
                <div class="text-lg font-bold text-slate-700">Story Follow Up</div>
            </div>
            <!-- _____CARD BODY______-->
            <div class="shadow-md w-full bg-white pl-0.5 pr-1 mb-0.5 box" v-if="status != 'No'">
                <div class="flex justify-between py-1">
                    <span class="text-[10px] bg-green-400 rounded-full w-4 h-4 text-white flex justify-center items-center">{{i}}</span> 
                    <span class="text-red-400 text-[10px]" :class="{'text-green-400':isClosed}">{{ message && isClosed?message:'Closed'}}</span> 
                </div>
                <div class="text-center">
                    <span>Lowest html</span>
                </div>
                <div class="flex justify-between py-1">
                    <span class="text-[8px]">Start Date: 22/09/2022</span> 
                    <span class="text-[8px]">Asigned by: <i class="text-blue-600">Rady Y</i></span> 
                </div>
            </div> 
            <div class=" w-full h-96 bg-white pl-0.5 pr-1 mb-0.5 box" v-if="status == 'No'">
               <h1 class="text-2xl text-bold my-4 capitalize">You not in follow up now.</h1>
               <img class="w-52 h-52 mt-20"  src="https://cdn-icons-png.flaticon.com/512/4729/4729333.png" alt="">
            </div> 
        </div>
        <!--___CARD BODY for Comment interface___ -->
        <div class="rightBar w-9/12 h-screen bg-[#DDE8F0] px-3">
            <!-- <div class="w-full">
                <input  class="p-2 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write a message..." required>
            </div> -->

        </div>
    </div>
</template>
<script>
import axios from 'axios'
import ls from 'localstorage-slim'
ls.config.encrypt = true;
export default {
    data(){
        return {
            message: 'In progrees',
            isClosed: false,
            users:{},
            user_id:ls.get('id'),
            status:{}
        }
    },
    methods: {
         // GET DATA OF USER
        getUserFromAPI(){
            axios.get("http://127.0.0.1:8000/api/user/"+this.user_id).then((res)=>{
                this.users = res.data[0];
                this.status = this.users.student[0].if_follow_up
               console.log( this.status)
                
            })
        }
    },
    mounted() {
        this.getUserFromAPI()
    }
}       
</script>
<style>
    
</style>