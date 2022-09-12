<template>
    <!-- component -->
<div class="bg-grey-lighter flex justify-center item-center w-8/12 m-auto mt-10">
            <div class="container w-9/12 flex items-center justify-center px-2 rounded shadow-md">
                <div class="bg-white px-6 py-8 text-black w-full" >
                    <h1 class="mb-10 underline underline-offset-8 text-3xl text-center" style="color: rgba(23, 171, 181, 1);">Register Student</h1>
                    <div class="flex gap-2">
                        <input 
                            v-model="first_name"
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="First Name" />
    
                        <input 
                            v-model="last_name"
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"                   
                            placeholder="Last Name" />
                    </div>
                    <div class="flex gap-2">
                        <input 
                            v-model="email"
                            type="email"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="Email" />
    
                            <input  
                            v-if="!showStudentForm"
                            v-model="NGO"
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="From NGO" />
                    </div>
                    <div class="flex gap-2">
                        <input 
                            v-model="password"
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="Password" />
    
                        <input v-if="!showStudentForm"
                            v-model="province"
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="Province" />
                    </div>
                    <div class="flex gap-2" v-if="!showStudentForm">
                        <select  class="outline-1 block border border-grey-light w-full p-3 rounded mb-4 text-gray-400" v-model="batch">
                            <option value="">Batch</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <select v-model="student_class"  class="outline-1 block border border-grey-light w-full p-3 rounded mb-4 text-gray-400" >
                            <option value="">Class</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm  text-gray-500 dark:text-gray-300" for="multiple_files">Upload multiple files</label>
                        <input class="p-2 block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"  type="file" accept="image/*" enctype='multipart/form-data'  @change="getImg($event)">
                    </div>
                   <div class="flex w-8/12 justify-between mt-3" v-if="!showStudentForm">
                        <h1>Gender : </h1>
                        <div class="flex items-center ">
                            <input  id="inline-radio" type="radio" value="male" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" v-model="gender">
                            <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                        </div>
                        <div class="flex items-center ">
                            <input  id="inline-2-radio" type="radio" value="female" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" v-model="gender">
                            <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input  checked id="inline-checked-radio" type="radio" value="others" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" v-model="gender">
                            <label for="inline-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Others</label>
                        </div>     
                    </div>
                    <div class="mt-5 w-full flex justify-evenly item-center">
                            <button  class="bg-gray-500   text-white font-bold py-2 px-4 rounded w-1/4">Cancel</button>
                            <button @click="signUP()" style="background-color: rgba(23, 171, 181, 1);" class="  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4" >Sign Up</button>
                        </div>
                        <div class="mt-5 w-full flex justify-center item-center">
                            <button style="background-color: rgba(23, 171, 181, 1);" class="  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4" @click="showStudentForm = true">Sign Up coordinator</button>
                        </div>
                        <div class="mt-5 w-full flex justify-center item-center">
                            <button style="background-color: rgba(23, 171, 181, 1);" class="  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4" @click="showStudentForm = true">Sign Up teacher</button>
                        </div>
                        <div class="mt-5 w-full flex justify-center item-center">
                            <button style="background-color: rgba(23, 171, 181, 1);" class="  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4" @click="showStudentForm = false">Sign Up student</button>
                        </div>
                </div>
            </div>
        </div>
</template>

<script>
import axios from 'axios'
export default ({
    data()
    {
        return {
            showStudentForm: false,
            email: '',
            first_name: '',
            last_name: '',
            password: '',
            NGO: '',
            batch: '',
            province: '',
            student_class: '',
            gender: '',
            img:''   
        }
    },
    methods: {
        async getImg(event){
            this.img = event.target.files[0];
            console.log(this.img.name)
        },  
        signUP() {
            const stdList = {
                email: this.email,
                first_name: this.first_name,
                last_name: this.last_name,
                password: this.password,
                NGO: this.NGO,
                class: this.student_class,
                gender: this.gender,
                year: this.batch,
                province: this.province,
                role: 'student',
                img: this.img.name,
            };

            axios.post('http://localhost:8000/api/user/', stdList).catch((error) => {
                console.log(error.response.data);
            })
        },
       
        // UPLOAD IMAGES
        // onUpload(image) {
        //         const fd = new FormData();
        //         fd.append('image', image)
        //         fd.append('_method', 'PUT')

        //         axios.post('/upload/' + localStorage.getItem("id"), fd).then(() => {
        //             console.log(' Successfully uploaded')
        //     })
            // setTimeout(function(){
            //     window.location.reload();
            // }, 1000);
         }
    //  },
})
</script>
