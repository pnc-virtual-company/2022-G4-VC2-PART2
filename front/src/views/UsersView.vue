<template>
    <div class="w-full px-2 m-auto h-screen fixed top-20 right-0 flex justify-end">
        <div class=" px-2"  :class="width && entandWidth?width:'w-9/12'">
            <UserTemplates :titile="title"/>
        </div>
    </div>
</template>
<script>
import UserTemplates from '@/components/users/ListComponent.vue'
export default {
    components:{
        UserTemplates
    },
    props: ['entandWidth'],
    data(){
        return {
        width: 'w-full',
        openDialog:false,
        // OBJECT:{title:'I am in Students page',type:'student'}
        }
    },
    methods: {
        getDialog(value){
            this.openDialog = value 
        }
    }
}
</script>

