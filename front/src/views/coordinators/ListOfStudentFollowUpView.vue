<template>
  <div class="w-10/12 m-auto h-screen fixed top-20 right-0 flex justify-center">
      <div class=" w-11/12 ">
          <UserTemplates :listUsers="listStudents" :title="title" @delete_id="deleteUser" :standingPage="standingPage"/>
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
      listStudents: [
        {id:1, first_name: 'Rony', last_name: 'himly', batch: 2022, class: 'WEB 2022-A',subject: 'HTML'},
        {id:2, first_name: 'Rono', last_name: 'himhey', batch: 2022, class: 'WEB 2022-A',subject: 'PLL'},
        {id:3, first_name: 'Ronnus', last_name: 'himhy', batch: 2022, class: 'WEB 2022-A',subject: 'HEL'},
        {id:4, first_name: 'Ronuy', last_name: 'himhok', batch: 2022, class: 'WEB 2022-A',subject: 'HTML'},
        {id:5, first_name: 'Ronon', last_name: 'himha', batch: 2022, class: 'WEB 2022-A',subject: 'HTML'},
        {id:6, first_name: 'Ronana', last_name: 'himo', batch: 2022, class: 'WEB 2022-A',subject: 'HTML'},
      ]
      }
  },
  methods: {
      getDialog(value){
          this.openDialog = value 
      },

      getAllData(){
          axios.get('http://127.0.0.1:8000/api/getUserBy/student').then((response)=>{
              // this.listStudents = response.data
              console.log(response.data)
          })
      },
      // DELET DATA FROM STORAGE
    // deleteUser(id){
    //   axios.delete('http://localhost:8000/api/user/'+id).then(() => {
    //       // return this.getAllData()
    //   })
    // },
   
  },
  mounted() {
      return this.listStudents;
  }
}
</script>

<style>

</style>