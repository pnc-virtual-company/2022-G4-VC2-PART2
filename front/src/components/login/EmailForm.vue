<template>
  <div >
    <PasswordForm v-if="isCorrectEmail && !isForgetPassword"/>
  <div class="bg-grey-lighter min-h-screen flex flex-col w-full" v-if="isFormEmail">
    <div
      class="container  w-full mx-auto flex-1 flex flex-col items-center justify-center px-2"
    >
      <div class="align-start ">
        <p class="font-semibold">
          Student <span class="text-blue-400">Follow Up</span>
        </p>
      </div>
      <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
        <form  @submit.prevent="loginEmail">
          <h1 class="mb-8 text-3xl text-center">Sign in to Account</h1>

          <input
            type="text"
            class="block border border-grey-light w-full p-3 rounded mb-4 icon"
            name="email"
            placeholder="Email"
            v-model="email"
            required
          />
          <div class="flex justify-end">
            <button
              class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-primary focus:shadow-outline"
              type="submit"
              @click="loginEmail"
            >
              Next
            </button>
          </div>
        </form>
      </div>
    
    </div>
  </div>
  </div>

</template>
<script>
import PasswordForm from "./PasswordForm.vue";
import ls from 'localstorage-slim'
ls.config.encrypt = true;
export default {
  components:{
    PasswordForm
},
  props: ["listAllUser"],
  data() {
    return {
      email: "",
      password: "",
      isCorrectEmail:false,
      isFormEmail:true,
      isForgetPassword:false
    };
  },
  methods: {
    loginEmail() {
      const allUserList = this.listAllUser;
      console.log(this.email);
      console.log(allUserList);
      allUserList.forEach((user) => {
        if (user.email == this.email) {
          ls.set('user',user.email)
          // console.log(ls.get('user'))
          // localStorage.setItem("user", user.email);
          ls.set("id", user.id);
          ls.set("role", user.role);
          this.isCorrectEmail = true
          this.isFormEmail=false
        }
      });
    },
  },
};
</script>
<style>
.icon {
  position: relative;
  padding-left: 2.5rem;
  padding-right: 2rem;
  background: url("https://cdn4.iconfinder.com/data/icons/evil-icons-user-interface/64/mail-512.png")
    no-repeat left;
  background-size: 35px;
}
.icon1 {
  position: relative;
  padding-left: 2.5rem;
  padding-right: 2rem;
  background: url("https://cdn4.iconfinder.com/data/icons/music-ui-solid-24px/24/lock_security_password_encryption-2-256.png")
    no-repeat left;
  background-size: 35px;
}
</style>
