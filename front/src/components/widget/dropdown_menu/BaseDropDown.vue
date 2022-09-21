<template>
    <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-[160px]  p-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
        <option selected="" disabled>{{ title }}</option>
        <option :value="item" v-for="item of  lists" :key="item">{{ item }}</option>
    </select>
  </template>
  <script>
  export default{
    props:['lists','title'],
      data(){
        return {
              value:''
          }
  },
  watch: {
    value() {
      this.$emit('value', this.value);
    }
      }
  }
  </script>
  


