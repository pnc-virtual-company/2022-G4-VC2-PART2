<template>

  <div @click="hideRightClik()" class="flex flex-col justify-between overflow-y-auto" style="overflow: scroll; background-color: #DDE8F0; height: 80vh; overflow-x: hidden;">
        <div class="flex flex-col " v-for="comment of allComments" :key="comment" >
          <div class="flex justify-end mb-4 " v-if="comment.user_id == 1" >
            <div class="flex justify-center items-end">
              <div @click="hideShow(comment.id)" @contextmenu.capture.prevent="showAction(comment.id)"
                class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white cursor-pointer " style=" max-width: 460px;word-break: break-all;  ">
                <p class="w-full text-end  mb-3 " >{{capitalize(comment.user.first_name)}} {{capitalize(comment.user.last_name)}}</p>
                {{comment.content}}
              </div>
              <img
                src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
                class="object-cover h-8 w-8 rounded-full mt-4"
                alt=""
              />
            </div>
          </div>
          <p class="text-xs -mt-4 mb-2 ml-80 " style="display:none;" 
                :id="comment.id">
                {{comment.updated_at}}
            </p>
          <div class="flex justify-start mb-4 cursor-pointer"  v-if="comment.user_id != 1" >
            <div class="flex justify-center items-end" >
              <img
                src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
                class="object-cover h-8 w-8 rounded-full"
                alt=""
              />
              <div @click="hideShow(comment.id)" @contextmenu.capture.prevent="showAction(comment.id)"
                class="ml-1 p-2 max-w-sm bg-white rounded-br-3xl rounded-tr-3xl rounded-tl-xl  text-black" style="max-width: 460px;  word-break: break-all;  ">
                <p class="w-full text-start mb-3">{{capitalize(comment.user.first_name)}} {{capitalize(comment.user.last_name)}}</p>
                {{comment.content}}
              </div>
            </div>
          </div>
          <p class="text-xs -mt-4 mb-2 ml-80" style="display:none;" 
                :id="comment.id ">
                {{comment.updated_at}}
          </p>
        </div>
        <div class="w-full flex items-end" style="height:100%">
              <div class="w-full fixed bottom-12 opacity-60">
                <div class="flex">
                  <Base_DropDwon_Menu  :title="'Topic'" :lists="lists"  v-model="topic"/>
                </div>
                <div class="flex">
                  <input @keyup.enter.prevent="addComment()"  v-model="comment"  type="search" id="search-dropdown" class="block p-2.5 text-sm text-gray-900 bg-gray-50 border-l-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Type your topic here..." required=""
                  style="width:65%"
                  >
                  <button @click.prevent="addComment()"  type="submit" class="text-sm font-medium text-white bg-blue-700 border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                  </button>
                  <button type="button"  style="width:15%" class="ml-2 text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Close Board</button>
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
import Base_DropDwon_Menu from '../dropdown_menu/BaseDropDown.vue'
export default {
  props:['commets'],

  components: {
    Base_DropDwon_Menu,
  },
  data() {
    return {
      allComments: null,
      hide: true,
      comment: '',
      bgColor: '',
      comment_id: null,
      ifEdite:false,
      rightClike: false,
      ifHasTopic: false,
      topic:'',
      lists: ['HTML', 'CSS', 'Algorithm'],

    }
  },
  watch: {
    commets() {
      this.getAllComments();
    },
  },
  methods: {
    getAllComments() {
      this.comment = '',
      axios.get('http://localhost:8000/api/comment/'+this.commets.user.id).then((response) => {
        this.allComments = response.data
        console.log(this.allComments);
      })
    },
    addComment() {
      console.log(this.commets);
      const userComment = {
        content: this.comment,
        topic: 'English',
        user_id:this.commets.user.id,
        student_id: this.commets.user.id,
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