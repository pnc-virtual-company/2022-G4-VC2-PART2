<template>
    <div class="w-full px-2 m-auto h-screen fixed top-28 right-0 flex justify-end">
        <div class=" px-4"  :class="width && entandWidth?width:'w-5/6'">
            <Users />
        </div>
    </div>
</template>
<script>
import Users from '@/components/users/ListComponent.vue'
export default {
    components:{
        Users
    },
    props: ['entandWidth'],
    data(){
        return {
        width: 'w-full',
        }
    }
}
</script>
<style>
    
</style>

