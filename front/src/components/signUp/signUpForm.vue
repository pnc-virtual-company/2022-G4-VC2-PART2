<template>
    <!-- component -->
    <teleport to='body'>
        <div class="bg-grey-lighter flex justify-center items-center w-8/12 m-auto mt-48 z-50 rounded-md">
               <div class="container w-9/12 flex items-center justify-center px-2 rounded-md drop-shadow-md ">
                <div class="bg-white px-6 py-8 text-black w-full -mt-10" >
                <h1 class="mb-10 underline underline-offset-8 text-3xl text-center" style="color: rgba(23, 171, 181, 1);">Register Student</h1>
                <div class="flex gap-2">
                    <div class=" w-full mb-2">
                        <input 
                            v-model="first_name"
                            type="email"
                            class="block border border-grey-light w-full p-3 rounded"
                            placeholder="Frist Name" />
                            <alertForm v-if='first_name =="" '  :psw="checkOutSidePSWField(first_name)" />
                    </div>
                    <div class="w-full">
                        <input  
                        v-model="last_name"
                        type="email"
                        class="block border border-grey-light w-full p-3 rounded "
                        placeholder="Last Name" />
                        <alertForm  v-if="last_name =='' " :psw="checkOutSidePSWField(last_name)" />
                    </div>
                </div>
                <div class="flex mb-2 gap-2">
                    <div class=" w-full ">
                        <input 
                            v-model="email"
                            type="email"
                            class="block border border-grey-light w-full p-3 rounded"
                            placeholder="Example@gmail.com" />
                            <alertForm  v-if="email =='' " :psw="validateEmail(email)"  />
                    </div>
                    <div class="w-full">
                        <input  
                        v-if="!showStudentForm"
                        v-model="NGO"
                        type="email"
                        class="block border border-grey-light w-full p-3 rounded"
                        placeholder="From NGO"  />
                        <alertForm v-if="NGO =='' " :psw="checkOutSidePSWField(NGO)" required />
                    </div>
                </div>
                <div class="flex mb-2">
                    <div class="w-full flex gap-2">
                        <div class=" w-full ">
                        <input 
                            v-model="password"
                            type="email"
                            class="block border border-grey-light w-full p-3 rounded"
                            placeholder="Password" />
                            <alertForm v-if="password.length<8 " :psw="checkPassword(password)" />
                    </div>
                    <div class="w-full">
                        <input  
                        v-if="!showStudentForm"
                        v-model="province"
                        type="email"
                        class="block border border-grey-light w-full p-3 rounded "
                        placeholder="From Province" />
                        <alertForm v-if="province =='' " :psw="checkPassword(province)" />
                    </div>
                    </div>
                </div>
                <div class="flex gap-2 mb-5" v-if="!showStudentForm">
                    <div class="w-full" >
                        <select   class="outline-1 block border border-grey-light w-full p-3 rounded text-gray-400" v-model="batch" >
                            <option value="">Batch*</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <alertForm v-if="batch =='' " :psw="checkPassword(batch)" />
                    </div>
                    <div class="w-full">
                        <select v-model="student_class"  class="outline-1 block border border-grey-light w-full p-3 rounded text-gray-400">
                            <option value="">Class*</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                        <alertForm v-if="student_class =='' " :psw="checkPassword(student_class)"/>
                    </div>
                </div>
            <div class="flex w-8/12 justify-between mt-3" v-if="!showStudentForm">
                    <h1>Gender : </h1>
                    <div class="flex items-center ">
                        <input  id="inline-radio" type="radio" value="male" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" v-model="sex">
                        <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                    </div>
                    <div class="flex items-center ">
                        <input  id="inline-2-radio" type="radio" value="female" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" v-model="sex">
                        <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                    </div>
                    <div class="flex items-center mr-4">
                        <input  checked id="inline-checked-radio" type="radio" value="others" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" v-model="sex">
                        <label for="inline-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Others</label>
                    </div>     
                </div>
                <div class="mt-5 w-full flex justify-evenly item-center">
                        <button  class="bg-gray-500   text-white font-bold py-2 px-4 rounded w-1/4">Cancel</button>
                        <button @click="signUP()" style="background-color: rgba(23, 171, 181, 1);" class="  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4" >Sign Up</button>
                    </div>
                </div>
                </div>  
            </div>
    </teleport>
</template>

<script>
import alertForm from "../alertForm/alert_form";
import axios from 'axios'
export default ({
    components: {
        alertForm,
    },
    data()
    {
        return {
            showStudentForm: false,
            email: ' ',
            first_name: ' ',
            last_name: ' ',
            password: '12345678',
            NGO: ' ',
            batch: ' ',
            province: ' ',
            student_class: ' ',
            sex: 'others',
            validatePSW: 'Password must be at least 8 characters !',
            ifAllfiedInput:false,
        }
    },
    methods: {
        async getImg(event) {
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
                gender: this.sex,
                year: this.batch,
                province: this.province,
                role: 'student',
                // gender:this.gender
            };
            const std = [
                this.email,
                this.first_name,
                this.last_name,
                this.password,
                this.NGO,
                this.student_class,
                this.sex,
                this.batch,
                this.province,
            ]
            this.ifAllfiedInput = std.every(this.checkForm);
            if (this.ifAllfiedInput) {
                axios.post('http://localhost:8000/api/user/', stdList).catch((error) => {
                        console.log(error.response.data);
                })
            } else {
                alert("Please input field first !")
            }
            
        },

        checkForm(txt) {
            return txt.trim() != '';
        },
        checkPassword(psw) {
            if (psw.trim() == '') {
                return 'This field cannot be null !';
            } else if (psw.length < 8) {
                return 'Password must be at least 8 characters'
            }
        },

        checkOutSidePSWField(field) {
             if (field.trim() == '') {
                return 'This field cannot be null !';
            } else if (field.length.trim() != '') {
                 return null;
            }
        },
         validateEmail(email) {
             if (email.search('@') <= 0) {
                return "Email is required !"
            }
        }
       
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
