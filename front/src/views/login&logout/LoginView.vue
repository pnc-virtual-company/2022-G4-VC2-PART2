<template>
    <FormUserLogin :listAllUser="listOfUser"/>
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
