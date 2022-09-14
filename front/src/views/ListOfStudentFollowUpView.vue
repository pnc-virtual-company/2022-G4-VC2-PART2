<template>
  <div class="w-full px-2 m-auto h-screen fixed top-20 right-0 flex justify-end">
      <div class=" px-2"  :class="width && entandWidth?width:'w-9/12'">
          <Teachercomponent />
      </div>
  </div>

</template>
<script>
import Teachercomponent from '@/components/users/ListComponent.vue'
export default {
  components:{
    Teachercomponent
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

