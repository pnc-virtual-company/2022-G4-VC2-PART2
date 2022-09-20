<template>
    <div class="w-full mt-28 m-aut flex justify-center px-4 ">
      <div class="w-full">
      <!-- This is an example component -->
      <div class="container mx-auto shadow-lg rounded-lg">
        <!-- headaer -->
        <div class="bg-white border-b-2"></div>
        <!-- end header -->
        <!-- Chatting -->
        <div class="flex flex-row justify-between bg-white">
          <!-- chat list -->
          <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto">
            <!-- ___________search compt ___________-->
            <div class="flex justify-between px-2 py-1" v-if="isOpenSearches" @click="OpenSearch">
              <h3>All Students</h3>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-left">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>

            <div class="border-b-2 py-3 px-2 flex justify-between items-center border-b-sky-400" v-if="!isOpenSearches">
              <div class="flex justify-between items-center font-bold">
                <svg class="h-5 fill-current text-blue-500 mx-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                {{ listStudents.length }} Members
              </div>
              <!-- <div>
                
              </div> -->
              <div class="flex justify-between items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 font-bold text-blue-500 cursor-pointer " @click="OpenSearch">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>
              </div>
            </div>
            <BaseSearch v-if="isOpenSearches"></BaseSearch>
            <!-- end search compt -->
            <!-- user list -->
            <ListStudentFollowUp :listStudents="listStudents"/>
            <!-- end user list -->
          </div>
          <!-- end chat list -->
          <!-- message -->
          <TheComment></TheComment>
          <!-- end message -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import BaseSearch from "@/components/widget/search/BaseSearch.vue";
import ListStudentFollowUp from "@/components/widget/StudentFollowUp/ListStudentFollowUp.vue";
import TheComment from "@/components/widget/comment/TheComment.vue";

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
      isOpenSearches: false,
    };
  },
  methods: {
    OpenSearch() {
      this.isOpenSearches = !this.isOpenSearches;
    },
     // GET ALL DATABASE
    getAllData(){
      axios.get('http://127.0.0.1:8000/api/getStuendFollow').then((response)=>{
        this.listStudents = response.data
            console.log(response.data[0])
      })
    },
  },
  mounted() {
    return this.getAllData()
  }
};
</script>

<style>
</style>