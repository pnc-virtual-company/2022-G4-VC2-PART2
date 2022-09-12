<template>
    <navbar-view/>
</template>

<script>
    import NavbarView from "./NavbarView.vue"
    export default{
        provide(){
            return {isStudent:true}
        },
        components:{
            NavbarView
        }
    }
</script>