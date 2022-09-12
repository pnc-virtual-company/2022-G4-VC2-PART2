<template>
    <navbar-view/>
</template>

<script>
    import NavbarView from "./NavbarView.vue"
    export default{
        provide(){
            return {isTeacher:true}
        },
        components:{
            NavbarView
        }
    }
</script>