<template>
  <section>
    <CoorNavbar v-if="isLogin" @loginSuccess="isLogin=true"/>
    <router-view></router-view>
  </section>
</template>
<script>

import CoorNavbar from './views/coordinators/CoorNavigationView.vue'


export default {
  components:{
    CoorNavbar,
  },
  data(){
    return {
      isClosed:false,
      isLogin: false,
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
}
a:hover {
  color: white;
  background: var(--main-color-hover);
}
  </style>
  