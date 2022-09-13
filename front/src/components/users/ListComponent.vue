<template>
  <!-- component -->
  <div
    class="overflow-x-auto relative shadow-sm bg-gray-100 sm:rounded-lg mt-2 p-2"
  >
    <div class="pb-4">
      <button
        class="px-4 py-4 bg-green-500 text-white font-bold"
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
        <updateStudent 
            @update_student="editStudent($event)" 
            @cancel="onCancel" 
            :users="dataToUpdate">
        </updateStudent>
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
        class="text-xs text-gray-700 uppercase bg-blue-300 dark:bg-gray-700 dark:text-gray-400"
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
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer"
        >
          <td class="text-center">
            {{ item.first_name }} {{item.last_name}} 
          </td>          
          <td class="py-4 px-6 text-center">
            {{  item.student[0].year }}
          </td>
          <td class="py-4 px-6 text-center">
              {{ item.student[0].class }}
          </td>

          <td class="flex items-center  py-4 px-6 justify-center">
              <button
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-4"
                :id="item.id"
                @click="toggleModal(item.id)"
              >
                Edit
              </button>

              <button
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-4"
                  @click="deleteUser(item.id)"
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
import axios from "axios"
import RegisterForm from '@/components/signUp/signUpForm.vue'
export default {
  // emits:['update_student'],
    components: {
        updateStudent, RegisterForm
    },
    data(){
        return {
            openDialog: false,
            showModal: false,
            users: [],
            dataToUpdate: [],
            userID:null,
        }
    },
  methods: {
    getAllStudent()
    {
      axios.get("http://localhost:8000/api/student").then((res) => {
          this.users = res.data
      })
    },

    addUser() {
        this.openDialog = !this.openDialog;
        console.log("running")
    },

    toggleModal: function (id) {
      this.userID = id;
      axios.get("http://localhost:8000/api/user/"+id).then((res) => {
          this.dataToUpdate = res.data
          this.showModal = !this.showModal;
      })
    },
    onCancel(isShow){
        this.showModal = isShow
    },
    editStudent(data) {
        axios.put('http://localhost:8000/api/user/' +this.userID,data).then(() => {
          this.getAllStudent();
          this.showModal = !this.showModal;
      })
    },
    onCancelCreated(isShow){
        this.openDialog = isShow
    },
    createStudent(isShow){                        
        this.openDialog = isShow;
    },
    deleteUser(id){
      axios.delete('http://localhost:8000/api/user/' + id).then(() => {
          this.getAllStudent();
      })
    }

  },
  mounted() {
    this.getAllStudent()
  }
};
</script>

<style>

</style>
