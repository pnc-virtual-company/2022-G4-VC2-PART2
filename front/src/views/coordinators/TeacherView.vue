<template>
  <div class="w-10/12 m-auto h-screen fixed top-20 right-0 flex justify-center">
      <div class=" w-11/12">
        <Teachercomponent :listUsers="teacherList" :createUsers="teacherInfoCreate" :updateUser="teacherInfoUpdate" :title="title" @delete_id="deleteUser"/>
      </div>
  </div>

</template>
<script>
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
      teacherList: [
          {id:1, name: "Nga", img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
          {id:2, name: "Kim Hak", img:'https://media.istockphoto.com/photos/we-herd-you-were-looking-for-some-magnificent-cattle-picture-id1303666715?b=1&k=20&m=1303666715&s=170667a&w=0&h=mOQcfUp6wdVwwVtoigfMQZHLGv4RWUzm_5PKvZc58go='},
          {id:3, name: "Thun Dyna", img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
          {id:4, name: "Bo SreyPich", img:'https://media.istockphoto.com/photos/we-herd-you-were-looking-for-some-magnificent-cattle-picture-id1303666715?b=1&k=20&m=1303666715&s=170667a&w=0&h=mOQcfUp6wdVwwVtoigfMQZHLGv4RWUzm_5PKvZc58go='},
          {id:5, name: "Kim Hak", img:'https://media.istockphoto.com/photos/we-herd-you-were-looking-for-some-magnificent-cattle-picture-id1303666715?b=1&k=20&m=1303666715&s=170667a&w=0&h=mOQcfUp6wdVwwVtoigfMQZHLGv4RWUzm_5PKvZc58go='},
          {id:6, name: "Thun Dyna", img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
          {id:7, name: "Thun Dariya", img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
          {id:8, name: "Thun Nong", img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
          {id:9, name: "Thun Tim", img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
      ],
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
    }
  }
}
</script>
<style>
  
</style>

