<template>
<div
    class="bg-grey-lighter flex justify-center item-center w-8/12 m-auto mt-10"
  >
    <div
      class="container w-9/12 flex items-center justify-center px-2 rounded shadow-md"
    >
      <div class="bg-white px-6 py-8 text-black w-full mb-5">
        <h1
          class="mb-10 underline underline-offset-8 text-3xl text-center"
          style="color: rgba(23, 171, 181, 1)"
        >
          Edit Student
        </h1>
        <div class="flex gap-2">
          <div class="w-full">
            <span class="text-gray-500">First Name</span>
            <input
              type="text"
              v-model="first_name"
              class="block border border-grey-light w-full p-3 rounded "
            />
            <alertForm/>
          </div>
          <div class="w-full">
            <span class="text-gray-500">Last Name</span>
            <input
              type="text"
              v-model="last_name"
              class="block border border-grey-light w-full p-3 rounded"
            />
            <alertForm/>
          </div>
        </div>
        <div class="flex gap-2">
          <div class="w-full">
            <span class="text-gray-500">From NGO</span>
            <input
              v-model="NGO"
              type="text"
              class="block border border-grey-light w-full p-3 rounded "
            />
            <alertForm/>
          </div>
          <div class="w-full">
            <span class="text-gray-500">Province</span>
            <input
             v-model="province"
             type="text"
             class="block border border-grey-light w-full p-3 rounded "
           />
           <alertForm/>
          </div>
        </div>
        <div class="flex gap-2">
          <div class="w-full">
            <span class="text-gray-500">Email</span>
            <input
                v-model="email"
                type="text"
                class="block border border-grey-light w-full p-3 rounded "
              />
            <alertForm/>
          </div>
          <div class="w-full">
            <span class="text-gray-500">Password</span>
            <input
                v-model="password"
                type="text"
                class="block border border-grey-light w-full p-3 rounded "
            />
           <alertForm/>
          </div>
        </div>
        <div class="flex gap-2">   
            <div class="w-full">
                <span class="text-gray-500">Batch</span>
                <select v-model="batch" name="batch" class="outline-1 block border border-grey-light w-full p-3 rounded text-gray-400">
                  <option value="2022" selected>2022</option>
                  <option value="2023">2023</option>
                </select>
              <alertForm/>
              </div>
              <div class="w-full">
                <span class="text-gray-500">Class</span>
                <select v-model="batch" name="batch" class="outline-1 block border border-grey-light w-full p-3 rounded text-gray-400">
                  <option value="A">A</option>
                  <option value="B">B</option>
                </select>
              <alertForm/>
              </div>
        </div>
        <!-- <div class="flex justify-between">
          <div class="w-1/3">
            <h1>Gender :</h1>
          </div>
          <div class="flex w-full ">
            <div class="w-1/3" >
              <input
                type="radio"
                value="male"
                name="inline-radio-group"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                v-model="gender"
              />
              <label
                for="inline-radio"
                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Male</label
              >
            </div>
            <div class="w-1/3">
              <input
                type="radio"
                value="female"
                name="inline-radio-group"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                v-model="gender"
              />
              <label
                for="inline-2-radio"
                class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                >Female</label
              >
            </div>
            <div class="w-1/3">
              <input
                checked
                type="radio"
                value="other"
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
        </div> -->
        <div class="mt-5 w-full flex justify-evenly item-center">
          <button
            class="bg-gray-500 text-white font-bold py-2 px-4 rounded w-1/4" @click="onCancel"
          >
            Cancel
          </button>
          <button
            @click="studentUpdate"
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
import axios from "axios"
import alertForm from '../alertForm/alert_form.vue'

export default {
  components: {
    alertForm,
  },
  props:{
    users: Object
},
  data() {
    return {
        email: this.users[0].email,
        first_name:this.users[0].first_name,
        last_name: this.users[0].last_name,
        password: this.users[0].password,
        NGO:  this.users[0].student[0].NGO,
        batch: this.users[0].student[0].year,
        province: this.users[0].student[0].province,
        student_class: this.users[0].student[0].class,
        gender: this.users[0].gender,
        role: this.users[0].role
        // img:'',
    }

  },
  methods: {
    getStudent() {
      axios.get('http://127.0.0.1:8000/api/student/1').then(() => {

      })
    },

    studentUpdate() {
      const student = {
          email: this.email,
          first_name:this.first_name,
          last_name: this.last_name,
          password: this.password,
          NGO:  this.NGO,
          year: this.batch,
          province: this.province,
          class: this.student_class,
          gender: this.gender,
          role: this.role,
          if_follow_up: "No",
      }
        this.$emit('update_student',student)    
    },
    
    toggleModal() {
      this.shosModal = !this.shosModal;
    },
    onCancel(){
      this.$emit('cancel',false)
    },
    onSubmit(){
      this.$emit('isShow')
    }
  },


 
};
</script>

<style></style>
