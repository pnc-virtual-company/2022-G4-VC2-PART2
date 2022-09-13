<template>
  <navbar-view />
  <CardUserForm />
  <!-- <UpdataStudent/> -->
</template>

<script>
import NavbarView from "./NavbarView.vue";
import CardUserForm from "./CardUser/CardUserForm.vue";
// import UpdataStudent from "@/components/students/UpdataStudent.vue";
export default {
  provide() {
    return { isStudent: true };
  },
  inject:['isTrue'],
  components: { NavbarView, CardUserForm},
};
</script>