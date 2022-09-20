<template>
    <section>
      <NavBar/> 
      <router-view/>
    </section>
  
</template>
<script>
import NavBar from '@/components/navigation/NavigationComponent.vue'
export default {
  components: {NavBar },
  data(){
    return {
    }
  },
  methods:{
  },
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
    font-family: sans-serif;
  }
  
a.router-link-exact-active {
  color: white;
  border-bottom: 3px solid orange;
}
a:hover {
  color: white;
  background: var(--main-color-hover);
}
  </style>
  