<template>
  <div class=" border g-gray-50 flex flex-col items-center justify-center relative my-2">
    <input  x-on:click="open = !open" type="search"  placeholder="Search Here..." class="py-3 px-3 w-full rounded shadow font-thin focus:outline-none focus:shadow-lg focus:shadow-slate-200 duration-100 shadow-gray-100">
 </div>
</template>
<script>
export default {
  data(){
    return {
    }
  }
};
</script>