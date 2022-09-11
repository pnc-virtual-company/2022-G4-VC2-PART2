<template>
    <RightBar v-show="hide"/>
    <Naviation @hiddenRightBar="isHidden"/>
</template>
<script>
import  Naviation from '../components/navigation/NavigationComponent.vue'
import  RightBar from '../components/navigation/RightBarComponent.vue'
export default {
    components: { Naviation, RightBar },
    data(){
        return {
            hide: true,
        }
    },
    methods: {
        isHidden(value){
            this.hide = !value;
            console.log(value);
        }
    }
}
</script>

<style> 
    
</style>