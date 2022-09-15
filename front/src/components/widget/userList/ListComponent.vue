<template>
  <div class="overflow-x-auto relative shadow-sm bg-gray-50 sm:rounded-lg p-2 z-0">
    <!-- TITLE OF PAGES -->
    <div class="py-1pb-3">
      <h2 class="text-gray-800 text-2xl font-bold text-center mb-2 uppercase">{{ title }}</h2>
    </div>
      <!-- BUTTON CREATE USER -->
      <Base_Button class="" @click="addUser">
        <i class="mx-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
            </svg>
        </i>
        <i>
           Create
        </i>
      </Base_Button>
      <!-- MY DIALOG -->
      <div class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex" v-if="openDialog">
          <div class="form-container rounded w-11/12">
              <RegisterForm  @cancel="onCancelCreated" @close="openDialogs" :object="object" :id="userID" @create_student="emitPage" :updateValue="objectUpdating"></RegisterForm>
          </div>
      </div>
      <!-- CLOSE THE DIALOG -->
     <div v-if="openDialog" class="opacity-30 fixed inset-0 z-40 bg-black"></div>
    <!-- TABLES COMTAINER ALL LIST OF STUDENTS-->
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-slate-300 dark:bg-gray-50 dark:text-gray-400">
        <tr>
          <th scope="col" class="py-2 px-4 text-left">Name</th>
          <th scope="col" class="py-2 px-4 text-center" v-if="createUsers.role=='student'" >batch</th>
          <th scope="col" class="py-2 px-4 text-center" v-if="createUsers.role=='teacher'" >Email</th> <!-- Teacher email -->
          <th scope="col" class="py-2 px-4 text-center" v-if="createUsers.role=='student'">class</th>
          <th scope="col" class="py-2 px-4  text-center w-3">Action</th>
        </tr>
      </thead>

      <tbody class="overflow-right-aut0">
        <tr 
          v-for="(item,index) in listUsers" :key="index"
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 "
        >
          <th
            scope="row"
            class="flex items-center py-4 px-3 text-gray-900 whitespace-nowrap dark:text-white"
          >
            <div class="pl-3">
              <div class="text-base font-semibold text-center">{{ item.first_name }} {{ item.last_name }}</div>
            </div>
          </th>
          
          <td class="py-2 px-4 text-center" v-if="item.role=='student'">{{ item.student[0] }}</td>
          <td class="py-2 px-4 text-center" v-if="item.role == 'teacher' ">{{ item.email }}</td> <!-- Teacher email -->
          <td class="py-2 px-4 text-center" v-if="item.role == 'student' ">{{ item.student[0]  }}</td>

         <!-- GROUP BUTTON -->
          <td  class="w-8/12 flex items-center mt-2 justify-end">
              <button
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-2 text-right"
                v-on:click="editUser(item.id)"
              >
                Edit
              </button>

              <button
                class="font-medium dark:text-blue-500 hover:underline  text-red-700 mx-2 text-left"
                  v-on:click="($emit('delete_id', item.id))"
                >
                  Delete
              </button>
              <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg> -->
              <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 rounded-full p-2 font-semibold hover:bg-gray-100">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
              </svg> -->

          </td>
        </tr>

        <!-- IF NON LIST HERE -->
        <div v-if="listUsers.length == 0 || ifDataIsNull" class="w-full border-b dark:bg-gray-800  dark:hover:bg-gray-600 flex justify-center items-center py-4">
          <h1 class="text-red-600 text-[20px]">None List here!</h1>
        </div>
      </tbody>
    </table>
  </div>
</template>
<script>
import Base_Button from '../button/BaseButton.vue'
import RegisterForm from '../allForm/signUpForm.vue'
export default {
    props:['listUsers', 'createUsers', 'updateUser', 'title'], 
    emits:['emits-page'],
    components: {
       RegisterForm, Base_Button
    },
    data(){
      return {
            ifDataIsNull:false,
            openDialog: false,
            object:{},
            userID:null,
            objectUpdating:{}
        }
  },
  methods: {
    // ADD USER THE DATABASE
    addUser() {
      this.openDialog = !this.openDialog;
      this.object = this.createUsers
    },
    // UPDATE DATA 
    editUser(userId) {
      this.openDialog = !this.openDialog;
      this.object = this.updateUser
      this.userID = userId;
      for(var i = 0; i < this.listUsers.length; i++){
        if(this.listUsers[i].id == userId){
          console.log('my object', this.listUsers[i].first_name)
          this.objectUpdating = this.listUsers[i]
        }
      }
    },
    // SHOWING CANCEL
    onCancelCreated(isShow){
        this.openDialog = isShow
    },
  // OPEN THE DIALOG
    openDialogs(isShow){
        this.openDialog = isShow;
    },
    emitPage(value){
      return this.$emit('emits-page',value);
    }
  },
  mounted() {
    this.objectUpdating
    setTimeout(function(){
      this.ifDataIsNull == true
    }, 1500)
  }
};
</script>

