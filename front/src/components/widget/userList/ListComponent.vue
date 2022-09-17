<template>
  <div class="overflow-x-auto relative shadow-sm bg-gray-50 sm:rounded-lg p-2 z-0">
    <!-- TITLE OF PAGES -->
    <div class="py-1pb-3">
      <h2 class="text-gray-800 text-2xl font-bold text-center mb-2 uppercase">{{ title }}</h2>
    </div>

      <!-- ___BUTTON CREATE USER__-->
      <Base_Button class="py-[6px]" @click="addUser" v-if="standingPage !='follow'">
        <i class="mx-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
          </svg>
        </i>
        <i>
           Create
        </i>
      </Base_Button>

      <!--_____FORM DIALOG_______-->
      <div class=" overflow-x-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex" v-if="openDialog">
          <div class="form-container rounded w-11/12">
              <Bass_Dialog_Form  @cancel="onCancelCreated" @close="openDialogs" :object="object" @create_student="emitPage" :updateValue="objectUpdating"></Bass_Dialog_Form>
          </div>
      </div>

      <!-- CLOSE THE DIALOG -->
     <div v-if="openDialog" class="opacity-30 fixed inset-0 z-40 bg-black"></div>
    <!-- TABLES COMTAINER ALL LIST OF STUDENTS-->
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-slate-300 dark:bg-gray-50 dark:text-gray-400">
        <!-- ____HEADER OF TABLE LIST_____ -->
        <tr>
          <th scope="col" class="py-2 px-4 text-left">Name</th>
          <th scope="col" class="py-2 px-4 text-center" v-if="standingPage=='teacher'" >Email</th> <!-- Teacher email title-->
          <th scope="col" class="py-2 px-4 text-center" v-if="standingPage=='student' || standingPage=='follow'">Batch</th>
          <th scope="col" class="py-2 px-4 text-center" v-if="standingPage=='student' || standingPage=='follow'">class</th>
          <th scope="col" class="py-2 px-4 text-center" v-if="standingPage=='follow'">Subject</th><!-- Subject title which will be follow up -->
          <th scope="col" class="py-2  text-center w-4 mx-4 ">Action</th>
        </tr>
      </thead>

      <tbody class="overflow-right-auto">
        <!-- __BODY LIST USER____-->
        <tr v-for="(item,index) in listUsers" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
          <td class="text-black font-semibold py-3 px-4 text-cente">{{ item.first_name }} {{ item.last_name }}</td>
          <td class="py-3 px-4 text-center" v-if="standingPage=='teacher'">{{ item.email }}</td> <!-- Teacher email -->
          <td class="py-3 px-4 text-center" v-if="standingPage=='student' || standingPage=='follow'">{{ item.student[0].year }}</td>
          <td class="py-3 px-4 text-center text-blue-300" v-if="standingPage=='student' || standingPage=='follow'">{{ item.student[0].class }}</td>
          <td class="py-3 px-4 text-center" v-if="standingPage=='follow'">{{ item.subject  }}</td><!-- Subject which will be follow up -->
         <!-- ________GROUP BUTTON ACTIONS____________-->
          <td  class="w-11/12 flex items-center justify-end mt-2">
              <!-- Edite -->
              <i class="group max-w-max relative mx-1 mt-2 flex flex-col items-center justify-center   hover:text-gray-600" v-if="standingPage !='follow'" v-on:click="editUser(item.id)">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-1 text-blue-500 cursor-pointe">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
                <div class="group-hover:[transform:perspective(0px)_translateZ(0)_rotateX(0deg)] absolute bottom-0 mb-6 origin-bottom transform rounded text-white opacity-0 transition-all duration-300 group-hover:opacity-100">
                    <div class="flex max-w-xs flex-col items-center">
                      <div class="rounded bg-gray-100  opacity-1 px-4 py-1 text-xs text-black text-center shadow-lg">Edit</div>
                    </div>
                </div>
              </i>
              
              <!-- add to list follow up -->
              <i class="group max-w-max relative mx-1 mt-2 flex flex-col items-center justify-center   hover:text-gray-600"  v-if="standingPage =='student'" @click="($emit('set_to_sfu', item.id))">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer text-yellow-500">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                </svg>
                <div class="group-hover:[transform:perspective(0px)_translateZ(0)_rotateX(0deg)] absolute bottom-0 mb-6 origin-bottom transform rounded text-white opacity-0 transition-all duration-300 group-hover:opacity-100">
                    <div class="flex max-w-xs flex-col items-center">
                      <div class="rounded bg-gray-100  opacity-1 px-8 py-1 text-xs text-black text-center shadow-lg">Add+</div>
                    </div>
                </div>
              </i>

              <!-- delete  -->
              <i class="group max-w-max relative mx-1 mt-2 flex flex-col items-center justify-center   hover:text-gray-600" v-if="standingPage !='follow'" @:click="($emit('delete_id', item.id))">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-red-500 cursor-pointer">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg> 
                <div class="group-hover:[transform:perspective(0px)_translateZ(0)_rotateX(0deg)] absolute bottom-0 mb-6 origin-bottom transform rounded text-white opacity-0 transition-all duration-300 group-hover:opacity-100">
                    <div class="flex max-w-xs flex-col items-center">
                      <div class="rounded bg-gray-100  opacity-1 px-2 py-1 text-xs text-black text-center shadow-lg">Delete</div>
                    </div>
                </div>
              </i>

              <!-- message or comment or feedback -->
              <i class="group max-w-max relative mx-1 mt-1 flex flex-col items-center justify-center   hover:text-gray-600" v-if="standingPage =='follow'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mx-1 text-green-500 cursor-pointer">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>
                <div class="group-hover:[transform:perspective(0px)_translateZ(0)_rotateX(0deg)] absolute bottom-0 mb-6 origin-bottom transform rounded text-white opacity-0 transition-all duration-300 group-hover:opacity-100">
                    <div class="flex max-w-xs flex-col items-center">
                      <div class="rounded bg-gray-100  opacity-1 px-4 py-1 text-xs text-black text-center shadow-lg">Comments</div>
                    </div>
                </div>
              </i>
              
                <!-- follow up -->
              <i class="group max-w-max relative mx-1 flex flex-col items-center justify-center   hover:text-gray-600" v-if="standingPage =='follow'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mx-1 text-orange-500 cursor-pointer">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                <div class="group-hover:[transform:perspective(0px)_translateZ(0)_rotateX(0deg)] absolute bottom-0 mb-6 origin-bottom transform rounded text-white opacity-0 transition-all duration-300 group-hover:opacity-100">
                    <div class="flex max-w-xs flex-col items-center">
                      <div class="rounded bg-slate-100  opacity-1 px-4 py-1 mr-4 text-xs text-black  text-center shadow-lg">Followed</div>
                    </div>
                </div>
              </i>
            </td>
          </tr>

        <!--______IF NON LIST HERE_______-->
        <div v-if="listUsers.length == 0" class="w-full  dark:bg-gray-800  dark:hover:bg-gray-600 flex justify-center items-center py-4">
          <h1 class="text-red-600 text-[20px]">List User is empty</h1>
        </div>
      </tbody>
    </table>
  </div>
</template>
<script>
import Base_Button from '../button/BaseButton.vue'
import Bass_Dialog_Form from '../dialogFrom/BaseDialogForm.vue'
export default {
    props:['listUsers', 'createUsers', 'updateUser', 'title','standingPage'], 
    emits:['emits-page', 'set_to_sfu'],
    components: {
       Bass_Dialog_Form, Base_Button
    },
    data(){
      return {
          openDialog: false,
          object:{},
          objectUpdating:{} // Store list which should we update
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
      for(var i = 0; i < this.listUsers.length; i++){
        if(this.listUsers[i].id == userId){
          this.objectUpdating = this.listUsers[i]
          console.log(this.objectUpdating.student[0].if_follow_up);
        }
      }
      this.object.id = userId
      console.log(this.object);
    },

    // SHOWING CANCEL
    onCancelCreated(isShow){
        this.openDialog = isShow
    },
   // OPEN THE DIALOG
    openDialogs(isShow){
        this.openDialog = isShow;
        this.$emit('refresh_data')
    },
    // EMIT PAGE OT DATABASE
    emitPage(value){
      return this.$emit('emits-page',value);
    },
      // ADD STUDENT TO FOLLO UP LIST
  },

  mounted() {
    console.log(this.listUsers)
  }
};
</script>

