<template>
  <div @click="hideRightClik()" class="flex flex-col overflow-y-auto" style="overflow: scroll;margin-top: 1px; background-color: #DDE8F0; height: 70vh; overflow-x: hidden;">
        <div class="flex flex-col " v-for="comment of allComments" :key="comment" >
          <div class="flex justify-start mb-4 cursor-pointer"  >
              <div class="flex flex-col items-end" >
                <div class="flex items-center">
                  <img
                    src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
                    class="object-cover border-2 border-green-300 h-12 w-12 rounded-full"
                    alt=""
                  />
                  <div @click="hideShow(comment.id)" @contextmenu.capture.prevent="showAction(comment.id)"
                    class="m-1 p-2 max-w-sm bg-green-100 border-2 border-green-200 rounded-br-3xl rounded-tr-3xl rounded-tl-xl  text-black" style="max-width: 70%;  word-break: break-all;  ">
                    <p class="w-full text-start mb-2 text-blue-600">{{capitalize(comment.user.first_name)}} {{capitalize(comment.user.last_name)}}</p>
                    <p class="w-24 text-center mb-0 ml-5 text-yellow-600 bg-red-100">Topic: {{comment.toptic}}</p>
                    <p class="w-9/12 text-start mb-3 ml-10 mr-3">{{comment.content}}</p>
                    <p class="w-full text-start flex justify-end ">9:30 AM</p>
                  </div>
                </div>
                  <div class="flex items-center w-11/12">
                    <div class="flex justify-center items-center" >
                      <img
                        src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
                        class="object-cover border-2 border-green-300 h- w-8 rounded-full"
                        alt=""
                      />
                      <div class="flex flex-col" >
                          <div @click="hideShow(comment.id)" @contextmenu.capture.prevent="showAction(comment.id)"
                            class="m-1 p-2 max-w-sm bg-green-100 border-2 border-green-200 rounded-br-3xl rounded-tr-3xl rounded-tl-xl  text-black" style="max-width: 70%;  word-break: break-all;  ">
                            <p class="w-full text-start mb-2 text-blue-600">{{capitalize(comment.user.first_name)}} {{capitalize(comment.user.last_name)}}</p>
                            <p class="w-9/12 text-start mb-3 ml-10 mr-3">{{comment.content}}</p>
                            <p class="w-full flex justify-end ">9:30 AM</p>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="flex items-center w-11/12">
                    <img
                      src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
                      class="object-cover border-2 border-green-300 h-8 w-8 rounded-full flex justify-center items-center"
                      alt=""
                    />
                    <input type="search" id="search-dropdown" class="m-1 p-2.5 text-sm text-gray-900 bg-gray-50 border-l-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Type your message here..." required="" style="width: 68%;">
                  </div>
                </div>
          </div>


          <div class="flex justify-start mb-4 cursor-pointer"  >
            <div class="flex items-center" >
              <img
                src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
                class="object-cover border-2 border-gray-300 h-12 w-12 rounded-full"
                alt=""
              />
              <div class="flex flex-col" >
                  <div @click="hideShow(comment.id)" @contextmenu.capture.prevent="showAction(comment.id)"
                    class="m-1 p-2 max-w-sm bg-gray-200 border-2 border-gray-300 rounded-br-3xl rounded-tr-3xl rounded-tl-xl  text-black" style="max-width: 70%;  word-break: break-all;  ">
                    <p class="w-full text-start mb-2 text-blue-600">{{capitalize(comment.user.first_name)}} {{capitalize(comment.user.last_name)}}</p>
                    <p class="w-24 text-center mb-0 ml-5 text-yellow-600 bg-red-100">Topic: {{comment.toptic}}</p>
                    <p class="w-9/12 text-start mb-3 ml-10 mr-3">{{comment.content}}</p>
                    <p class="w-full text-start flex justify-end ">9:30 AM</p>
                  </div>
                </div>
            </div>
          </div>
          
        </div>
        <!-- right clcik and show action delete and edit -->
        <div class="grid rounded-md shadow-sm fixed  bg-gray-400 h-28 m-48 w-40 text-white animate-pulse" role="group" v-if="rightClike">
          <button type="button" class="flex justify-center items-center text-white  hover:bg-blue-400" @click="edit()">
            <svg aria-hidden="true" class="mr-2 w-4 h-4 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
            Edit
          </button>
          <button type="button" class="flex justify-center items-center text-white  hover:bg-blue-400" @click="deleted(comment_id)" >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
            </svg>
            Delete
          </button>
        </div> 
  </div>
</template>

<script>
import axios from 'axios';
// import Base_DropDwon_Menu from '../dropdown_menu/BaseDropDown.vue'
// import Base_DropDwon_Menu from '../dropdown_menu/BaseDropDown.vue'
export default {

  components: {
    //  Base_DropDwon_Menu,
  },
  data() {
    return {
      allComments: [
        {user: {
          first_name: 'hak',
          last_name: 'kim'
        },
        content:'Hello world Hello world Hello world Hello world Hello world Hello world Hello world Hello world Hello world Hello world Hello world Hello world',
        toptic:'HTML'
        }
      ],
      hide: true,
      comment: '',
      bgColor: '',
      comment_id: null,
      ifEdite:false,
      rightClike: false,
      // lists: ['HTML', 'CSS', 'Algorithm'],
    }
  },
  methods: {
    getAllComments() {
      this.comment = '',
      axios.get('http://localhost:8000/api/comment/1').then((response) => {
        this.allComments = response.data
      })
    },
    addComment() {
      const userComment = {
        content: this.comment,
        topic: 'English',
        user_id:2,
        student_id: 1,
        follow_up_id:1
      }
      const editCmt = {
          content:this.comment,
      }
      if (this.comment.trim() != '') {
        if (!this.ifEdite) {  
          axios.post('http://localhost:8000/api/comment/',userComment).then(() => {
             this.getAllComments();    
         })
        } else {
              axios.put('http://localhost:8000/api/comment/'+this.comment_id, editCmt).then(() => {
                  this.getAllComments();
                  this.ifEdite = false;
              })
        }
      }
    },
    hideRightClik() {
        this.rightClike = false;
    },
    deleted(id) {
        axios.delete('http://localhost:8000/api/comment/'+id).then(() => {
              this.getAllComments();
        })
    },
    edit() {
        this.rightClike = false;
        axios.get('http://localhost:8000/api/getSpecificComment/'+this.comment_id).then((response) => {
              this.comment = response.data[0].content
              this.ifEdite = true;
        })
    },
    hideShow(id) {
      if (this.hide) {
        this.showDate(id);
      } else {
        this.hideDate(id)
      }
    },
    showDate(id) {
      this.hide = false;
      document.getElementById(id).style.display = ''
    },
    hideDate(id) {
      this.hide = true;
      document.getElementById(id).style.display = 'none'
    },
    getUserName(id){
      axios.get('http://localhost:8000/api/user/' + id).then((response) => {
          return response.data.first_name
       })
    },

    showAction(id) {
        this.comment_id = id;
        this.rightClike = !this.rightClike;
    },
     capitalize(word) {
          const loweredCase = word.toLowerCase();
          return word[0].toUpperCase() + loweredCase.slice(1);
      }
  },

  // mounted() {
  //   this.getAllComments();
  // }
}
</script>

<style scoped>
  * {
  scrollbar-width: thin;
  scrollbar-color: rgb(164, 164, 170) rgb(181, 179, 175);
  scroll-behavior: smooth;
}

*::-webkit-scrollbar {
  width: 7px;
}

*::-webkit-scrollbar-track {
  background: rgb(182, 181, 179);
}

*::-webkit-scrollbar-thumb {
    background: rgb(182, 181, 179);
    border: 3px solid white;
}



</style>