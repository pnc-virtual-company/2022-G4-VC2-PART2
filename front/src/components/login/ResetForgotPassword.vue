<template>
    <div>
        <div class="bg-[#000000b9] fixed top-0 w-full h-screen">
            <div class="rounded mb-4 w-5/12 m-auto mt-28">
                <div class="text-center rounded-t-md bg-primary p-2 px-4 text-white ">
                    <p class="text-2xl ">Reset Forgot Password</p>
                </div>
                <form class="p-5 bg-white rounded-b-md" @submit.prevent="saveChange">
                    <div class="mb-2 relative">
                        <label class="block text-gray-700 text-lg  mb-1" for="username">
                            New password
                        </label>
                        <input class="shadow appearance-none border border-gray-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-primary focus:shadow-outline" :class="{'border-red-500 bg-red-100':is_fill_new_password }" id="username" :type="newPassword" v-model="new_password" placeholder="New password.." @change="is_fill_new_password=false"
                            onselectstart="return false"
                            oncut="return false"
                            oncopy="return false"
                            onpaste="return false"
                            ondrag="return false"
                            ondrop="return false"
                        >
                        <svg v-if="is_fill_new_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute top-[40px] right-3 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <svg v-else-if="newPassword=='password'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute top-[40px] right-3 text-gray-400 hover:cursor-pointer" @click="showNewPassword" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                        </svg>
                        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute top-[40px] right-3 text-gray-400 hover:cursor-pointer" @click="showNewPassword" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.707 2.293a1 1 0 00-1.414 1.414l14 14a1 1 0 001.414-1.414l-1.473-1.473A10.014 10.014 0 0019.542 10C18.268 5.943 14.478 3 10 3a9.958 9.958 0 00-4.512 1.074l-1.78-1.781zm4.261 4.26l1.514 1.515a2.003 2.003 0 012.45 2.45l1.514 1.514a4 4 0 00-5.478-5.478z" clip-rule="evenodd" />
                            <path d="M12.454 16.697L9.75 13.992a4 4 0 01-3.742-3.741L2.335 6.578A9.98 9.98 0 00.458 10c1.274 4.057 5.065 7 9.542 7 .847 0 1.669-.105 2.454-.303z" />
                        </svg>
                    </div>
                    <div v-if="is_fill_new_password" class= "text-red-500 mb-4">{{sms_alert}}</div>
                    <div class="mb-6 relative">
                        <label class="block text-gray-700 text-lg  mb-1" for="password">
                            Confirm new password *
                        </label>
                        <input class="shadow appearance-none border border-gray-400  rounded w-full py-2 px-3 text-gray-700 mb-1 leading-tight focus:outline-primary focus:shadow-outline" :class="{'border-red-500 bg-red-100':is_fill_confirm_password }" id="password" type="password" v-model="confirm_password" placeholder="Confirm your password..." @change="is_fill_confirm_password=false">
                        <svg v-if="is_fill_confirm_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute top-[40px] right-3 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        <div v-if="isMatch" class="text-red-500">Confirm password not match</div>
                    </div>
                    <div class="flex text-right justify-end">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-primary focus:shadow-outline" type="submit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <loading-show v-if="isResetting">
                Resetting password...
        </loading-show>
    </div>
</template>
<script>
// import LoadingShow from './../animations/LoadingShow.vue';
export default({
    // components: {
    //     'loading-show': LoadingShow,
    // },
    emits: ['submit-change'],
    data() {
        return {
            newPassword: "password",
            new_password: "",
            confirm_password: "",
            isMatch: false,
            is_fill_new_password: false,
            is_fill_confirm_password: false,
            sms_alert: '',
            isResetting: false,
        }
    },
    methods: {
        showNewPassword(){
            if (this.newPassword == "password"){
                this.newPassword = "text";
            }else{
                this.newPassword = "password"
            }
        },
        saveChange(){
            this.isMatch = false
            if (this.new_password != this.confirm_password ){
                this.isMatch = true
            }
            if (this.checkFormValidation() && this.isMatch == false){
                this.isResetting = true;
                this.$emit('submit-change',this.new_password);
            }
        },
        checkFormValidation(){
            if (this.new_password.trim() == "" || this.new_password.length <= 7){
                this.is_fill_new_password = true
                this.sms_alert = "Password should be more than 7 character"
            }
            if (this.confirm_password.trim() == ""){
                this.is_fill_confirm_password = true
            }
            var message = true;
            if ( this.is_fill_new_password || this.is_fill_confirm_password ){
                message =  false;
            }
            return message
        }
    }
})
</script>
