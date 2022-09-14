<template >
<div class="flex px-4 py-3 sm:px-4 fixed h-18 z-0 top-0 right-0 items-center justify-end w-full drop-shadow-xl " style="background:var(--main-color)">
  <div class="flex w-8/12 justify-end items-center ...  ">
     <router-link to="/profiles" class="flex justify-center text-white border px-4 rounded py-1 pb-2 hover:bg-cyan-400" style="background:var(--main-color)">
          Veang Kroh
     </router-link>
  </div>
</div>

</template>
<script>
  export default {
  emits:['emits-nav'],
  data(){
      return {
        isShowed: false,
        width: "w-full",
      }
  },
  methods: { 
    hiddeRightbar(){
      this.isShowed = !this.isShowed;
      this.$emit('emits-nav', this.isShowed)
    }
  },
}
</script>