<template>
  <div class="w-full px-8 m-auto h-screen top-28 flex justify-end items-center">
    <div
      v-if="showModal"
      class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
    >
      <div class="form-container shadow-md rounded w-10/10">
        <h2 class="header text-center text-white py-3">
          Create Student Account
        </h2>
        <updateStudent @cancel="onCancel" @isShow="editStudent" :student="student_obj"></updateStudent>
      </div>
    </div>
    <div v-if="showModal" class="opacity-30 fixed inset-0 z-40 bg-black"></div>
    <ul class="w-3/4 px-4 divide-y bg-white">
      <div class="overflow-x-auto relative shadow-md sm:rounded-lg absolute">
        <table class="w-full text-sm text-left">
          <thead class="text-xs dark:text-white uppercase bg-teal-700">
            <tr>
              <th scope="col" class="py-3 px-6">Name</th>
              <th scope="col" class="py-3 px-6">Batch</th>
              <th scope="col" class="py-3 px-6 flex justify-end">Action</th>
            </tr>
          </thead>
          <tbody v-for="student in this.student_info" :key="student">
            <tr
              class="bg-white border-b hover:bg-gray-50 dark:hover:bg-gray-200"
            >
              <th
                scope="row"
                class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap"
              >
                <img
                  class="w-10 h-10 rounded-full"
                  src="@/assets/teacher.png"
                  alt="Jese image"
                />
                <div class="pl-3">
                  <div class="text-base font-normal text-gray-500">
                    {{ student.first_name }} {{ student.last_name }}
                  </div>
                  <div class="font-normal text-gray-500">
                    {{ student.email }}
                  </div>
                </div>
              </th>
              <td class="py-4 px-6">
                {{ student.student_class }} {{ student.batch }}
              </td>
              <td class="py-4 px-6 flex justify-end">
                <button
                  type="button"
                  class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                  v-on:click="toggleModal()"
                  @click="getStudent(student.id)"
                >
                  Edit</button
                ><button
                  type="button"
                  class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </ul>
  </div>
</template>

<script>
// import axios from 'axios'
import updateStudent from "./UpdataStudent.vue";
export default {
  components: {
    updateStudent,
  },
  data() {
    return {
      student_info: [
        {
          id: 1,
          email: "phanith1999@gmail.com",
          first_name: "phanith",
          last_name: "chhim",
          batch: "2022",
          student_class: "WEB B",
        },
        {
          id: 2,
          email: "nga@gmail.com",
          first_name: "nga",
          last_name: "hueon",
          batch: "2022",
          student_class: "WEB B",
        },
        {
          id: 3,
          email: "hak@gmail.com",
          first_name: "hak",
          last_name: "kim",
          batch: "2022",
          student_class: "WEB B",
        },
        {
          id: 4,
          email: "veang@gmail.com",
          first_name: "veang",
          last_name: "khong",
          batch: "2022",
          student_class: "WEB B",
        },
      ],
      isTrue: false,
      showModal: false,
      student_obj: {}
    };
  },
  methods: {
    // getStudent() {
    //   // axios.get('http://127.0.0.1:8000/api/user').then((res)=>{
    //   // this.first_name = (res.data[0].first_name)
    //   // this.last_name = (res.data[0].last_name)
    //   // this.batch = (res.data[0].student[0].year)
    //   // this.email = (res.data[0].email)
    //   // this.student_class = (res.data[0].student[0].student_class)
    //   // })
    //   let student_info = this.student_info;
    //   console.log(student_info);
    // },
    editInfo() {
      this.isTrue = true;
    },
    toggleModal: function(){
        this.showModal = !this.showModal;
      },
      onCancel(isShow){
        this.showModal = isShow;
      },
      editStudent(isShow,data,id){
        this.showModal = isShow;
        console.log(id)
        console.log(data)
      },
      getStudent(id){
        this.student_info.forEach(student => {
          if (student.id == id){
            this.student_obj = student;
          }
        });
      }
  },
  mounted() {
    this.getStudent();
  },
};
</script>

<style>
    .header {
      background: #22BBEA;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
      font-weight: bold;
      font-size: 20px;
  }
  
  .form-container {
      background: #BBD7E0;
  }
</style>
