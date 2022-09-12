<template>
  <navbar-view />
  <TestCuser/>
</template>

<script>
import NavbarView from "./NavbarView.vue";
import TestCuser from "@/components/CardUser/TestCuser.vue";
export default {
  provide() {
    return { isTeacher: true };
  },
  components: {
    NavbarView,
    TestCuser
},
};
</script>