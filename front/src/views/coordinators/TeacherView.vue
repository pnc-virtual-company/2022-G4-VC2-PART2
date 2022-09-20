<template>
   <div class="w-full mt-28 m-aut flex justify-center px-4">
      <div class="w-11/12">
        <Teachercomponent :listUsers="teacherList" :createUsers="teacherInfoCreate" :updateUser="teacherInfoUpdate" :title="title" @delete_id="deleteUser" :standingPage="standingPage" @refresh_data="getAllData"/>
      </div>
  </div> 
</template>
<script>
import axios  from 'axios'
import Teachercomponent from '@/components/widget/userList/ListComponent.vue'
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
      standingPage: 'teacher',        
    }
  },
  methods: {
    // Open dialog
      getDialog(value){
          this.openDialog = value 
      },

      // DELET DATA FROM STORAGE
      deleteUser(id){
        axios.delete('http://localhost:8000/api/user/'+id).then(() => {
            return this.getAllData()
        })
      },
    // GET ALL DATA
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

