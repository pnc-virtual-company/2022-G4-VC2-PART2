<template>
  <div class="w-full px-2 m-auto h-screen fixed top-20 right-0 flex justify-end">
      <div class=" px-2"  :class="width && entandWidth?width:'w-9/12'">
          I live in cambodia
      </div>
  </div>

</template>
<script>
export default {
  components:{
 
  },
  props: ['entandWidth'],
  data(){
      return {
      width: 'w-full',
      openDialog:false,
      }
  },
  methods: {
      getDialog(value){
          this.openDialog = value 
      }
  }
}
</script>
<style>
  
</style>

