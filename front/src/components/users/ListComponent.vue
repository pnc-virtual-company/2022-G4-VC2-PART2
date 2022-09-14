<template>
  <!-- component -->
  <div
    class="overflow-x-auto relative shadow-sm bg-gray-100 sm:rounded-lg mt-2 p-2"
  >
    <div class="py-3 pb-3">
      <h2 class="text-gray-800 text-2xl font-bold text-center mb-2 uppercase">{{ title }}</h2>
    </div>

    <div class="pb-4">
      <button
        class="px-4 py-2 bg-green-500 text-white font-extrabold"
        @click="addUser"
      >
        Create Student+
      </button>
    </div>

    <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex" v-if="openDialog">
        <div class="form-container rounded w-11/12">
            <RegisterForm @update_student="createUser"  @cancel="onCancelCreated" @close="openDialogs" :object="object"></RegisterForm>
        </div>
    </div>

    <div v-if="showModal || openDialog" class="opacity-30 fixed inset-0 z-40 bg-black"></div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead
        class="text-xs text-gray-700 uppercase bg-[#018ABD] dark:bg-gray-700 dark:text-gray-400"
      >
        <tr>
          <th scope="col" class="py-3 px-6 text-left">Name</th>
          <th scope="col" class="py-3 px-6 text-center">batch</th>
          <th scope="col" class="py-3 px-6 text-center">class</th>
          <th scope="col" class="py-3 px-6  text-center w-3 ">Action</th>
        </tr>
      </thead>

      <tbody class="overflow-right-aut0">
        <tr 
          v-for="item of users" :key="item"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
        >
          <th
            scope="row"
            class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white"
          >
            <div class="pl-3">
              <div class="text-base font-semibold">{{ item.first_name }} {{ item.last_name }}</div>
            </div>
          </th>
          <td class="py-4 px-6 text-center">
            {{ item.student[0].year }}
          </td>
          <td class="py-4 px-6 text-center">
              {{ item.student[0].year }}
          </td>

          <td class="w-11/12 flex items-center  py-2 px2 justify-center">
              <button
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 text-right"
                v-on:click="editUser(item.id)"
              >
                Edit
              </button>

              <button
                class="font-medium dark:text-blue-500 hover:underline  text-red-700 mx-2 text-left"
                  v-on:click="deleteUser(item.id)"
                >
                  Delete
              </button>
          </td>
         
        </tr>
        <!-- IF NON LIST HERE -->
        <div 
          v-if="ifDataIsNull"
          class="w-full border-b dark:bg-gray-800  dark:hover:bg-gray-600 flex justify-center items-center py-4"
        >
          <h1 class="text-red-600 text-[20px]">None List here!</h1>
        </div>
      </tbody>
    </table>
  </div>
</template>
<script>
  import RegisterForm from '@/components/signUp/signUpForm.vue'
  import axios from "axios";
export default {
    props:['title'],
    components: {
       RegisterForm
    },
    data(){
      return {
            ifDataIsNull:false,
            openDialog: false,
            usersInfoCreate: { title: 'Create User',button: "Sign up", to_do: "create"},
            usersInfoUpdate: { title: 'Edit User',button: "Update", to_do: "update",id:null},
            object:{},
            users: [],
            userID:null,
        }
    },
  methods: {
     getAllStudent(){
          axios.get("http://localhost:8000/api/getUserBy/student").then((res) => {
              this.users = res.data
              if (this.users.length == 0) {
                  this.ifDataIsNull = true;
              }
          })
    },
    addUser() {
      this.openDialog = !this.openDialog;
      this.object = this.usersInfoCreate;
    },
    
    createUser(data) {
        axios.post('http://localhost:8000/api/user/',data).then(() => {
            this.getAllStudent();

        })
    },
    editUser(id) {
      axios.put('http://localhost:8000/api/user/' +id).then(() => {
          this.getAllStudent();
      })
    },
    onCancelCreated(isShow){
        this.openDialog = isShow
    },
    openDialogs(isShow){
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
    console.log(this.users);
  }
};
</script>

