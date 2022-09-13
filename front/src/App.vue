<template>
    <RightBar v-show ="!isClosed"/>
    <NavBar @emits-nav="isHidden"/>

    <!-- <UsersView :entandWidth ="isClosed"/> -->
  <router-view />
</template>
<script>
// import UsersView  from '@/views/UsersView.vue';
import RightBar from '@/components/navigation/RightBarComponent.vue'
import NavBar from '@/components/navigation/NavigationComponent.vue'
export default {
  components: { RightBar, NavBar },
  data(){
    return {
        isClosed:false
    }
  },
  methods:{
    isHidden(value){
        this.isClosed = value
      }
  },

}
</script>
<style>
  *{
    margin: 0;
    padding: 0;
  }
</style>