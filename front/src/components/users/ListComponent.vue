<template>
      <!-- component -->
      <div class="overflow-x-auto relative shadow-sm bg-gray-100 sm:rounded-lg mt-2 p-2 z-0" >

        <div class="pb-4">
           <button class="px-4 py-4 bg-green-500 text-white font-extrabold" @click="addUser">
               Create Student+
           </button>
        </div>
        <!-- TABLE LIST USERS -->
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-teal-500  dark:bg-teal-900 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Batcch
                    </th>
                    <th scope="col" class="py-3 px-6">
                       Class
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody >
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" v-for="(item,index) of users" :key="index">
                    <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="../../assets/student.png" alt="Jese image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">Neil Sims</div>
                        </div>  
                    </th>
                    <td class="py-4 px-6">
                        React Developer
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            2022-WEB A
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                    </td>
                </tr>
            
               
            </tbody>
        </table>
     </div>

</template>
<script>
export default {
    emits: ['close'],
    data(){
        return {
            isOpen: false,
            users:[
                {name:'Veang'},
                {name:"hak"},
                {name:"Ni"},
                {nmae:"tim"},
            ]
        }
    },
   methods: {
    addUser(){
        this.isOpen = !this.isOpen;
        this.$emit('close', true);
        // return this.$router.replace({name: "signup"})
    }
   }
}
</script>
<style>
  
</style>