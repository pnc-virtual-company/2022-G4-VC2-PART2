<template>
  <div class="w-full px-2 m-auto h-screen fixed top-28 right-0 flex justify-end">
      <div class=" px-2"  :class="width && entandWidth?width:'w-9/12'">
          <Users />
          <Navbar/>
      </div>
  </div>
</template>
<script>
import Users from '@/components/widget/userList/ListComponent.vue'
import Navbar from './CoorNavigationView.vue'
export default {
  components:{
      Users,
      Navbar
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

