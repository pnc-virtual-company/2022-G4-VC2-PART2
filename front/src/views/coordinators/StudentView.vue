<template>
  <div class="w-full px-2 m-auto h-screen fixed top-28 right-0 flex justify-end">
      <div class=" px-2"  :class="width && entandWidth?width:'w-9/12'">
          <Users />
      </div>
  </div>

</template>
<script>
import Users from '@/components/coordinators/ListComponent.vue'
export default {
  components:{
      Users
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

