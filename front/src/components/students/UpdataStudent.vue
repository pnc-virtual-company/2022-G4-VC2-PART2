<template>
<div
    class="flex justify-end item-center w-8/12 m-auto mt-10"
  >
    <div
      class="container w-11/12 flex items-center  px-2 rounded"
    >
      <div class="bg-gray-300 px-6 py-8 text-black w-full  shadow-md rounded-md opacity-100">
        <h1
          class="mb-10 underline underline-offset-8 text-3xl text-center"
          style="color: rgba(23, 171, 181, 1)"
        >
          Edit Student
        </h1>
        <div class="flex gap-2">
          <input
            type="text"
            v-model="first_name"
            class="block border border-grey-light w-full p-3 rounded mb-4"
            placeholder="First Name"
          />

          <input
            type="text"
            v-model="last_name"
            class="block border border-grey-light w-full p-3 rounded mb-4"
            placeholder="Last Name"
          />
        </div>
        <div class="flex gap-2">
          <input
            type="text"
            v-model="email"
            class="block border border-grey-light w-full p-3 rounded mb-4"
            placeholder="Email"
          />

          <input
            v-model="NGO"
            type="text"
            class="block border border-grey-light w-full p-3 rounded mb-4"
            placeholder="From NGO"
          />
        </div>
        <div class="flex gap-2">
          <input
            v-model="province"
            type="text"
            class="block border border-grey-light w-full p-3 rounded mb-4"
            name="email"
            placeholder="Province"
          />
        </div>
        <div class="flex gap-2">
          <select
            v-model="batch"
            name="batch"
            class="outline-1 block border border-grey-light w-full p-3 rounded mb-4 text-gray-400"
          >
            <option value="2022">2022</option>
            <option value="2023">2023</option>
          </select>
          <select
            v-model="student_class"
            name=""
            class="outline-1 block border border-grey-light w-full p-3 rounded mb-4 text-gray-400"
          >
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="2022">2022</option>
          </select>
        </div>
        <div class="flex w-8/12 justify-between">
          <h1>Gender :</h1>
          <div class="flex items-center">
            <input
              id="inline-radio"
              type="radio"
              value="M"
              name="inline-radio-group"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              v-model="gender"
            />
            <label
              for="inline-radio"
              class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Male</label
            >
            <input
              id="inline-2-radio"
              type="radio"
              value="F"
              name="inline-radio-group"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              v-model="gender"
            />
            <label
              for="inline-2-radio"
              class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Female</label
            >
            <input
              checked
              id="inline-checked-radio"
              type="radio"
              value="Other"
              name="inline-radio-group"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
              v-model="gender"
            />
            <label
              for="inline-checked-radio"
              class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
              >Others</label
            >
          </div>
        </div>
        <div class="mt-5 w-full flex justify-evenly item-center">
          <button
            class="bg-gray-500 text-white font-bold py-2 px-4 rounded w-1/4" @click="onCancel"
          >
            Cancel
          </button>
          <button
            @click="studentUpdata"
            style="background-color: rgba(23, 171, 181, 1)"
            class="hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4"
          >
            Edit
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import axios from "axios"

export default {
  props:{
    users: Object
},
  data() {
    return {
        email: '',
        first_name: '',
        last_name: '',
        password: '',
        NGO: '',
        batch: '',
        province: '',
        student_class: '',
        gender: '',
    }
  },
  methods: {
    // getStudent(){
    //     axios.get('http://127.0.0.1:8000/api/student/1').then((res)=>{
    //         this.first_name = (res.data[0].first_name)
    //         this.last_name = (res.data[0].last_name)
    //         this.gender = (res.data[0].gender)
    //         this.email = (res.data[0].email)
    //         this.province = (res.data[0].student[0].province)
    //         this.NGO = (res.data[0].student[0].NGO)
    //         this.batch = (res.data[0].student[0].year)
    //         this.student_class = (res.data[0].student[0].student_class)
    //         console.log(res.data)
    //         console.log(res.data[0].student[0].student_class)
    //     })
    // },
    pageUpdata(){
    },
    studentUpdata(){
        const stdList = {
            email: this.email,
            first_name: this.first_name,
            last_name: this.last_name,
            NGO: this.NGO,
            student_class: this.student_class,
            gender: this.gender,
            year: this.batch,
            province: this.province,
            role:'student' 
      };
      this.$emit('student_update', stdList);
        
    },
    
    toggleModal() {
      this.shosModal = !this.shosModal;
    },
    onCancel(){
      this.$emit('cancel',false)
    },
    onSubmit(){
      let data = {first_name: "hello"}
      this.$emit('isShow',false,data,1)
    }
  },
 
};
</script>

<style></style>
