<template>
  <div class="accordion accordion-flush" id="accordionFlushExample">
    <div
      class="
        accordion-item
        border-t-0 border-l-0 border-r-0
        rounded-none
        bg-white
        border border-gray-200
      "
    >
      <h2 class="accordion-header mb-0" id="flush-headingOne">
        <button
          class="
            accordion-button
            relative
            flex
            items-center
            w-full
            py-4
            px-5
            text-base text-gray-800 text-left
            bg-white
            border-0
            rounded-none
            transition
            focus:outline-none
          "
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#flush-collapseOne"
          aria-expanded="false"
          aria-controls="flush-collapseOne"
        >
          Student Details
        </button>
      </h2>
      <div
        id="flush-collapseOne"
        class="accordion-collapse border-0 collapse show"
        aria-labelledby="flush-headingOne"
        data-bs-parent="#accordionFlushExample"
      >
        <div class="accordion-body py-4 px-5">
          <div class=" px-8 m-auto flex ">
            <ul class="w-full flex justify-center">
              <!-- <div class="bg-fuchsia-300 flex justify-center items-center h-sreen"> -->
              <div
                class="
                  flex 
                  justify-around
                  p-4
                  w-full
                  rounded-xl
                  shadow-xl
                  border border-fuchsin-400
                ">
                <!--Profile-->
                <img
                  src="@/assets/savert.jpg"
                  alt=""
                  class="w-32 h-32 rounded-full shadow-md"
                />
                <!--Name of user-->
                <div class="w-full ">
                  <form >
                    <div class=" flex  px-5">
                      <div class="w-full  mb-3 mr-1">
                        <label
                          for="text"
                          class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-900
                            dark:text-300
                          "
                          >FristName</label
                        >
                        <div
                          class="
                            border border-current
                            text-gray-900 text-sm
                            w-full
                            p-2.5
                          "
                        >
                          <h3>Samoul</h3>
                        </div>
                      </div>

                      <div class="w-full  mb-3 ml-1">
                        <label
                          for="text"
                          class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-900
                            dark:text-300
                          "
                          >lastName</label
                        >
                        <div
                          class="
                            border border-current
                            text-gray-900 text-sm
                            w-full
                            p-2.5
                          "
                        >
                          <h3>Vann </h3>
                        </div>
                      </div>
                    </div>

                    <div class=" flex  px-5">
                      <div class="w-full  mb-3 mr-1">
                        <label
                          for="text"
                          class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-900
                            dark:text-300
                          "
                          >Batch</label
                        >
                        <div
                          class="
                            border border-current
                            text-gray-900 text-sm
                            w-full
                            p-2.5
                          "
                        >
                          <h3>2023</h3>
                        </div>
                      </div>

                      <div class="w-full  mb-3 ml-1">
                        <label
                          for="text"
                          class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-900
                            dark:text-300
                          "
                          >Class</label
                        >
                        <div
                          class="
                            border border-current
                            text-gray-900 text-sm
                            w-full
                            p-2.5
                          "
                        >
                          <h3>WEB B </h3>
                        </div>
                      </div>
                    </div>

                    <div class=" flex  px-5">
                      <div class="w-full  mb-3 mr-1">
                        <label
                          for="text"
                          class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-900
                            dark:text-300
                          "
                          >Gender</label
                        >
                        <div
                          class="
                            border border-current
                            text-gray-900 text-sm
                            w-full
                            p-2.5
                          "
                        >
                          <h3>Female </h3>
                        </div>
                      </div>

                      <div class="w-full  mb-3 ml-1">
                        <label
                          for="text"
                          class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-900
                            dark:text-300
                          "
                          >Provenve</label
                        >
                        <div
                          class="
                            border border-current
                            text-gray-900 text-sm
                            w-full
                            p-2.5
                          "
                        >
                          <h3>Banthery Meanchey </h3>
                        </div>
                      </div>
                    </div>

                    <div class=" flex  px-5">
                      <div class="w-full  mb-3 mr-1">
                        <label
                          for="text"
                          class="
                            block
                            mb-2
                            text-sm
                            font-medium
                            text-gray-900
                            dark:text-300
                          "
                          >NGO_Name</label
                        >
                        <div
                          class="
                            border border-current
                            text-gray-900 text-sm
                            w-full
                            p-2.5
                          "
                        >
                          <h3>PasserellNumeriques.Cambodia</h3>
                        </div>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
              <!-- </div> -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import Base_Button from '../button/BaseButton.vue';
import axios from "axios";
export default {
  props: ["object"],
  components: {
    // Base_Button,
    // UserList,
  },
  data() {
    return {
      dataToUpdate: [],
      showStudentForm: false,
      email: " ",
      first_name: " ",
      last_name: " ",
      password: "12345678",
      NGO: " ",
      batch: " ",
      province: " ",
      student_class: " ",
      sex: "others",
      validatePSW: "Password must be at least 8 characters !",
      ifAllfiedInput: false,
      userEmail: "",
      role: "student",
    };
  },
  methods: {
    toggleShow() {
      this.showPassword = !this.showPassword;
    },

    showOldData() {
      this.email = this.dataToUpdate[0].email;
      this.first_name = this.dataToUpdate[0].first_name;
      this.last_name = this.dataToUpdate[0].last_name;
      this.password = this.dataToUpdate[0].password;
      this.NGO = this.dataToUpdate[0].student[0].NGO;
      this.batch = this.dataToUpdate[0].student[0].year;
      this.province = this.dataToUpdate[0].student[0].province;
      this.class = this.dataToUpdate[0].student[0].class;
      (this.gender = this.dataToUpdate[0].gender),
        (this.role = this.dataToUpdate[0].role);
    },
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/user/" + this.object.id)
      .then((res) => {
        axios.get("http://localhost:8000/api/batch").then((res) => {
          this.allBatch = res.data;
          if (this.allBatch == "") {
            this.showAddNewBatch = true;
          }
        });
        this.dataToUpdate = res.data;
        // this.showOldData()
      });
  },
};
</script>
    

<style>
</style>