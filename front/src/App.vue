<template>
    <section>
      <RightBar v-show ="!isClosed"/>
    <NavBar @emits-nav="isHidden"/> 
    </section>
  <router-view />
</template>
<script>
import RightBar from '@/components/navigation/RightBarComponent.vue'
import NavBar from '@/components/navigation/NavigationComponent.vue'
export default {
  components: {RightBar, NavBar },
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
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
  
  :root {
    --main-color: #750579;
    --main-color-light: #e21ee9;
  }
  
  * {
    box-sizing: border-box;
  }
  
  html {
    font-family: 'Roboto', sans-serif;
  }
  
  body {
    margin: 0;
  }
  
  .right-main-button {
    float: right;
    margin-right: 2rem;
  }
  </style>