<template>
    <navbar-view/>
    <UpdateTeacher/>
</template>

<script>
    import NavbarView from "./NavbarView.vue"
    import UpdateTeacher from "@/components/teachers/UpdateTeacher.vue"
    export default{
        provide(){
            return {isTeacher:true}
        },
        components:{
            NavbarView,
            UpdateTeacher

        }
    }
</script>