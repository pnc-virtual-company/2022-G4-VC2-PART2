<template>
  <!-- component -->
  <div
    class="overflow-x-auto relative shadow-sm bg-gray-100 sm:rounded-lg mt-2 p-2"
  >
    <div class="pb-4">
      <button
        class="px-4 py-4 bg-green-500 text-white font-extrabold"
        @click="addUser"
      >
        Create Student+
      </button>
    </div>

    <div
      v-if="showModal"
      
      class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
    >
      <div class="form-container shadow-md rounded w-4/5">
        <updateStudent @cancel="onCancel" @onCancel="editStudent" :users="users"></updateStudent>
      </div>
    </div>


    <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex" v-if="openDialog">
        <div class="form-container rounded w-11/12">
            <RegisterForm  @cancel="onCancelCreated" @close="createStudent"></RegisterForm>
        </div>
    </div>

    <div v-if="showModal || openDialog" class="opacity-30 fixed inset-0 z-40 bg-black"></div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead
        class="text-xs text-gray-700 uppercase bg-[#018ABD] dark:bg-gray-700 dark:text-gray-400"
      >
        <tr>
          <th scope="col" class="py-3 px-6 text-center">Name</th>
          <th scope="col" class="py-3 px-6 text-center">batch</th>
          <th scope="col" class="py-3 px-6 text-center">class</th>
          <th scope="col" class="py-3 px-6  text-center">Action</th>
        </tr>
      </thead>

      <tbody>
        <tr 
          v-for="item of users" :key="item"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
        >
          <th
            scope="row"
            class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white"
          >
            <img
              class="w-10 h-10 rounded-full "
              :src="item.img"
              alt="Jese image"
            />
            <div class="pl-3">
              <div class="text-base font-semibold">{{ item.name }}</div>
            </div>
          </th>
          
          <td class="py-4 px-6 text-center">{{ item.batch }}</td>
          
          <td class="py-4 px-6 text-center">

              {{ item.class }}
   
          </td>

          <td class="flex items-center  py-4 px-6 justify-center">
              <button
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-4"
                v-on:click="toggleModal()"
              >
                Edit
              </button>

              <button
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-4"
                  v-on:click="deleteUser(item.id)"
                >
                  Delete
              </button>
          </td>
         
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>

import updateStudent from "../students/UpdataStudent.vue";
import RegisterForm from '@/components/signUp/signUpForm.vue'
export default {
    components: {
        updateStudent, RegisterForm
    },
    data(){
        return {
            openDialog: false,
            showModal: false,
            users: [
              {id:1,name: "Veang Kroh", batch:2022, class:'2022-A',img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
              {id:2,name: "Kim Hak", batch:2022, class:'2022-A',img:'https://media.istockphoto.com/photos/we-herd-you-were-looking-for-some-magnificent-cattle-picture-id1303666715?b=1&k=20&m=1303666715&s=170667a&w=0&h=mOQcfUp6wdVwwVtoigfMQZHLGv4RWUzm_5PKvZc58go='},
              {id:3,name: "Thun Dyna", batch:2023, class:'2022-A',img:'https://media.istockphoto.com/photos/tawny-owl-facing-forward-in-colourful-woodland-flowers-including-and-picture-id1380506564?b=1&k=20&m=1380506564&s=170667a&w=0&h=y7pGWLJPRjSdNlGLffuFjk5DzrA7lU1CXbJeWyHyn1c='},
              {id:4,name: "Bo SreyPich", batch:2023, class:'2022-SNA',img:'https://media.istockphoto.com/photos/we-herd-you-were-looking-for-some-magnificent-cattle-picture-id1303666715?b=1&k=20&m=1303666715&s=170667a&w=0&h=mOQcfUp6wdVwwVtoigfMQZHLGv4RWUzm_5PKvZc58go='},
            ],
        }
    },
  methods: {

    addUser() {
        this.openDialog = !this.openDialog;
        console.log("running")
    },

    toggleModal: function () {
      this.showModal = !this.showModal;
      console.log("hello");
    },
    onCancel(isShow){
        this.showModal = isShow
    },
    editStudent(isShow,student,id){
        this.showModal = isShow;
        console.log(student)
        console.log(id)
    },
    onCancelCreated(isShow){
        this.openDialog = isShow
    },
    createStudent(isShow){
        this.openDialog = isShow;
    },
    deleteUser(id){
      for(var i = 0; i < this.users.length; i++){
        if(this.users[i].id == id){
          this.users.splice(i,1)
          console.log(console.log('Succesfull'))
        }
      }
    }

  },
};
</script>
<style></style>
