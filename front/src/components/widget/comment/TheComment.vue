<template>
  <div class="w-2/3 flex flex-col justify-between overflow-y-auto" style="overflow: scroll;height: 87vh; overflow-x: hidden">
        <div class="flex flex-col mt-5 " v-for="comment of allComments" :key="comment">
          <div class="flex justify-end mb-4" v-if="comment.user_id == 1">
            <div class="flex">
              <div @click="hideShow(comment.id)" 
                class="mr-2 py-3 px-4 bg-blue-400 rounded-bl-3xl rounded-tl-3xl rounded-tr-xl text-white cursor-pointer " style="max-width: 410px;  word-break: break-all;  ">
                {{comment.content}}
              </div>
            </div>
            <img
              src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
              class="object-cover h-8 w-8 rounded-full mt-4"
              alt=""
            />
          </div>
          <p class="text-xs -mt-4 mb-2 ml-80 " style="display:none;" :id="comment.id">{{comment.created_at}}</p>
          <div class="flex justify-start mb-4 cursor-pointer"  v-if="comment.user_id != 2">
            <img
              src="https://source.unsplash.com/vpOeXr5wmR4/600x600"
              class="object-cover h-8 w-8 rounded-full"
              alt=""
            />
            <div 
              class="ml-1 p-2 max-w-sm bg-gray-400 rounded-br-3xl rounded-tr-3xl rounded-tl-xl text-white" style="max-width: 410px;  word-break: break-all;  ">
              {{comment.content}}
            </div>
          </div>
        </div>
        <div class="py-5  fixed ml-5" style="margin-top:430px; width:35%; ">

              <form>   
                  <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                  <div class="relative">
                      <input  v-model="comment" type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-black bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Comment here!" style="opacity:0.7;">
                      <button @click.prevent="addComment()" @keyup.enter.prevent="addComment()"  v-if="comment != '' " type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
                  </div>
              </form>

        </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      allComments: null,
      hide: true,
      comment:''
    }
  },
  methods: {
    getAllComments() {
      axios.get('http://localhost:8000/api/comment').then((response) => {
        this.allComments = response.data
      })
    },
    addComment() {
      const userComment = {
        content: this.comment,
        topic: 'English',
        user_id:3,
        student_id: 1,
        follow_up_id:3
      }
       axios.post('http://localhost:8000/api/comment',userComment).then(() => {
          this.getAllComments();    
      })
    },
    hideShow(id) {
      if (this.hide) {
        this.showDate(id);
      } else {
        this.hideDate(id)
      }
      this.hide = !this.hide;
    },
    showDate(id) {
      document.getElementById(id).style.display = ''
    },
    hideDate(id) {
      document.getElementById(id).style.display = 'none'
    },
    getUserName(id){
      axios.get('http://localhost:8000/api/user/' + id).then((response) => {
          return response.data.first_name
       })
    }
  },
  mounted() {
    this.getAllComments()
  }
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