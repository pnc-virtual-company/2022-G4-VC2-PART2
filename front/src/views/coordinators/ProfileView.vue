<template>
  <div class="w-full mt-24 m-auto px-4">
    <!-- component -->
    <div  class="bg-gray-100">
      <div class="w-full text-white border-t-4 border-blue-300">
        <div
          class="
            flex flex-col
            max-w-screen-xl
            px-4
            mx-auto
            md:items-center md:justify-between md:flex-row md:px-6
            lg:px-8
      
          "

        >
          <div class="p-4 flex flex-row items-center justify-between">
            <h1
          
              class="
                
                text-[3rem]
                text-blue-500
                font-semibold
                tracking-widest
                uppercase
                rounded-lgc
              "
            >
              profile
            </h1>
          </div>
        </div>
      </div>
      <!-- End of Navbar -->
      <div class="container mx-auto p-5">
        <div class="md:flex no-wrap">
          <!-- Left Side -->
          <div class="w-full md:w-2/12 md:mx-8">
            <!-- Profile Card -->
            <div class="bg-white p-3 shadow-md">
              <div class="w-44 flex justify-center">
                <img class="w-40 h-40 rounded-sm" :src="user.img !=null?user.img:avataImage" alt="image description">
              </div>
              <div  class="flex justify-center  border-rounded">
                <div  class="image">
                  <label for="profile-upload">
                    <img class="h-auto w-1/5 mx-auto cursor-pointer mt-[-20px]" src="../../assets/cam.png"  alt="" />
                  </label>
                  <input @change="onFileSelected" id="profile-upload" type="file" hidden="true">
                </div>
              </div>
              <div
                class="
                  flex
                  justify-center
                  space-x-2
                  font-semibold
                  text-gray-800
                  leading-8
                "
              >
                <h1
                  class="
                    text-gray-900
                    font-bold
                    text-xl   
                    my-2
                  "
                >
                {{user.first_name}} {{user.last_name}}
                </h1>
              </div>
            </div>
            <!-- End of friends card -->
          </div>
          <!-- Right Side -->
          <div  class="w-full md:w-9/12 bg-white shadow">
            <!-- Profile tab -->
            <!-- About Section -->
            <div   class="p-4">
              <div 
                class="
                  flex
                  items-center
                  space-x-2
                  font-semibold
                  text-gray-800
                  leading-8
                "
              >
                <span clas="text-green-500">
                  <svg
                    class="h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                    />
                  </svg>
                </span>
                <span class="tracking-wide">About</span>
              </div>
              <div class=" text-gray-700 border-t-2 border-gray-300">
                <div class="grid md:grid-cols-2 text-sm">
                  <div  class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold flex justify-start items-center">
                      <span class="mx-1">
                        <img src="../../assets/name.png" alt="" class="w-3 h-3">
                      </span>
                      <span>
                        First Name
                      </span>
                    </div>
                    <div class="px-4 py-2">{{user.first_name}}</div>
                  </div>
                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold flex justify-start items-center">
                      <span class="mx-1">
                        <img src="../../assets/name.png" alt="" class="w-3 h-3">
                      </span>
                      <span>
                        Last Name
                      </span>
                    </div>
                    <div class="px-4 py-2">{{user.last_name}}</div>
                  </div>
      
                  <div class="grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold flex justify-start items-center">
                      <span class="mx-1">
                        <img src="../../assets/gender.png" alt="" class="w-3 h-3">
                      </span>
                      <span>
                        Gender
                      </span>
                    </div>
                    <div class="px-4 py-2">Female</div>
                  </div>

                  <div class=" grid grid-cols-2">
                    <div class="px-4 py-2 font-semibold flex justify-start items-center">
                      <span class="mx-1">
                        <img src="../../assets/email.png" alt="" class="w-3 h-3">
                      </span>
                      <span>
                        Email
                      </span>
                    </div>
                    <div class="px-4 py-2">{{user.email}}</div>
                  </div>
                  <div class=" grid grid-cols-2" v-if="this.user.role=='student'">
                    <div class="px-4 py-2 font-semibold flex justify-start items-center">
                      <span class="mx-1">
                        <img src="../../assets/ngo.png" alt="" class="w-3 h-3">
                      </span>
                      <span>
                        NGO
                      </span>
                    </div>
                    <div class="px-4 py-2">{{ students.NGO }}</div>
                  </div>
                  <div class=" grid grid-cols-2" v-if="this.user.role=='student'">
                    <div class="px-4 py-2 font-semibold flex justify-start items-center">
                      <span class="mx-1">
                        <img src="../../assets/batch.png" alt="" class="w-3 h-3">
                      </span>
                      <span>
                        Batch
                      </span>
                    </div>
                    <div class="px-4 py-2">{{ students.year }}</div>
                  </div>
                  <div class=" grid grid-cols-2" v-if="this.user.role=='student'">
                    <div class="px-4 py-2 font-semibold flex justify-start items-center">
                      <span class="mx-1">
                        <img src="../../assets/class.png" alt="" class="w-3 h-3">
                      </span>
                      <span>
                        Class
                      </span>
                    </div>
                    <div class="px-2 py-2">{{ students.class }}</div>
                  </div>
                  <div class=" grid grid-cols-2" v-if="this.user.role=='student'">
                    <div class="px-4 py-2 font-semibold flex justify-start items-center">
                      <span class="mx-1">
                        <img src="http://3.bp.blogspot.com/-dzKojeF__I0/VpJPQT-dMHI/AAAAAAAAE54/RkufPXD6G2E/s1600/8.png" alt="" class="w-3 h-3">
                      </span>
                      <span>
                        Province
                      </span>
                    </div>
                    <div class="px-4 py-2">{{ students.province }}</div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import axios from "axios";
  import ls from 'localstorage-slim'
  ls.config.encrypt = true;
export default {
  data() {
    return {
      user:{},
      students:{},
      profile:"",
      avataImage:'https://cdn-icons-png.flaticon.com/512/149/149071.png',
      id:ls.get('id'),
    };
  },
  methods:{
    // GET DATA OF USER
    getUserFromAPI(){
      axios.get("http://127.0.0.1:8000/api/user/3").then((res)=>{
        this.user = res.data[0];
        console.log(this.user.role)
        this.students = this.user.student[0]
        
      })
    },
    // SELECTE FILES IMAGE
    async onFileSelected(event){
      this.onUpload(event.target.files[0])
    },
    // UPLOAD IMAGES
    onUpload(image){
        const fd = new FormData();
        fd.append('img', image)
        fd.append('_method', 'PUT')
        axios.post('http://127.0.0.1:8000/api/upload/3', fd).then(()=>{
          return this.getUserFromAPI();
        })
    },
    // Don't know


    },
    mounted(){
      this.getUserFromAPI();
    }
};
</script>




<style>
:root {
  --main-color: #4a76a8;
} 

.bg-main-color {
  background-color: var(--main-color);
}

.text-main-color {
  color: var(--main-color);
}

.border-main-color {
  border-color: var(--main-color);
}
</style>

