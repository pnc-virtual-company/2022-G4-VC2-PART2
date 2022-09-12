<template>
    <navbar-view/>
    <CardUserForm/>

</template>

<script>
    import NavbarView from "./NavbarView.vue"
import CardUserForm from "./CardUser/CardUserForm.vue";
    export default{
        provide(){
            return {isTeacher:true}
        },
        components:{
    NavbarView,
    CardUserForm
}
    }
</script>