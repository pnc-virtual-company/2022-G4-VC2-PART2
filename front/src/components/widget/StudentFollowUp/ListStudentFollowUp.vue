<template>
  <div class="py-2">
    <router-link to="/profiles" class="flex flex-row px-0.5 py-1 justify-start items-center border-b-2 bg-gray-300" v-for="item of listStudents" :key="item">
      <div class="w-14 h-14  flex justify-center items-center">
        <img :src="item.user.img" class="object-cover h-12 w-12 rounded-full" alt=""/>
      </div>
      <div class="">
        <div class="text-sm uppercase font-semibold">{{ item.user.first_name}} {{ item.user.last_name}}</div>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  props:['listStudents']
};
</script>