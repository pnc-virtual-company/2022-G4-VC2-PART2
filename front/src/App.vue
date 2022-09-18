<template>
    <section>
      <RightBar v-show ="!isClosed" />
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
      isClosed:false,
    }
  },
  methods:{
    isHidden(value){
      this.isClosed = value
    },
  },
  provide(){
    return {
      openRightBar: this.isClosed
    }
  }
}
</script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
  
  :root {
    --main-color: #004581;   /* Maain Color */
    --main-color-light: #018ABD;  /* Second Color */
    --main-color-active: #b0c9d2;  /* Third Color */
    --main-color-hover: #a4bac1;  /* Third Color */
  
  }
  
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  
  html {
    font-family: 'Roboto', sans-serif;
  }
  
a.router-link-exact-active {
  color: white;
  background: var(--main-color-active);
  border-bottom: 3px solid rgb(212, 206, 206);
}
a:hover {
  color: white;
  background: var(--main-color-hover);
  
}
  </style>
  