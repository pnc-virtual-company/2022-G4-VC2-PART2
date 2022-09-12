
 <template>
    <!-- component -->
<div class="bg-grey-lighter flex justify-center item-center w-8/12 m-auto mt-10">
            <div class="container w-9/12 flex items-center justify-center px-2 rounded shadow-md">
                <div class="bg-white px-6 py-8 text-black w-full" >
                    <h1 class="mb-10 underline underline-offset-8 text-3xl text-center" style="color: rgba(23, 171, 181, 1);">Register Student</h1>
                    <div class="flex gap-2">
                        <input 
                            type="text"
                            v-model="first_name"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="First Name" />
    
                        <input 
                            type="text"
                            v-model="last_name"
                            class="block border border-grey-light w-full p-3 rounded mb-4"                   
                            placeholder="Last Name" />
                    </div>
                    <div class="flex gap-2">
                        <input 
                            type="text" 
                            v-model="email"
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
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="Password" />
    
                        <input v-if="!showStudentForm"
                            v-model="province"
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            name="email"
                            placeholder="Province" />
                    </div>
                    <div class="flex gap-2" v-if="!showStudentForm">
                        <select name="batch" class="outline-1 block border border-grey-light w-full p-3 rounded mb-4 text-gray-400" v-model="batch">
                            <option value="">Batch</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <select v-model="student_class" name="gender"  class="outline-1 block border border-grey-light w-full p-3 rounded mb-4 text-gray-400" >
                            <option value="">Class</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div>
                   <div class="flex w-8/12 justify-between" v-if="!showStudentForm">
                        <h1>Gender : </h1>
                        <div class="flex items-center ">
                            <input id="inline-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                        </div>
                        <div class="flex items-center ">
                            <input id="inline-2-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input checked id="inline-checked-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Others</label>
                        </div>
                    </div>
                    <div class="mt-5 w-full flex justify-evenly item-center">
                            <button  class="bg-gray-500   text-white font-bold py-2 px-4 rounded w-1/4">Cancel</button>
                            <button style="background-color: rgba(23, 171, 181, 1);" class="  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4" >Edit</button>
                        </div>
                </div>
            </div>
        </div>
</template>

<script>
import axios from "axios"

export default ({
    props:{
    studens: Array
  },
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
            gender:''            
        }
    },
    methods: {
        getStudent(){
            axios.get('http://127.0.0.1:8000/api/student/1').then((res)=>{
                const studentData = res.data[0].student
                console.log(studentData);
                this.NGO = studentData[0].NGO;
                this.province= studentData[0].province;
                this.student_class = studentData[0].student_class;
               
            })
        },
        pageUpdata(){

        }
    },
    mounted(){
        this.getStudent()
    }
})
</script>





<style>

</style>