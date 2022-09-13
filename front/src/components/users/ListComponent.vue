<template>
  <!-- component -->
  <div
    class="overflow-x-auto relative shadow-sm bg-gray-100 sm:rounded-lg mt-2 p-2"
  >
    <div class="pb-4">
      <button
        class="px-4 py-4 bg-green-500 text-white font-extrabold"
        @click="addUser"
      >
        Create Student+
      </button>
    </div>

    <div
      v-if="showModal"
      class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
    >
      <div class="form-container shadow-md rounded w-4/5">
        <h2 class="header text-center text-white py-3">
          Create Student Account
        </h2>
        <updateStudent @cancel="onCancel" @onCancel="editStudent"></updateStudent>
      </div>
    </div>
    <div v-if="showModal" class="opacity-30 fixed inset-0 z-40 bg-black"></div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead
        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
      >
        <tr>
          <th scope="col" class="p-4">
            <div class="flex items-center">ID</div>
          </th>
          <th scope="col" class="py-3 px-6">Name</th>
          <th scope="col" class="py-3 px-6">Position</th>
          <th scope="col" class="py-3 px-6">Status</th>
          <th scope="col" class="py-3 px-6">Action</th>
        </tr>
      </thead>

      <tbody>
        <tr
          class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
        >
          <td class="p-4 w-4">
            <div class="flex items-center">02</div>
          </td>
          <th
            scope="row"
            class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white"
          >
            <img
              class="w-10 h-10 rounded-full"
              src="../../assets/student.png"
              alt="Jese image"
            />
            <div class="pl-3">
              <div class="text-base font-semibold">Neil Sims</div>
              <div class="font-normal text-gray-500">
                neil.sims@flowbite.com
              </div>
            </div>
          </th>
          <td class="py-4 px-6">React Developer</td>
          <td class="py-4 px-6">
            <div class="flex items-center">
              <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
              Online
            </div>
          </td>
          <td class="py-4 px-6">
            <a
              href="#"
              class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
              v-on:click="toggleModal()"
              >Edit user</a
            >
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import updateStudent from "../students/UpdataStudent.vue";
export default {
    components: {
        updateStudent,
    },
    data(){
        return {
            showModal: false
        }
    },
  methods: {
    addUser() {
      return this.$router("");
    },
    toggleModal: function () {
      this.showModal = !this.showModal;
      console.log("hello");
    },
    onCancel(isShow){
        this.showModal = isShow
    },
    editStudent(isShow,student,id){
        this.showModal = isShow;
        console.log(student)
        console.log(id)
    }
  },
};
</script>
<style></style>
