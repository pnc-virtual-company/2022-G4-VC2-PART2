<template>
  <form class="px-5 pt-6 mb-4" @submit.prevent="onSubmit">
    <div class="input-group grid grid-cols-2 text-left">
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">First Name</label>
        <input
          id="input1"
          class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
          type="text"
          autofocus
          placeholder="First Name"
          v-model="first_name"
          @keyup="first_name_validated()"
        />
        <error-message v-if="is_first_name == false"
          >*First Name is required</error-message
        >
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Last Name</label>
        <input
          id="input1"
          class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
          type="text"
          autofocus
          placeholder="Last Name"
          v-model="last_name"
          @keyup="last_name_validated()"
        />
        <error-message v-if="is_last_name == false"
          >*Last Name is required</error-message
        >
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Gender</label>
        <div class="relative">
          <select
            class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
            id="select-item"
            v-model="gender"
            @click="gender_validated()"
          >
            <option selected disabled>Gender</option>
            <option value="M" class="text-black">Male</option>
            <option value="F" class="text-black">Female</option>
          </select>
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </div>
        </div>
        <error-message v-if="is_gender == false"
          >*Gender is required</error-message
        >
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Batch</label>
        <div class="relative">
          <select
            class="w-full border px-4 pr-8 py-1 focus:border-blue-500 focus:shadow-outline outline-none appearance-none text-slate-500 rounded"
            id="select-item"
            v-model="batch"
            @click="batch_validated()"
          >
            <option selected disabled>Batch</option>
            <option value="2023-WEB-A" class="text-black">2023-WEB-A</option>
            <option value="2023-WEB-B" class="text-black">2023-WEB-B</option>
            <option value="2023-SNA" class="text-black">2023-SNA</option>
          </select>
          <div
            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
          >
            <svg
              class="fill-current h-4 w-4"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path
                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
              />
            </svg>
          </div>
        </div>
        <error-message v-if="is_batch == false"
          >*Batch is required</error-message
        >
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Email</label>
        <input
          id="input1"
          class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
          type="text"
          autofocus
          placeholder="Email"
          v-model="email"
          @keyup="email_validated()"
        />
        <error-message v-if="!is_mail">*PNC Email is required</error-message>
      </div>
      <div class="mb-3 px-2 w-full">
        <label class="block mb-1 text-sm" for="input1">Phone Number</label>
        <input
          id="input1"
          class="w-full border px-4 py-1 focus:border-blue-500 focus:shadow-outline outline-none rounded"
          type="text"
          autofocus
          
          placeholder="Phone Number"
          v-model="phone"
        />
        <error-message v-if="is_phone == false"
          >*Phone is required</error-message
        >
      </div>
      <div class="div"></div>
      <div class="flex items-center justify-end p-2 border-slate-200 rounded-b">
        <button
          class="btn-cancel text-white active:bg-orange-600 text-sm rounded px-2 mr-3 shadow hover:bg-orange-400 hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          type="button"
          @click="onCancel"
        >
          Cancel
        </button>
        <button
          class="btn-submit text-white active:bg-sky-600 text-sm text-sm px-2 rounded shadow hover:shadow-lg hover:bg-sky-500 outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          type="submit"
        >
          Create
        </button>
      </div>
    </div>
  </form>
  <!-- 
<div
    class="bg-grey-lighter flex justify-center item-center w-8/12 m-auto mt-10"
  >
    <div
      class="container w-9/12 flex items-center justify-center px-2 rounded shadow-md"
    >
      <div class="bg-white px-6 py-8 text-black w-full">
        <h1
          class="mb-10 underline underline-offset-8 text-3xl text-center"
          style="color: rgba(23, 171, 181, 1)"
        >
          Register Student
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
            class="bg-gray-500 text-white font-bold py-2 px-4 rounded w-1/4"
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
  </div> -->
</template>

<script>
// import axios from "axios"

export default {
      props:{
        student: Object
    },
  data() {
    // return {
    //     email: '',
        // first_name: '',
    //     last_name: '',
    //     password: '',
    //     NGO: '',
    //     batch: '',
    //     province: '',
    //     student_class: '',
    //     gender: '',
    //     img:'',
    // }
    return {
      shosModal: false,
      first_name: this.student.first_name,
      last_name: this.student.last_name,
      student_id: this.student.id,
    };
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
    // pageUpdata(){
    // },
    // studentUpdata(){
    //     const stdList = {
    //         email: this.email,
    //         first_name: this.first_name,
    //         last_name: this.last_name,
    //         NGO: this.NGO,
    //         student_class: this.student_class,
    //         gender: this.gender,
    //         year: this.batch,
    //         province: this.province,
    //         role:'student'
    //         // img: this.img.name,
    //     };
    //     axios.put('http://127.0.0.1:8000/api/user/1', stdList).then((res) => {
    //         console.log(res.data);
    //     })
    // },
    toggleModal() {
      this.shosModal = !this.shosModal;
    },
    onCancel(){
      this.$emit('cancel',false)
    },
    onSubmit(){
      let data = {first_name: this.first_name}
      this.$emit('isShow',false,data,this.student_id)
    }
  },
 
};
</script>

<style></style>
