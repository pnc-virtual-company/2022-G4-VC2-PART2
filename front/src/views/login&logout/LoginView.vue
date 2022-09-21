<template>
  <div class=" flex justify-evenly ">
    <div  class=" flex flex-col items-center justify-center px-2 ">
        <div>
            <img class="h-24 w-24 rounded-full"
                    src="../../assets/logo.png">
                </div>
                <p class="text-2xl">Please input your <span class="text-orange-400 text-3xl">information</span></p>  
        <div>
            <div class="">
                <img class="h-80 w-80 "
                src="../../assets/homepageImg.jpg">
            </div>
        </div>
    </div>
    <div>
        <FormUserLogin :listAllUser="listOfUser"/>
    </div> 
 </div> 
</template>
<script>
import FormUserLogin from '@/components/login/EmailForm.vue' 
import axios from 'axios'

export default{
    components:{
        FormUserLogin,
    },
    data() {
        return{
            listOfUser:[]
        }
    },
    methods:{
        getAllStudent(){
            axios.get("http://127.0.0.1:8000/api/user").then(response=>{
                this.listOfUser = response.data 
            })
        }
    },
    mounted(){
        this.getAllStudent()
    }
}
</script>
