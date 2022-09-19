<template>
<div class="w-full mt-28 m-aut flex justify-center px-4">
    <div class="w-11/12">
        <div class=" bg-gray-50 flex flex-col items-center justify-center relative sm:py-12">
            <input x-on:click="open = !open" type="search" x-model="search" placeholder="Search Here..." class="py-3 px-3 w-full rounded shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100">
            <ul x-show="open" x-on:click.outside="open = !open"  x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate"
                    x-transition:enter-end="opacity-100 translate"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 translate"
                    x-transition:leave-end="opacity-0 translate"  class="w-1/2">
                    <template x-for="item in filteredItems" >
                        <li class="w-full text-gray-700 p-4 mt-2 bg-white" x-text="item"></li>
                    </template>
             </ul> 
        </div>
    </div>
</div>
</template>
<script>
export default {
    
}
</script>
<style lang="">
    
</style>