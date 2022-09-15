<template>
    <div class="w-10/12 m-auto h-screen fixed top-20 right-0 flex justify-center">
        <div class=" w-11/12 ">
            <UserTemplates :listUsers="listStudents" :createUsers="studentInfoCreate" :updateUser="studentInfoUpdate" :title="title" @delete_id="deleteUser"/>
        </div>
    </div>
</template>
<script>
import UserTemplates from '@/components/widget/userList/ListComponent.vue'
export default {
    components:{ UserTemplates },
    data(){
        return {
        studentInfoCreate: { title: 'Create Students',button: "Sign up", to_do: "create", role: 'student'},// STUDENTS CREATE INFOR
        studentInfoUpdate: { title: 'Edit Student',button: "Update", to_do: "update", role: 'student'}, // STUDENTS UPDATE INFOR
        title: 'Let See All List Of STUDENTS!', // TITLE OF HOME PAG
        listStudents: [
          {id:1, name: "Sim Hul", batch:'2022', class:'WEB 2022', img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
          {id:2, name: "Davy Ting",batch:'2022', class:'WEB 2022', img:'https://media.istockphoto.com/photos/we-herd-you-were-looking-for-some-magnificent-cattle-picture-id1303666715?b=1&k=20&m=1303666715&s=170667a&w=0&h=mOQcfUp6wdVwwVtoigfMQZHLGv4RWUzm_5PKvZc58go='},
          {id:3, name: "Thun Dyna",batch:'2022', class:'WEB 2022', img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
          {id:4, name: "Sophiem phat",batch:'2022', class:'WEB 2022', img:'https://media.istockphoto.com/photos/we-herd-you-were-looking-for-some-magnificent-cattle-picture-id1303666715?b=1&k=20&m=1303666715&s=170667a&w=0&h=mOQcfUp6wdVwwVtoigfMQZHLGv4RWUzm_5PKvZc58go='},
          {id:5, name: "Kim Hak",batch:'2022', class:'WEB 2022', img:'https://media.istockphoto.com/photos/we-herd-you-were-looking-for-some-magnificent-cattle-picture-id1303666715?b=1&k=20&m=1303666715&s=170667a&w=0&h=mOQcfUp6wdVwwVtoigfMQZHLGv4RWUzm_5PKvZc58go='},
          {id:6, name: "Thun Dyna",batch:'2022', class:'WEB 2022', img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
      ],
        }
    },
    methods: {
        getDialog(value){
            this.openDialog = value 
        },
        // DELET DATA FROM STORAGE
        deleteUser(id){
            for(var i = 0; i < this.listStudents.length; i++){
                if(this.listStudents[i].id == id){
                this.listStudents.splice(i,1)
                    console.log('Succesfull')
                }
            }
        }
    },
}
</script>

