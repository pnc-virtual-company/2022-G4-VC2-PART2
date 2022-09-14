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
    --main-color-active: #abdff2;  /* Third Color */
  
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
a.router-link-exact-active {
  color: white;
  background: var(--main-color-active);
}
a.router-link-exact-active:hover {
  color: white;
  background: var(--main-color-active);
}
  </style>