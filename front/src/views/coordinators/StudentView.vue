<template>
    <div class="w-full  mt-20 m-aut px-2">
        <UserTemplates :listUsers="listStudents" :createUsers="studentInfoCreate" :updateUser="studentInfoUpdate" :title="title" @delete_id="deleteUser" :standingPage="standingPage" @refresh_data="getAllData"/>
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
        // GET ALL DATABASE
        getAllData(){
            axios.get('http://127.0.0.1:8000/api/get_user_by/student').then((response)=>{
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
       return this.getAllData()
    }
}
</script>

