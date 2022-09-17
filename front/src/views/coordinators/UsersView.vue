<template>
    <div class="w-10/12 m-auto h-screen fixed top-20 right-0 flex justify-center">
        <div class=" w-11/12 ">
            <UserTemplates :listUsers="listStudents" :createUsers="studentInfoCreate" :updateUser="studentInfoUpdate" :title="title" @delete_id="deleteUser" :standingPage="standingPage" @refresh_data="getAllData"/>
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
        studentInfoCreate: { title: 'Create Students',button: "Sign up", to_do: "create", role: 'student'},// STUDENTS CREATE INFOR
        studentInfoUpdate: { title: 'Edit Student',button: "Update", to_do: "update", role: 'student'}, // STUDENTS UPDATE INFOR
        title: 'Let See All List Of STUDENTS!', // TITLE OF HOME PAG
        listStudents: [],
        standingPage: 'student',
        }
    },
    methods: {
        getDialog(value){
            this.openDialog = value 
        },
        // GET ALL DATABASE
        getAllData(){
            axios.get('http://127.0.0.1:8000/api/getUserBy/student').then((response)=>{
                this.listStudents = response.data
                console.log(response.data)
            })
        },
        // DELET DATA FROM STORAGE
      deleteUser(id){
        axios.delete('http://localhost:8000/api/user/'+id).then(() => {
            return this.getAllData()
        })
      },

    },
    mounted() {
        this.getAllData()
        console.log(this.listStudents)
        // return this.getAllData();
    }
}
</script>

