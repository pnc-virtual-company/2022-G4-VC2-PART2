<template>
    <navbar-view/>
    <CardUserForm/>
</template>

<script>
// import signUp from './components/signUp/signUpForm.vue'
import NavbarView from './views/NavbarView.vue'
import CardUserForm from '@/views/CardUser/CardUserForm.vue';
export default {
    components: {
    // signUp
    NavbarView,
    CardUserForm
}
}
</script>


<style>
  
</style>
