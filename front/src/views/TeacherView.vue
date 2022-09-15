<template>
  <div class="w-10/12 m-auto h-screen fixed top-20 right-0 flex justify-center">
      <div class=" w-11/12">
        <Teachercomponent :listUsers="teacherList" :createUsers="teacherInfoCreate" :updateUser="teacherInfoUpdate" :title="title" @delete_id="deleteUser"/>
      </div>
  </div>

</template>
<script>
import Teachercomponent from '@/components/users/ListComponent.vue'
import axios  from 'axios'
export default {
  components:{
    Teachercomponent
  },
  data(){
      return {
      teacherInfoCreate: { title: 'Create Teacher',button: "Sign up", to_do: "create", role: 'teacher'},// TEACHER CREATE INFOR
      teacherInfoUpdate: { title: 'Edit Teacher',button: "Update", to_do: "update", role: 'teacher'}, // TEACHER UPDATE INFOR
      title: 'Let See All List Of TeacheerS!', // TITLE OF HOME PAGE
      teacherList: [],
         
    }
  },
  methods: {
    // Open dialog
      getDialog(value){
          this.openDialog = value 
      },
      // DELET DATA FROM STORAGE
      deleteUser(id){
      for(var i = 0; i < this.teacherList.length; i++){
        if(this.teacherList[i].id == id){
          this.teacherList.splice(i,1)
            console.log('Succesfull')
        }
      }
    },
    getAllData(){
        axios.get('http://127.0.0.1:8000/api/getUserBy/teacher').then((response)=>{
            this.teacherList = response.data
            console.log(response.data)
        })
    },
  },
  mounted() {
      return this.getAllData();
    }
  
}
</script>
<style>
  
</style>

