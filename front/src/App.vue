<template>
    <section>
      <RightBar v-show ="!isClosed" @dataStanding="groupOfBoolean" />
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
      groupBoolean:{},
    }
  },
  methods:{
    isHidden(value){
        this.isClosed = value
    },
    groupOfBoolean(group){
        this.groupBoolean = group
        localStorage.setItem('group', this.groupBoolean)
        // console.log(localStorage.getItem("group"))
        console.log(this.groupBoolean)
    }
  },

}
</script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
  
  :root {
    --main-color: #004581;
    --main-color-light: #018ABD;
    --main-color-active: #abdff2;
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