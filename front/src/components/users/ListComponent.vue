<template>
      <!-- component -->
      <div class="overflow-x-auto relative shadow-sm bg-gray-100 sm:rounded-lg mt-2 p-2">

        <div class=" pb-4">
            <div class=" w-fullmt-4 p-2 flex justify-center">
                <input type="text" id="table-search-users" class="p-3 text-md border-rose-900 dark:border-black w-full shadow-sm" placeholder="Search for users">
            </div>
              <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Dropdown button <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
              <!-- Dropdown menu -->
            </div>

        </div>
        
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                          ID
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Position
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-4 w-4">
                        <div class="flex items-center">
                            02
                        </div>
                    </td>
                    <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="../../assets/student.png" alt="Jese image">
                        <div class="pl-3">
                            <div class="text-base font-semibold">Neil Sims</div>
                            <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                        </div>  
                    </th>
                    <td class="py-4 px-6">
                        React Developer
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                    </td>
                </tr>
    
            </tbody>
        </table>
    <!-- </div>
</div> -->



</template>
<script>
export default {
 
}
</script>
<style>
  
</style>