<template>
  <div class="w-full m-auto h-screen fixed top-32 flex justify-center">
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
            <!-- search compt -->
              <BaseSearch></BaseSearch>
            <!-- end search compt -->
            <!-- user list -->
            <ListStudentFollowUp></ListStudentFollowUp>
            <!-- end user list -->
          </div>
          <!-- end chat list -->
          <!-- message -->
          <TheComment></TheComment>
          <!-- end message -->
          <!-- student detail -->
          <StudentDetail></StudentDetail>
          <!--end student detail -->
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
import StudentDetail from "@/components/widget/StudentDatail/StudentDatail.vue";

export default {
  components: {
    BaseSearch,
    ListStudentFollowUp,
    TheComment,
    StudentDetail,
  },
  data() {
    return {
      standingPage: "follow", // STUDENTS CREATE INFOR
      title: "All Lists Of Follow Up", // TITLE OF HOME PAG
      listStudents: [],
    };
  },
  methods: {
    getDialog(value) {
      this.openDialog = value;
    },

    getAllData() {
      axios.get("http://127.0.0.1:8000/api/user").then((response) => {
        for (var i = 0; i < response.data.length; i++) {
          if (response.data[i].student[0].if_follow_up == "Yes") {
            this.listStudents.push(response.data[i]);
          }
        }
      });
    },

    // DELET DATA FROM STORAGE
    // deleteUser(id){
    //   axios.delete('http://localhost:8000/api/user/'+id).then(() => {
    //       // return this.getAllData()
    //   })
    // },
    addToFollupList(id) {
      for (var i = 0; i < this.listStudents.length; i++) {
        if (this.listStudents[i].id == id) {
          let data = (this.listStudents[i].student[0].if_follow_up = "Yes");
          axios
            .get("http://127.0.0.1:8000/api/follow_u/" + id, {
              if_follow_up: data,
            })
            .then(() => {
              console.log("Set sucess successfully");
              return this.getAllData();
            });
        }
      }
    },
  },
  mounted() {
    this.getAllData();
    console.log(this.listStudents);
    // return this.listStudents
  },
};
</script>

<style>
</style>