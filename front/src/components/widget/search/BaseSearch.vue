<template>
  <div class="w-full flex items-center justify-center border border-b-black border-t-white relative">
    <input x-on:click="open = !open" type="search" @keyup="onPressEnter" v-model="inputValue"  placeholder="Search Here..." class="py-3 px-3 w-full rounded font-thin focus:outline-none duration-100">
 </div>
</template>
<script>
export default {
  emits:['emit_search'],
  data(){
    return {
      data(){
        return {
            inputValue:''
        }
      }
    }
  },
  methods:{
    onPressEnter(){ 
      this.$emit('emit_search', this.inputValue)
    }
  }
};
</script>