<!-- <template>
<div class="bg-grey-lighter flex justify-center item-center w-8/12 m-auto mt-10">
            <div class="container w-9/12 flex items-center justify-center px-2 rounded shadow-md">
                <div class="bg-white px-6 py-8 text-black w-full" >
                    <h1 class="mb-10 underline underline-offset-8 text-3xl text-center" style="color: rgba(23, 171, 181, 1);">Updata Teacher</h1>
                    <div class="flex gap-2">
                        <input 
                            type="text" v-model="first_name"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="First Name" />
                           
                        <input 
                            type="text" v-model="last_name"
                            class="block border border-grey-light w-full p-3 rounded mb-4"                   
                            placeholder="Last Name" />
                    </div>
                    <div class="flex gap-2">
                        <input 
                            type="text" v-model="email"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="Email" />
    
                    </div>
                
                   <div class="flex w-8/12 justify-between">
                        <h1>Gender : </h1>
                        <div class="flex items-center ">
                            <input id="inline-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                        </div>
                        <div class="flex items-center ">
                            <input id="inline-2-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                        </div>
                      </div>
                      <div> <button style="background-color: rgba(23, 171, 181, 1);" class="  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4" >Edit</button></div>
            </div>
        </div>
        </div>
</template>

<script>
import axios from 'axios';
export default {
  props:{
    teachers: Array
  },
  data(){
    return{
      first_name:'',
      last_name:'',
      gender:'',
      email:'',
      url:'http://127.0.0.1:8000/api/getUserBy/teacher',
      teacher:[]
    }
  },
  methods:{
    getTeacher(){
      axios.get('http://127.0.0.1:8000/api/getTeacherBy/' + 1).then((res)=>{
        this.teacher.push (res.data)
      })
      console.log(this.teacher);
    },
    onUpdata(){
      this.first_name = this.teachers.first_name,
      this.last_name = this.teachers.last_name,
      this.gender = this.teachers.gender,
      this.email = this.teachers.email
    },

    updataTeacher(){
      let teacherObject ={
        first_name: this.first_name,
        last_name: this.last_name,
        gender: this.gender,
        email: this.email,

      };
      axios.post('http://127.0.0.1:8000/api/getTeacherBy/' + 1, teacherObject).then((res)=>{
        console.log(res.data);
      })
    }
  },
  computed:{
    // showTeacher(){
    //   return this.getTeacher();
    // }
  },
  mounted(){
    this.getTeacher()
  }
}
</script>

<style>

</style> -->
