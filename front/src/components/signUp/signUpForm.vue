<template>
    <div class=" flex justify-end item-center w-9/12 m-auto z-500">
        <div class="container w-8/12 flex items-center justify-center">
            <div class="bg-gray-300 py-4 px-4 text-black w-full rounded-md shadow-md opacity-100">
                <h1 class="mb-10 underline underline-offset-8 text-3xl text-center" style="color: rgba(23, 171, 181, 1); font-weight: bold;;">{{ object.title }}</h1>
                  <div class="flex gap-2">
                    <div class=" w-full mb-2">
                        <span class="text-gray-500">Last Name</span>
                        <input 
                            v-model="first_name"
                            type="text"
                            class="block border border-grey-light w-full p-2 rounded"
                        />
                            <alertForm v-if='first_name =="" '  :psw="checkOutSidePSWField(first_name)" />
                    </div>
                    <div class="w-full">
                        <span class="text-gray-500">First Name</span>
                        <input  
                            v-model="last_name"
                            type="text"
                            class="block border border-grey-light w-full p-2 rounded "
                        />
                        <alertForm  v-if="last_name =='' " :psw="checkOutSidePSWField(last_name)" />
                    </div>
                </div>

                <div class="flex mb-2 gap-2">
                    <div class=" w-full ">
                        <span class="text-gray-500">Email</span>
                        <input 
                            v-model="email"
                            type="email"
                            class="block border border-grey-light w-full p-2 rounded"
                        />
                            <alertForm  v-if="userEmail !='' " :psw="userEmail"  />
                    </div>
                    <div class="w-full">
                        <span class="text-gray-500">From NGO</span>
                        <input  
                            v-if="!showStudentForm"
                            v-model="NGO"
                            type="text"
                            class="block border border-grey-light w-full p-2 rounded"
                        />
                        <alertForm v-if="NGO =='' " :psw="checkOutSidePSWField(NGO)" required />
                    </div>
                </div>

            <div class="flex mb-2">
                <div class="w-full flex gap-2" >
                    <div class=" w-full " v-if="object.to_do=='create'">
                        <span class="text-gray-500">Passsword</span>
                    <input 
                        v-model="password"
                        type="email"
                        class="block border border-grey-light w-full p-2 rounded"
                    />
                        <alertForm v-if="password.length<8 " :psw="checkPassword(password)" />
                </div>

                <div class="w-full">
                    <span class="text-gray-500">From Province</span>
                    <input  
                        v-if="!showStudentForm"
                        v-model="province"
                        type="email"
                        class="block border border-grey-light w-full p-2 rounded "
                    />
                    <alertForm v-if="province =='' " :psw="checkPassword(province)" />
                </div>
            </div>
            </div>

            <div class="flex gap-2 mb-5" v-if="!showStudentForm">
                <div class="w-full" >
                    <span class="text-gray-500">Batch*</span>
                    <select   class="outline-1 block border border-grey-light w-full p-2 rounded text-gray-400" v-model="batch" >
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                    <alertForm v-if="batch =='' " :psw="checkPassword(batch)" />
                </div>
                <div class="w-full">
                    <span class="text-gray-500">Class*</span>
                    <select v-model="student_class"  class="outline-1 block border border-grey-light w-full p-2 rounded text-gray-400">
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
                <button  class="bg-gray-500   text-white font-bold py-2 px-4 rounded w-1/4" @click="($emit('close', false))">Cancel</button>
                <button @click="UpdateOrCreateUser" style="background-color: rgba(23, 171, 181, 1);" class="  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4" >{{ object.button }}</button>
            </div>
        </div>
        </div>
    </div>
</template>
<script>
import alertForm from "../alertForm/alert_form";
import axios from 'axios';
const Swal = require('sweetalert2')
export default ({
props:['object','data'],
emits:['close'],
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
            ifAllfiedInput: false,
            userEmail: '',
            
        }
    },
    methods: {
        // CREATE OR UPDATE
        UpdateOrCreateUser(){
            if(this.object.to_do == 'create'){ 
            //    YOUR CREATE HERE
                this.signUP();
            }else if(this.object.to_do == 'update'){ 
                // YOUR UPDATE HERE
                this.updateStudent()
            }
        },


        
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
                axios.post('http://localhost:8000/api/user/', stdList).then(() => {
                    this.$emit("create_student",stdList)
                    Swal.fire({
                        icon: 'success',
                        text: 'User Created',
                    })
                }).catch(() => {
                        this.validateEmail()
                })
            } else {
                if (this.email.trim() == '') {  
                    this.validateEmail()
                }
                if (this.first_name.trim() == '') {  
                    this.first_name = ''
                }
                if (this.last_name.trim() == '') {  
                    this.last_name = ''
                }
                if (this.NGO.trim() == '') {  
                    this.NGO = ''
                }
                if (this.batch.trim() == '') {  
                    this.batch = ''
                }
                if (this.province.trim() == '') {  
                    this.province = ''
                }
                if (this.student_class.trim() == '') {  
                    this.student_class = ''
                }
            }
            
        },

        updateStudent() {
            const stdList = {
                email: this.data[0].email,
                first_name:this.data[0].first_name,
                last_name: this.data[0].last_name,
                password: this.data[0].password,
                NGO:  this.data[0].student[0].NGO,
                batch: this.data[0].student[0].year,
                province: this.data[0].student[0].province,
                class: this.data[0].student[0].class,
                gender: this.data[0].gender,
                role: this.data[0].role
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
                axios.put('http://localhost:8000/api/user/', stdList).then(() => {
                    this.$emit("update_student",stdList)
                    Swal.fire({
                        icon: 'success',
                        text: 'User Created',
                    })
                }).catch((err) => {
                    console.log(err);
                        this.validateEmail()
                })
            } else {
                if (this.email.trim() == '') {  
                    this.validateEmail()
                }
                if (this.first_name.trim() == '') {  
                    this.first_name = ''
                }
                if (this.last_name.trim() == '') {  
                    this.last_name = ''
                }
                if (this.NGO.trim() == '') {  
                    this.NGO = ''
                }
                if (this.batch.trim() == '') {  
                    this.batch = ''
                }
                if (this.province.trim() == '') {  
                    this.province = ''
                }
                if (this.student_class.trim() == '') {  
                    this.student_class = ''
                }
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
         validateEmail() {
             if (this.email.trim() == '') {
                 this.userEmail = 'Email is required !';
            } else {
                 this.userEmail = 'Your email is wrong format !';
             }
             return this.userEmail;
             
        }
       
         }
})
</script>
