<template>
  <navbar-view />
  <CardUserForm />
</template>

<script>
import NavbarView from "./NavbarView.vue";
import CardUserForm from "./CardUser/CardUserForm.vue";
export default {
  provide() {
    return { isStudent: true };
  },
  components: { NavbarView, CardUserForm },
};
</script>