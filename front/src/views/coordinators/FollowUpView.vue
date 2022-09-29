<template>
  <div class="w-full mt-16 ">
    <!-- This is an example component -->
    <div class="mx-auto shadow-lg rounded-lg">
      <!-- Chatting -->
      <div class=" flex flex-rol justify-between " style="height:90vh;">
        <!-- chat list -->
        <div class="flex flex-col w-4/12 border-r-2 overflow-y-auto">
          <!-- ___________search compt ___________-->
          <div class="border py-4 px-2 flex justify-between items-center border-b-black" v-if="!isOpenSearches">
            <div class="flex justify-between items-center">
              <svg class="h-5 fill-current text-blue-900 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              {{ listStudents.length }} Members
            </div>

            <div class="flex justify-between items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 font-bold text-blue-900 cursor-pointer " @click="OpenSearch">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
              </svg>
            </div>
          </div>

          <div class="flex justify-between px-3 pt-3" v-if="isOpenSearches" @click="OpenSearch">
            <h3> All Students {{ listFollowUps.length }}</h3>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>

          <BaseSearch v-if="isOpenSearches" @emit_search="filterSearch"  />
          <!-- end search compt -->
          <!-- user list -->
          <!-- <div v-if="isOpenSearches" class="opacity-30 fixed inset-0 z-40 bg-black"></div> -->
          <ListStudentFollowUp :listStudents="listStudents" v-if="!isOpenSearches" @emit_add="refresh_page"
            @emit_id="provideId" />
          <ListStudentFollowUp :listStudents="filter_Generation" v-if="isOpenSearches" @emit_add="refresh_page" />

          <!-- end user list -->
          <!-- _____________Give the inoformation_________ -->
          <div class="w-full flex justify-center m-2 h-full text-blue-600 text-1xl uppercase"
            v-if="(this.listStudents.length <= 0 && !isOpenSearches)">
            <h1>No Studet Follow Up!</h1>
          </div>
        </div>

        <!-- end chat list -->
        <!-- message -->
        <!-- <button class="m-5" style="width:15%">+ Add Board</button> -->
        <div class="w-full  overflow-x-auto">
          <!-- ________Title Board Comment_____ -->
          <!-- <button class="" style="width:15%">+ Add Board</button> -->

          <div v-for="index of allComments" :key="index" class="group inline-block w-full text-center" :id="index.student_id+'board'">
            <button
              class="w-full outline-none focus:outline-none border px-3 py-3 rounded-sm flex items-center min-w-32 hover:bg-[#6267f6]"
              style="background-color: #E7FFF0;">
              <span class="pr-1 font-semibold flex-1">{{userName}}</span>
              <button type="button" style="width:15%;"
              @click="closeBoard(index.student_id,index.id)"
                class="mr-16 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm py-2 text-center">Close
                Board</button>
              <span @click="showForm(index.id)">
                <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out"
                  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
              </span>

            </button>

            <div :id="index.id"
              class="border rounded-sm scale-0  duration-500 ease-in-out origin-top min-w-32 z-40  h-full "
              style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; min-height:79vh;">
              <div>
                <!-- comment and reply chat comment -->
                <div class="flex flex-col " v-for="comment of allComments" :key="comment" >
                  <section class="relative flex items-start mt-3 antialiased bg-white  w-full " >
                    <div class="container  sm:px-5 w-full " >
                      <div v-for="cmt of cmtEachFU" :key="cmt"
                        class="flex-col w-full py-4 mx-auto border-b-2 border-r-2 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm " :id="cmt.id+'parent'">
                        <!-- comment chat-------------------------- -->
                        <div class="flex flex-row w-full" v-if="comment.comment.length>0" >
                          <img class="object-cover w-12 h-12 border-2 border-gray-300 rounded-full"
                            alt="Noob master's avatar"  
                            src="https://images.unsplash.com/photo-1517070208541-6ddc4d3efbcb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
                          <div class="flex-col mt-1 w-full" >
                            <div class="flex justify-between flex-1 px-4 font-bold w-full">
                              {{capitalize(commets.user.first_name) }} {{capitalize(commets.user.last_name) }}
                        
                              <div class=" flex justify-evenly">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                  class="w-6 h-6 mr-5 cursor-pointer" @click="deleteCmt(cmt.id)">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                  class="w-6 h-6 cursor-pointer" @click="showCmtEdit(cmt.id)">
                                  <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>

                              </div>
                            </div>
                            <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600 w-full text-start " 
                              style="word-break:all;">
                                Topic: {{cmt.topic}}
                            </div>
                            <input :id="cmt.id+'edit'" @keyup.enter.prevent="editCmt(cmt.id)"
                              class="block p-2.5 text-sm text-gray-900 bg-gray-50 border-green-200 border-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 ml-3"
                              placeholder="Edit your message here..." required="" style="width:94%;display:none;">
                            <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600 w-full text-start " style="word-break:all;" :id="cmt.id+'txt'">
                               {{cmt.content}}
                            </div>
                            <button v-if="cmt.action.toLowerCase() == 'action' " class="inline-flex items-center px-1 pt-2 ml-1 flex-column w-full text-start" @click="showReplyForm(cmt.id)" >
                              <svg class="w-5 h-5 ml-2 text-gray-600 cursor-pointer fill-current hover:text-gray-900"
                                viewBox="0 0 95 78" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M29.58 0c1.53.064 2.88 1.47 2.879 3v11.31c19.841.769 34.384 8.902 41.247 20.464 7.212 12.15 5.505 27.83-6.384 40.273-.987 1.088-2.82 1.274-4.005.405-1.186-.868-1.559-2.67-.814-3.936 4.986-9.075 2.985-18.092-3.13-24.214-5.775-5.78-15.377-8.782-26.914-5.53V53.99c-.01 1.167-.769 2.294-1.848 2.744-1.08.45-2.416.195-3.253-.62L.85 30.119c-1.146-1.124-1.131-3.205.032-4.312L27.389.812c.703-.579 1.49-.703 2.19-.812zm-3.13 9.935L7.297 27.994l19.153 18.84v-7.342c-.002-1.244.856-2.442 2.034-2.844 14.307-4.882 27.323-1.394 35.145 6.437 3.985 3.989 6.581 9.143 7.355 14.715 2.14-6.959 1.157-13.902-2.441-19.964-5.89-9.92-19.251-17.684-39.089-17.684-1.573 0-3.004-1.429-3.004-3V9.936z"
                                  fill-rule="nonzero" />
                              </svg>
                            </button>
                          </div>
                        </div>
                        <hr class="my-2 ml-16 border-gray-200">
                        <!-- reply chat ------------------------------------------------- -->
                        <div class="w-full" :id='cmt.id+"rp"'>
                            <div clas1s="flex items-center flex-1 px-4  leading-tight" :id='cmt.id' style='display:none'>
                                <input @keyup.enter.prevent="addReply(cmt.student_id,cmt.follow_up_id,cmt.id)" :id="cmt.id+'txtEdit'" type="search"
                                  class="block p-2.5 text-sm text-gray-900 bg-gray-50 border-green-200 border-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 ml-12"
                                  placeholder="Type your replymessage here..." required="" style="width:94%">
                            </div>
                            <div lass="w-full" v-for="reply of rpEachFU" :key="reply" >
                              <div  :id="reply.id+'delete'"  class="flex flex-row pt-1 md-10 md:ml-16 w-full  rounded-md  mt-3" v-if="cmt.id == reply.comment_id" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;width:90%; word-break:all'">
                                <img   class="w-12 h-12 border-2 border-gray-300 rounded-full" alt="Emily's avatar" v-if="cmt.id == reply.comment_id"
                                    src="https://images.unsplash.com/photo-1581624657276-5807462d0a3a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&fit=facearea&faces=1&faceindex=1&facepad=2.5&w=500&h=500&q=80">
                                <div class="flex items-center flex-1 px-4  leading-tight w-full" :id='reply.id+"editRp"' style='display:none'>
                                  <input :id="reply.id+'value'" @keyup.enter.prevent="editRp(reply.id)"  type="search"
                                    class="block p-2.5 text-sm text-gray-900 bg-gray-50 border-green-200 border-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500 w-full"
                                    placeholder="Edit your reply here..." required="" style="width:94%">
                                </div>
                                  <div class="flex-col mt-1 w-full" :id="reply.id+'form'"  >
                                  <div class=" ml-2 text-sm font-medium leading-loose text-gray-600 text-start" v-if="cmt.id == reply.comment_id" >
                                    <div class="w-full flex justify-between">
                                      <p class="font-bold text-black">{{capitalize(commets.user.first_name) }} {{capitalize(commets.user.last_name) }}</p>
                                      <div class=" flex justify-evenly">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                          class="w-6 h-6 mr-5 cursor-pointer" @click="deleteRp(reply.id)">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                          class="w-6 h-6 cursor-pointer" @click="showRpEdit(reply.id)">
                                          <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>                           
                                      </div>
                                    </div>
                                      <p class="w-11/12 break-words" :id="reply.id+'rpMsg'"  >{{reply.reply_msg}} </p>
                                  </div>
                                
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
              <div class="ml-3 mb-2 w-full flex mt-3 justify-start items-end">
                <p class="text-blue-500  underline cursor-pointer" @click="newTopic()">Add new topic</p>
                <input v-model="topic" id="topic"
                  class="ml-9 block p-2.5 text-sm text-gray-900 bg-gray-50 border-green-200 border-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                  placeholder="Type your topic here..." required="" style="width:63%;display:none;">
              </div>
              <div class="w-full  flex items-end mb-3">
                <div class="w-full"> `
                  <div class="flex">
                    <Base_DropDwon_Menu :title="'Topic'" :lists="lists" @emtt_selecte="selectTopic" />
                    <input @keyup.enter.prevent="addComment(index.student_id,index.id)" v-model="comment" type="search" 
                      class="block p-2.5 text-sm text-gray-900 bg-gray-50 border-green-200 border-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                      placeholder="Type your message here..." required="" style="width:75%">
                    <div class="w-full inline-flex shadow-sm" role="group" style="width:25%" >
                      <button type="button" @click="actionCmt()"
                        class="w-full ml-2 py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-green-100 hover:text-green-900 focus:z-10 focus:ring-2 focus:ring-green-300 focus:text-green-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-blue-500 dark:focus:text-white" >
                        Action
                      </button>
                      <button type="button" @click="normalCmt()"
                        class="w-full border-gray-300 border-2 py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b  hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-2 focus:ring-gray-600 focus:text-gray-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Normal
                      </button>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
        <!-- end message -->
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import ListStudentFollowUp from "@/components/widget/StudentFollowUp/ListStudentFollowUp.vue";
// import TheComment from "@/components/widget/comment/TheComment.vue";
import BaseSearch from "@/components/widget/search/BaseSearch.vue";
import Base_DropDwon_Menu from '@/components/widget/dropdown_menu/BaseDropDown.vue'
export default {
  components: {
    BaseSearch,
    ListStudentFollowUp,
    // TheComment,
    Base_DropDwon_Menu,
  },
  data() {
    return {
      replyMsg:'',
      allComments: [],
      showReply:false,
      topic: '',
      userName: 'Student Name',
      standingPage: "follow", // STUDENTS CREATE INFOR
      title: "All Lists Of Follow Up", // TITLE OF HOME PAG
      listStudents: [],
      listFollowUps: [],
      isOpenSearches: false,
      search_data: '',
      commets: {},
      isTrue: false,
      lists:[],
      eachStdFUCount: 0,
      cmtEachFU: [],
      rpEachFU: [],
      action: '',
      fuID: 0,
      showEditCmt: false,
      cmt: '',
      showEditRp:false
    };
  },
  methods: {
    newTopic() {
       document.getElementById('topic').style.display = ''
    },
    closeBoard(id) {
      document.getElementById(id +'board').remove();
      axios.put('http://127.0.0.1:8000/api/follow_up/' + id).then(() => {
        this.getAllData()
      })
    },
    selectTopic(value) {
      console.log(value);
      this.topic = value;
    },
    actionCmt() {
        this.action = 'action'
    },
    normalCmt() {
        this.action = 'normal'
    },
    addReply(studentID, followUPID, commentID) {
      this.showReply = !this.showReply
      const reply = {
        student_id: studentID,
        follow_up_id: followUPID,
        comment_id:commentID,
        reply_msg: document.getElementById(commentID+'txtEdit').value,
      }
      axios.post('http://127.0.0.1:8000/api/replyMsg',reply).then(() => {
        this.getRpByFUID(followUPID);
        document.getElementById(commentID).style.display = 'none'
      })
    },
   
    showForm(id) {
      this.getCmtByFUID(id)
      this.getRpByFUID(id)
      this.isTrue = !this.isTrue
      if (this.isTrue) {
        document.getElementById(id).classList.remove('absolute')
        document.getElementById(id).classList.add('scale-100')
      } else {
        document.getElementById(id).classList.remove('scale-100')
        document.getElementById(id).classList.add('absolute')
      }

    },
    showReplyForm(id) {
      this.showReply = !this.showReply
      if (this.showReply) {
        
        document.getElementById(id).style.display = ''
      } else {
        document.getElementById(id).style.display = 'none'

      }
    },
    OpenSearch() {
      this.isOpenSearches = !this.isOpenSearches;
      this.getAddData()
    },
    // GET ALL DATABASE
    getAllData() {
      axios.get('http://127.0.0.1:8000/api/get_follow_up').then((response) => {
        this.listStudents = response.data
      })
    },

    // ADD DATA TO LIST FOLLOW UP
    getAddData() {
      axios.get('http://127.0.0.1:8000/api/student').then((response) => {
        this.listFollowUps = response.data
      })
    },

    // ADD DATA TO LIST FOLLOW UP
    refresh_page(value) {
      this.isOpenSearches = value
      setTimeout(function () {
        window.location.reload(true)
      }, 1000); //Time before execution
    },

    // Filter to fine the student
    filterSearch(value) {
      this.search_data = value
    },
    // Filter to fine the student
    provideId(id) {
      axios.get('http://127.0.0.1:8000/api/get_follow_up/' + id).then((response) => {
        this.commets = response.data[0];
        this.fuID = id
        this.userName = this.commets.user.first_name + ' ' + this.commets.user.last_name
        console.log(this.commets);
        console.log(id);
        this.getSpecificCmt(this.commets.user.id)
        // axios.get('http://localhost:8000/api/numberFollowUp/' + this.commets.user.id).then((res) => {
        //   this.eachStdFUCount = res.data
        // });
      })
    },
    getSpecificCmt(id) {
      this.comment = '',
        axios.get('http://127.0.0.1:8000/api/follow_up/' + id).then((response) => {
          this.allComments = response.data
          // console.log(this.allComments[0].student_id);
        });
    },

    addComment(studentID,followUPID) {
      document.getElementById('topic').style.display = 'none'
      const userComment = {
        content: this.comment,
        topic: this.topic,
        user_id: 3,
        student_id: studentID,
        follow_up_id: followUPID,
        action: this.action
      }
      const editCmt = {
        content: this.comment,
      }
      if (this.comment.trim() != '') {
        if (!this.ifEdite) {
          axios.post('http://localhost:8000/api/comment/', userComment).then(() => {
            this.comment = ''
            this.getAllTopic()
            this.getCmtByFUID(followUPID);
            
          });
        } else {
          axios.put('http://localhost:8000/api/comment/' + this.comment_id, editCmt).then(() => {
            this.getCmtByFUID(followUPID);
            this.ifEdite = false;
          });
        }
        // this.$emit('add_edit_comment',)
      }

    },

    deleteCmt(id) {
      document.getElementById(id +'parent').remove();
      axios.delete('http://localhost:8000/api/comment/' + id);
    },
    editCmt(id) {
      let cmtTxt = document.getElementById(id + 'txt');
      let edtiTxt = document.getElementById(id + 'edit');
      cmtTxt.textContent = edtiTxt.value
      edtiTxt.style.display = 'none'
      cmtTxt.style.display = ''
      if (edtiTxt.value != "") {
        axios.put('http://localhost:8000/api/comment/' + id, { content: edtiTxt.value });
      }
    },
    deleteRp(rpId) {
      console.log(rpId);
      let rpTxt = document.getElementById(rpId + 'delete');
      rpTxt.remove();
      axios.delete('http://localhost:8000/api/replyMsg/' + rpId);

    },
    showCmtEdit(id) {
      this.showEditCmt = !this.showEditCmt
      let cmtTxt = document.getElementById(id + 'txt');
      let edtiTxt = document.getElementById(id + 'edit');
      if (this.showEditCmt) {
        cmtTxt.style.display = 'none'
        edtiTxt.style.display = ''
      } else {
        edtiTxt.style.display = 'none'
        cmtTxt.style.display = ''
      }
    },
    editRp(id) {
      let rpText = document.getElementById(id + 'value');
      let rpMsg = document.getElementById(id + 'rpMsg');
      let cmtTxt = document.getElementById(id + 'editRp');
      let edtiTxt = document.getElementById(id + 'form');
      rpMsg.textContent = rpText.value;
      edtiTxt.style.display = ''
      cmtTxt.style.display = 'none'
      if (rpMsg.textContent != '') {    
        axios.put('http://localhost:8000/api/replyMsg/' + id, { reply_msg: rpMsg.textContent });
      }
    },
    showRpEdit(epId) {
      this.showEditRp = !this.showEditRp
      let cmtTxt = document.getElementById(epId + 'editRp');
      let edtiTxt = document.getElementById(epId + 'form');
      // let rpTxt = document.getElementById(epId + 'rpMsg').value;
      if (this.showEditRp) {
        cmtTxt.style.display = ''
        edtiTxt.style.display = 'none'
      } else {
        edtiTxt.style.display = ''
        cmtTxt.style.display = 'none'
      }
    },
    showAction(id) {
      this.comment_id = id;
      this.rightClike = !this.rightClike;
    },
    capitalize(word) {
      const loweredCase = word.toLowerCase();
      return word[0].toUpperCase() + loweredCase.slice(1);
    },
    getCmtByFUID(id) {
      axios.get('http://localhost:8000/api/cmtChatByFuID/' + id).then((response) => {
        this.cmtEachFU = response.data[0].comment;
       })
    },

    getRpByFUID(id) {
      axios.get('http://localhost:8000/api/replyChatByFUID/' + id).then((response) => {
        this.rpEachFU = response.data[0].reply_msg;
      })
    },
    getAllTopic() {
      this.lists = []
      axios.get('http://localhost:8000/api/allTopic').then((response) => {
        for (let value of response.data) {
          this.lists.push(value.topic)
        }
      })
    }
  },

  mounted() {
    this.getAllTopic()
    this.getAllData()
  },

  // FILTER FIND STUDENTS
  computed: {
    filter_Generation() {
      return this.listFollowUps.filter(student => (student.user.first_name.toLowerCase().includes(this.search_data.toLowerCase())) || (student.user.last_name.toUpperCase().includes(this.search_data.toUpperCase())));
    },
 
  },

};
</script>

<style>

</style>