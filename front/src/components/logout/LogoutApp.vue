<template>
  <form  @submit.prevent="logout">
          <h1 class="mb-8 text-3xl text-center">Are you sure ?</h1>
          <div class="flex text-right justify-end">
            <button
              class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-primary focus:shadow-outline">
              <router-link  to="/login"  @click="logout">Confirm</router-link>
            </button>
 
          </div>
    </form>
</template>

<script>
import router from '@/router';
export default {
methods:{
    logout(){
        localStorage.removeItem(localStorage.role+'_token');
        localStorage.removeItem('role',)
        localStorage.removeItem('user');
        localStorage.removeItem('email');
        router.push('/')
      }
}
}
</script>

<style>

</style>