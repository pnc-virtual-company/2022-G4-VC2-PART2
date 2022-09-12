<template>
    <navbar-view/>
    <UpdateStudent/>
</template>

<script>
    import NavbarView from "./NavbarView.vue"
    import UpdateStudent from '@/components/students/UpdataStudent.vue'
    export default{
        provide(){
            return {isStudent:true}
        },
        components:{
            NavbarView,
            UpdateStudent
        }
    }
</script>