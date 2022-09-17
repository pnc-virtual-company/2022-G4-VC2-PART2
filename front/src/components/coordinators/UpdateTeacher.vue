
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
                    </div>
                    <div class="flex w-8/12 justify-between" >
                         <h1>Gender : </h1>
                         <div class="flex items-center">
                             <input id="inline-radio" type="radio" value="M" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" v-model="gender">
                             <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                             <input id="inline-2-radio" type="radio" value="F" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" v-model="gender">
                             <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                             <input checked id="inline-checked-radio" type="radio" value="Other" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" v-model="gender">
                             <label for="inline-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Others</label>
                         </div>
                         <!-- <div class="flex items-center " >
                         </div> -->
                     </div>
                     <div class="mt-5 w-full flex justify-evenly item-center">
                             <button  class="bg-gray-500   text-white font-bold py-2 px-4 rounded w-1/4">Cancel</button>
                             <button @click="updateTeacher" style="background-color: rgba(23, 171, 181, 1);" class="  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4" >Edit</button>
                         </div>
                </div>
            </div>
                    </div>
</template>

<script>
import axios from "axios"


export default ({

    data()
    {
        return {
            email: '',
            first_name: '',
            last_name: '',
            password: '',
            gender: '',
            img:'',      
        }
    },
    methods: {
        getTeacher(){
            axios.get('http://127.0.0.1:8000/api/user/2').then((res)=>{
                this.first_name = (res.data[0].first_name)
                this.last_name = (res.data[0].last_name)
                this.gender = (res.data[0].gender)
                this.email = (res.data[0].email)
            })
        },
        pageUpdata(){

        },
        updateTeacher(){
            const teacherList = {
                email: this.email,
                first_name: this.first_name,
                last_name: this.last_name,             
                gender: this.gender,
                role:'teacher'
                // img: this.img.name,
            };
            axios.put('http://127.0.0.1:8000/api/user/2', teacherList).then(() => {
                this.getTeacher()
            })
        },
     
    },
    mounted(){
        this.getTeacher();
    }
})
</script>
<style>

</style>