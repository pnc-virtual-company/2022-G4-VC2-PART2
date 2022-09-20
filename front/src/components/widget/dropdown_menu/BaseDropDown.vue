<template>
    <select id="countries" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block  w-[160px] mx-2 p-1.5 dark:bg-gray-600  dark:placeholder-gray-400 dark:text-white ">
        <option selected="" disabled>{{ title }}</option>
        <option :value="item" v-for="item of  lists" :key="item">{{ item }}</option>
    </select>
  </template>
  <script>
  export default{
    props:['lists','title'],
      data(){
          return {
          }
      }
  }
  </script>
  


