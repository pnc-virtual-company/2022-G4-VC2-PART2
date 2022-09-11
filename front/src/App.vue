<template>
  <NavbarView />
  <router-view />
</template>
<script>
  import  NavbarView from "@/views/NavbarView.vue"
export default {
  components:{ NavbarView }
}
</script>
<style>
  *{
    margin: 0;
    padding: 0;
  }
</style>