<template>
    <teachers-list-view/>
    <StudentsListViewVue/>
</template>

<script>
import StudentsListViewVue from './views/coordinators/StudentsListView.vue';
import TeachersListView from './views/coordinators/TeachersListView.vue'
export default {
    components: {
        TeachersListView,
        StudentsListViewVue
    }
}
</script>


<style>
  
</style>
