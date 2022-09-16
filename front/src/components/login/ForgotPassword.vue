<template>
    <section class="z-[100] fixed left-0 top-0 w-full h-full bg-white">
        <div class="flex h-full items-center bg-slate-400">
            <img src="../../assets/forgot-password.png" alt="logo" class="w-[30%] m-auto ">
            <div class="rounded mb-4 w-[40%] m-auto mt-[30px] ">
                <form class="p-5 bg-[#dddddd98] shadow rounded" @submit.prevent="handleSubmit">
                    <img src="../../assets/pnc_logo.png" alt="logo" class="w-[100px] m-auto">
                    <h1 class="text-1xl font-semibold text-center p-1">Forgot Password</h1>
                    <div class="mb-1 relative">
                        <label class="block text-gray-700 text-lg  mb-1" for="password">
                            Email *
                        </label>
                        <input
                            :class="{ 'border-red-500 border bg-red-100': is_not_found }"
                            class=" appearance-none rounded w-full py-2 px-3 text-gray-700 mb-1 focus:outline-primary focus:shadow-outline" 
                            v-model="email"
                            @change="is_not_found=false"
                            id="email" type="email" placeholder="Email..." >
                    </div>
                    <div v-if="is_not_found" class="mb-6 text-red-500 text-sm">{{sms_alert}}</div>
                    <button
                        class="bg-blue-500 mt-6 hover:bg-blue-700 text-white py-2 w-full px-4 rounded focus:outline-primary focus:shadow-outline"
                        type="submit" >
                        Submit
                    </button>
                </form>
            </div>
        </div>
        <reset-password v-if="is_confirmed_code" @submit-change="submitNewPassword" />
        <form-verify v-if="is_found_email" @confirm-code="confirmCode"/>
        <loading-show v-if="isFindingMail">
                Finding email...
        </loading-show>
    </section>
</template>

<script>

// import axios from "../../axios-http"
// import resetPassword from './ResetForgotPassword.vue';
// import formVerify from './FormVerifyEmail.vue';
// import LoadingShow from './../animations/LoadingShow.vue';
export default({
    components: {
        'reset-password': resetPassword,
        'form-verify': formVerify,
        'loading-show': LoadingShow,
    },
    data(){
        return {
            email: '',
            is_not_found: false,
            is_found_email: false,
            verify_code: '',
            is_confirmed_code: false,
            isFindingMail: false,
            sms_alert: ""
        }
    },
    methods: {
        handleSubmit(){
            if (this.email.trim() != ""){
                let chars = "01234567890123456789012345678901234567890123456789";
                let string_length = 6;
                let random_string = ""
                for (let i = 0; i < string_length; i++) {
                    let rnum = Math.floor(Math.random() * chars.length);
                    random_string += chars.substring(rnum, rnum + 1);
                }
                this.verify_code = random_string;
                this.isFindingMail = true;
                this.is_not_found = false;
                axios.post('forgot',{email: this.email, verify_code: this.verify_code}).then((res)=>{
                    this.isFindingMail = false;
                    console.log(res.data);
                    if (!res.data.success){
                        this.is_not_found = true;
                        this.sms_alert = "Email not found"
                        this.isFindingMail = false;
                    }else{
                        this.is_found_email = true;
                    }
                });
            }else{
                this.is_not_found = true;
                this.sms_alert = "Email should be completed"
            }
        },
        submitNewPassword(newPwd){
            let new_password = {email: this.email, new_password: newPwd}
            axios.post('resetForgot',new_password).then((res)=>{
                this.$router.push({name: 'login'})
            });
        },
        confirmCode(){
            this.is_found_email = false;
            this.is_confirmed_code = true;
        }
    }
})
</script>
