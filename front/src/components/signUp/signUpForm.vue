<template>
    <!-- component -->
<div class="bg-grey-lighter flex justify-center item-center w-8/12 m-auto mt-10">
            <div class="container w-9/12 flex items-center justify-center px-2 rounded shadow-md">
                <div class="bg-white px-6 py-8 text-black w-full" >
                    <h1 class="mb-10 underline underline-offset-8 text-3xl text-center" style="color: rgba(23, 171, 181, 1);">Register Student</h1>
                    <div class="flex gap-2">
                        <input 
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="First Name" />
    
                        <input 
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"                   
                            placeholder="Last Name" />
                    </div>

                    <div class="flex gap-2">
                        <input 
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="Email" />
    
                        <input 
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="Password" />
                    </div>
                    <div class="flex gap-2">
                        <input 
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            placeholder="From NGO" />
    
                        <input 
                            type="text"
                            class="block border border-grey-light w-full p-3 rounded mb-4"
                            name="email"
                            placeholder="Email" />
                    </div>
                    <div class="flex gap-2" >
                        <select name="batch" class="outline-1 block border border-grey-light w-full p-3 rounded mb-4 text-gray-400">
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select>
                        <select name="gender"  class="outline-1 block border border-grey-light w-full p-3 rounded mb-4 text-gray-400">
                            <option value="Male"><li class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Male</li></option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                   <div class="flex w-8/12 justify-between">
                        <h1>Gender : </h1>
                        <div class="flex items-center ">
                            <input id="inline-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inline 1</label>
                        </div>
                        <div class="flex items-center ">
                            <input id="inline-2-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inline 2</label>
                        </div>
                        <div class="flex items-center mr-4">
                            <input checked id="inline-checked-radio" type="radio" value="" name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="inline-checked-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Inline checked</label>
                        </div>
                    </div>

                    <div class="mt-5 w-full flex justify-center item-center">
                            <button class="bg-blue-500  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-1/4">Sign Up</button>
                        </div>
                </div>
            </div>
        </div>
</template>

<script>
export default ({
    data()
    {
        return {
            showDropdown:false,
        }
    }
})
</script>
