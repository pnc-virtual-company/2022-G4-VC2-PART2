<template>
    <select @change="onChange" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2  w-[120px] mx-2 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected="" disabled class="text-gray-50">{{ title }}</option>
        <option :value="item" v-for="item of  lists" :key="item" class="p-2">{{ item }}</option>
    </select>
  </template>
  <script>
  export default{
    props:['lists','title'],
    emits:['emtt_selecte'],
    data(){
      return { key: '' }
    },
    methods:{
      onChange(event) {
      this.$emit('emtt_selecte', event.target.value)
    },
    }
  }

</script>