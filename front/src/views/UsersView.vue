<template>
    <div class="w-full px-2 m-auto h-screen fixed top-28 right-0 flex justify-end">
        <div class=" px-2"  :class="width && entandWidth?width:'w-9/12'">
            <Users @close="getDialog" />
        </div>
    </div>

    <template>
        <RegisterForm v-if="openDialog" />
    </template>

</template>
<script>
import Users from '@/components/users/ListComponent.vue'
import RegisterForm from '@/components/signUp/signUpForm.vue'
export default {
    components:{
        Users, RegisterForm
    },
    props: ['entandWidth'],
    data(){
        return {
        width: 'w-full',
        openDialog:false,
        }
    },
    methods: {
        getDialog(value){
            this.openDialog = value 
        }
    }
}
</script>
<style>
    
</style>

