<template>
    <div class=" flex justify-end item-center w-9/12 m-auto z-500">
        <div class="container w-8/12 flex items-center justify-center">
            <div class="bg-white py-4 px-4 text-black w-full rounded-md shadow-md opacity-100">
                <h1 class="mb-10 underline underline-offset-8 text-3xl text-center" style="color: rgba(23, 171, 181, 1); font-weight: bold;;">{{ object.title }}</h1>
                  <div class="flex gap-2">
                    <div class=" w-full mb-2">
                        <span class="text-gray-500">Last Name</span>
                        <input 
                            v-model="first_name"
                            type="text"
                            class="block border w-full p-2 rounded border-cyan-500 bg-transparent "
                            placeholder="Enter first name"
                        />
                            <alertForm v-if='first_name =="" '  :psw="checkOutSidePSWField(first_name)" />
                    </div>
                    <div class="w-full">
                        <span class="text-gray-500">First Name</span>
                        <input  
                            v-model="last_name"
                            type="text"
                            class="block border border-grey-light w-full p-2 rounded border-cyan-500 bg-transparent"
                            placeholder="Enter last name"
                        />
                        <alertForm  v-if="last_name =='' " :psw="checkOutSidePSWField(last_name)" />
                    </div>
                </div>

                <div class="flex mb-2 gap-2">
                    <div class=" w-full ">
                        <span class=" after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">Email</span>
                        <input 
                            v-model="email"
                            type="email"
                            class="block border border-grey-light w-full p-2 rounded border-cyan-500 bg-transparent"
                            placeholder=""
                        />
                            <alertForm  v-if="userEmail !='' " :psw="userEmail"  />
                    </div>
                    

                    <div class="w-full" v-if="object.role != 'teacher'">
                        <span class="text-gray-500">From NGO</span>
                        <input  
                            v-if="!showStudentForm"
                            v-model="NGO"
                            type="text"
                            class="block border border-grey-light w-full p-2 rounded border-cyan-500 bg-transparent"
                            
                        />
                        <alertForm v-if="NGO =='' " :psw="checkOutSidePSWField(NGO)" required />
                    </div>

                </div>

            <div class="flex mb-2">
                <div class="w-full flex gap-2" v-if="object.to_do == 'create'">
                    <div class=" w-full ">
                        <span class="text-gray-500">Passsword</span>
                    <input 
                        v-model="password"
                        type="email"
                        class="block border border-grey-light w-full p-2 rounded border-cyan-500 bg-transparent"
                    />
                        <alertForm v-if="password.length<8 " :psw="checkPassword(password)" />
                </div>

                <div class="w-full" v-if="object.role != 'teacher'">
                    <span class="text-gray-500">From Province</span>
                    <input  
                        v-if="!showStudentForm"
                        v-model="province"
                        type="text"
                        class="block border border-grey-light w-full p-2 rounded border-cyan-500 bg-transparent"
                    />
                    <alertForm v-if="province =='' " :psw="checkPassword(province)" />
                </div>
            </div>
            </div>

            <div class="flex gap-2 mb-5" v-if="object.role != 'teacher'">
                <div class="w-full" >
                    <span class="text-gray-500">Batch*</span>
                    <select v-if="!showAddNewBatch"   class="outline-1 block border border-grey-light w-full p-2 rounded text-gray-400 border-cyan-500 bg-transparent" v-model="batch" >
                        <option :value="batch.batch" v-for="batch of allBatch" :key="batch">{{batch.batch}}</option>
                    </select>
                     <input  
                        v-if="showAddNewBatch"
                        v-model="batch"
                        type="number"
                        class="block border border-grey-light w-full p-2 rounded border-cyan-500 bg-transparent"
                    />
                    <alertForm v-if="batch =='' " :psw="checkPassword(batch)" />
                    <span  @click="showAddNewBatch = true" class="text-blue-500 cursor-pointer underline underline-offset-2 hover:text-blue-700">Create new batch !</span>
                </div>
                <div class="w-full">
                    <span class="text-gray-500">Class*</span>
                    <select v-model="student_class"  class="outline-1 block border border-grey-light w-full p-2 rounded text-gray-400 border-cyan-500 bg-transparent">
                        <option value="WEB-A">A</option>
                        <option value="WEB-B">B</option>
                    </select>
                    <alertForm v-if="student_class =='' " :psw="checkPassword(student_class)"/>
                </div>
            </div>

        <div class="flex w-8/12 justify-between mt-3">
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
            <!-- Base_Button -->
           <section class="flex justify-between w-full pt-2">
                <Base_Button @click="($emit('close', false))" class="  bg-slate-300 border-teal-900 text-black ">Cancel</Base_Button>
                <Base_Button @click="UpdateOrCreateUser" class="bg-cyan-500 hover:bg-cyan-600">{{ object.button }}</Base_Button> 
           </section>
        </div>
        </div>
        <!-- </div> -->
    </div>
</template>
<script>
import Base_Button from '../button/BaseButton.vue';
import alertForm from '../alertValidation/alert_form.vue';
// import axios from 'axios';
import axios from '@/api/api'
const Swal = require('sweetalert2')
export default ({
props:['object', 'updateValue'],
emits:['close'],
    components: {
        alertForm,
        Base_Button,
    },
    data()
    {
        return {
            showAddNewBatch:false,
            dataToUpdate:[],
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
            role: 'student',
        }
    },
    methods: {
        
        toggleShow() {
        this.showPassword = !this.showPassword;
        },
        // CREATE OR UPDATE
        UpdateOrCreateUser(){
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
                role: this.role,
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
            ];
             const stdUpdate = [
                this.email,
                this.first_name,
                this.last_name,
                this.NGO,
                this.student_class,
                this.sex,
                this.batch,
            ];
            const teacher = [
                this.email,
                this.first_name,
                this.last_name,
                this.password,
                this.sex,
            ]
            if(this.object.to_do == 'create'){ 
                     //    YOUR CREATE HERE
                if(this.object.role == 'teacher'){
                    this.role = 'teacher';
                    this.ifAllfiedInput = teacher.every(function(element){
                        return element.trim() != '';
                    });
                     this.signUP()
                }else if(this.object.role=='student'){
                    this.role = 'student'
                      this.ifAllfiedInput = stdUpdate.every(function(element){
                        return element != ' ';
                      });
                     this.signUP()
                }
    
            }else { 
                // YOUR UPDATE HERE
                if (this.object.role == 'teacher') {
                     this.ifAllfiedInput = teacher.every(function(element){
                        return element != ' ';
                    });
                    stdList.role = 'teacher';
                     this.signUP()
                }else if(this.object.role=='student'){
                     this.ifAllfiedInput = std.every(function(element){
                        return element != ' ';
                    });
                     this.signUP() 
                }
            }
        },
        async getImg(event) {
            this.img = event.target.files[0];
            console.log(this.img.name)
        },
        
        // Create user Account
        signUP() {
            const stdList = {
                if_follow_up:'No',
                email: this.email,
                first_name: this.first_name,
                last_name: this.last_name,
                password: this.password,
                NGO: this.NGO,
                class: this.student_class,
                gender: this.sex,
                year: this.batch,
                batch: this.batch,
                province: this.province,
                role: this.role,
                // gender:this.gender
            };
            const addList = {
                email: this.email,
                first_name: this.first_name,
                last_name: this.last_name,
                password: this.password,
                NGO: this.NGO,
                class: this.student_class,
                gender:this.sex,
                year: this.batch,
                batch: this.batch,
                province: this.province,
                role: this.role,
            }
            if (this.ifAllfiedInput) { 
                console.log(this.object);
                if (this.object.to_do == 'update') {
                    axios.put('user/'+this.object.id, stdList).then(() => {
                    this.$emit('close', false)
                    Swal.fire({
                        icon: 'success',
                        text: 'User Updated',
                      
                    })
                }).catch((err) => {
                    console.log(err)
                        this.validateEmail()
                })
                } else {  
                        axios.post('user/', addList).then(() => {
                            this.$emit('close', false)
                            Swal.fire({
                                icon: 'success',
                                text: 'User Added',
                                
                            })

                        }).catch((err) => {
                            console.log(err);
                                this.validateEmail()
                        })
                }
            } else {
                if (this.email.trim() == '') {  
                    this.validateEmail()
                }
                if (this.first_name.trim() == '' ) {  
                    this.first_name = ''
                    // this.first_name.trim() == '' ? "is greater" : "is less than";
                }
                if (this.last_name.trim() == '') {  
                    this.last_name = ''
                }
                if (this.NGO.trim() == '') {  
                    this.NGO = ''
                }
                if (this.batch.trim() == '' ) {  
                    this.batch == '';
                }
                if (typeof(this.province) != 'undefined') {  
                     this.province == '' ;
                }
                if (typeof(this.student_class) != 'undefined') {  
                   this.student_class == '' ;
                }
            }
            
        },

        // updateStudent() {
        //     const stdList = {
        //         email: this.updateValue.email,
        //         first_name:this.updateValue.first_name,
        //         last_name: this.updateValue.last_name,
        //         password: this.updateValue.password,
        //         NGO:  this.updateValue.student[0].NGO,
        //         batch: this.updateValue.student[0].year,
        //         province: this.updateValue.student[0].province,
        //         class: this.updateValue.student[0].class,
        //         gender: this.updateValue.gender,
        //         role: this.updateValue.role
        //     };
        //     console.log(stdList);
        //     const std = [
        //         this.email,
        //         this.first_name,
        //         this.last_name,
        //         this.password,
        //         this.NGO,
        //         this.student_class,
        //         this.sex,
        //         this.batch,
        //         this.province,
        //     ]
        //     this.ifAllfiedInput = std.every(this.checkForm);
        //     if (this.ifAllfiedInput) {
        //         axios.put('http://localhost:8000/api/user/', stdList).then(() => {
        //             this.$emit("update_student",stdList)
        //             Swal.fire({
        //                 icon: 'success',
        //                 text: 'User Created',
        //             })
        //         }).catch((err) => {
        //             console.log(err);
        //                 this.validateEmail()
        //         })
        //     } else {
        //         if (this.email.trim() == '') {  
        //             this.validateEmail()
        //         }
        //         if (this.first_name.trim() == '') {  
        //             this.first_name = ''
        //         }
        //         if (this.last_name.trim() == '') {  
        //             this.last_name = ''
        //         }
        //         if (this.NGO.trim() == '') {  
        //             this.NGO = ''
        //         }
        //         if (this.batch.trim() == '') {  
        //             this.batch = ''
        //         }
        //         if (this.province.trim() == '' || this.province == undefined) {  
        //             this.province = ''
        //         }
        //         if (this.student_class.trim() == '') {  
        //             this.student_class = ''
        //         }
        //     }
            
        // },

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
                 this.userEmail = 'Wrong format email !';
             }
             return this.userEmail;
             
        },
        created(){
            if(this.object.to_do == 'update' && this.object.role == 'student'){
                this.email= this.updateValue.email,
                this.first_name= this.updateValue.first_name,
                this.last_name= this.updateValue.last_name,
                this.password = this.updateValue.password,   
                this.NGO= this.updateValue.student[0].NGO,
                this.class= this.updateValue.student[0].student_class,
                this.gender= this.updateValue.sex,
                this.year= this.updateValue.batch,
                this.province= this.updateValue.province,
                this.role= this.updateValue.role
            } if(this.object.to_do == 'update' && this.object.role == 'teacher') {
                this.email= this.updateValue.email,
                this.first_name= this.updateValue.first_name,
                this.last_name= this.updateValue.last_name,
                this.password = this.updateValue.password,   
                this.gender= this.updateValue.sex,
                this.year= this.updateValue.batch,
                this.province= this.updateValue.province,
                this.role= this.updateValue.role
            }
        // console.log(this.updateValue)
        }
    },
    mounted() {
        axios.get('batch').then((res) => {
            this.allBatch = res.data
            if (this.allBatch == '') {
                this.showAddNewBatch = true
            }
            console.log(res.data);
        })
        axios.get('user/' + this.object.id).then((res) => {
            this.dataToUpdate = res.data
            // this.showOldData()
        })
        this.created()
    },
    
})
</script>