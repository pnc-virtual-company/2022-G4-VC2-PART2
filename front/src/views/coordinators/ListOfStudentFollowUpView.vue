<template>
  <div class="w-10/12 m-auto h-screen fixed top-20 right-0 flex justify-center">
      <div class=" w-11/12 ">
          <UserTemplates :listUsers="listStudents" :title="title" @delete_id="deleteUser" :standingPage="standingPage" @set_to_sfu="addToFollupList" />
      </div>
  </div>
</template>

<script>
import axios  from 'axios'
import UserTemplates from '@/components/widget/userList/ListComponent.vue'
export default {
  components:{ UserTemplates },
  data(){
      return {
      standingPage: 'follow', // STUDENTS CREATE INFOR
      title: 'All Lists Of Follow Up', // TITLE OF HOME PAG
      listStudents: []
    
      }
  },
  methods: {
      getDialog(value){
          this.openDialog = value 
      },

      getAllData(){
        axios.get('http://127.0.0.1:8000/api/user').then((response)=>{
            for(var i=0; i< response.data.length;i++){
              if(response.data[i].student[0].if_follow_up == "Yes"){
                this.listStudents.push(response.data[i])
              }
            }
        })
      },

      // DELET DATA FROM STORAGE
    // deleteUser(id){
    //   axios.delete('http://localhost:8000/api/user/'+id).then(() => {
    //       // return this.getAllData()
    //   })
    // },
    // addToFollupList(id){
    //   // for(var i = 0; i < this.listStudents.length; i++){
    //   //   if(this.listStudents[i].id == id){
    //   //     let data = this.listStudents[i].student[0].if_follow_up = 'Yes';
    //   //     axios.get('http://127.0.0.1:8000/api/follow_u/'+id,{if_follow_up: data} ).then(()=>{
    //   //       console.log("Set sucess successfully");
    //   //       return this.getAllData()
    //   //     })
    //   //   }
    //   // }
    //   console.log('Good is Good1', id)
    // },

  },
  mounted() {
    this.getAllData()
    console.log(this.listStudents)
    // return this.listStudents
  }
}
</script>

<style>

</style>