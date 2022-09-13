<template>
  <navbar-view />
  <TestCuser/>
  <updateTeacher/>
</template>

<script>
import NavbarView from "./NavbarView.vue";
import TestCuser from "@/components/CardUser/TestCuser.vue";
import updateTeacher from "@/components/teachers/UpdateTeacher.vue"
export default {
  provide() {
    return { isTeacher: true };
  },
  components: {
    NavbarView,
    TestCuser,
    updateTeacher
},
};
</script>