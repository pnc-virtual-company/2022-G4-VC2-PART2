<template>
    <div class="w-full fixed mt-16 top-1">
      <!-- This is an example component -->
      <div class="container mx-auto shadow-lg rounded-lg">
        <!-- Chatting -->
        <div class="h-screen flex flex-rol justify-between ">
          <!-- chat list -->
          <div class="flex flex-col w-2/12 border-r-2 overflow-y-auto">
            <!-- ___________search compt ___________-->
            <div class="border py-4 px-2 flex justify-between items-center border-b-black" v-if="!isOpenSearches">
              <div class="flex justify-between items-center">
                <svg class="h-5 fill-current text-blue-900 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                {{ listStudents.length }} Members
              </div>
              
              <div class="flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 font-bold text-blue-900 cursor-pointer " @click="OpenSearch">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>
              </div>
            </div>

            <div class="flex justify-between px-3 pt-3" v-if="isOpenSearches" @click="OpenSearch">
              <h3> All Students {{ listFollowUps.length }}</h3>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </div>

            <BaseSearch v-if="isOpenSearches" @emit_search="filterSearch"/>
            <!-- end search compt -->
            <!-- user list -->
            <!-- <div v-if="isOpenSearches" class="opacity-30 fixed inset-0 z-40 bg-black"></div> -->
            <ListStudentFollowUp :listStudents="listStudents" v-if="!isOpenSearches" @emit_add="refresh_page" @emit_id="provideId"/>
            <ListStudentFollowUp :listStudents="filter_Generation" v-if="isOpenSearches" @emit_add="refresh_page"/>
          
            <!-- end user list -->
            <!-- _____________Give the inoformation_________ -->
              <div class= "w-full flex justify-center m-2 h-full text-blue-600 text-1xl uppercase" v-if="(this.listStudents.length <= 0 && !isOpenSearches)">
                <h1>No Studet Follow Up!</h1>
              </div>
            </div>
            
            <!-- end chat list -->
            <!-- message -->
            <div class="w-full">
              <TheComment :commets="commets"></TheComment>
              <button class="m-5" style="width:15%">+ Add Board</button>
            </div>
            <!-- end message -->
          </div>
        </div>
      </div>
</template>

<script>
import axios from "axios";
import ListStudentFollowUp from "@/components/widget/StudentFollowUp/ListStudentFollowUp.vue";
import TheComment from "@/components/widget/comment/TheComment.vue";
import BaseSearch from "@/components/widget/search/BaseSearch.vue";

export default {
  components: {
    BaseSearch,
    ListStudentFollowUp,
    TheComment,
  },
  data() {
    return {
      standingPage: "follow", // STUDENTS CREATE INFOR
      title: "All Lists Of Follow Up", // TITLE OF HOME PAG
      listStudents: [],
      listFollowUps:[],
      isOpenSearches: false,
      search_data : '',
      commets: {},
    };
  },
  methods: {
    OpenSearch() {
      this.isOpenSearches = !this.isOpenSearches;
      this.getAddData()
    },
     // GET ALL DATABASE
    getAllData(){
      axios.get('http://127.0.0.1:8000/api/get_follow_up').then((response)=>{
        this.listStudents = response.data
      })
    },

    // ADD DATA TO LIST FOLLOW UP
    getAddData(){
      axios.get('http://127.0.0.1:8000/api/student').then((response)=>{
        this.listFollowUps = response.data
      })
    },

    // ADD DATA TO LIST FOLLOW UP
    refresh_page(value){
      this.isOpenSearches = value
      setTimeout(function(){
        window.location.reload(true)
    }, 1000); //Time before execution
    },

    // Filter to fine the student
    filterSearch(value){
      this.search_data = value
    },
    // Filter to fine the student
    provideId(id){
      axios.get('http://127.0.0.1:8000/api/get_follow_up/'+id).then((response)=>{
        this.commets = response.data[0];
        console.log(this.commets);
      })
    },
  },

  mounted() {
      this.getAllData()
  },

  // FILTER FIND STUDENTS
  computed: {
    filter_Generation() {
      return this.listFollowUps.filter(student => (student.user.first_name.toLowerCase().includes(this.search_data.toLowerCase())) || (student.user.last_name.toUpperCase().includes(this.search_data.toUpperCase())));
    }
  },
};
</script>

<style>
</style>