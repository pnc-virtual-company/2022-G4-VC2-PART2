<template>
  <CardUserForm />
</template>

<script>
import CardUserForm from "./CardUser/CardUserForm.vue";
export default {
  provide() {
    return { isStudent: true };
  },
  components: { NavbarView, CardUserForm },
};
</script>