<template>
    <div class="bg-[#000000b9] fixed top-0 w-full h-screen">
        <div class="rounded mb-4 w-5/12 m-auto mt-28">
            <div class="text-center rounded-t-md bg-primary p-2 px-4 text-white ">
                <p class="text-2xl ">Verification</p>
            </div>
            <form class="p-5 bg-white rounded-b-md" @submit.prevent="confirmVerifyEmail">
                <p>Verification code has been sent to your email</p>
                <p>Please check your email to get it</p>
                <div class="mb-2 mt-2 relative">
                    <label class="block text-gray-700 text-sm font-bold  mb-1">
                        Type code
                    </label>
                    <input
                        :class="{'border-red-500 bg-red-100':isMatch }"
                        @change="isMatch=false"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 focus:outline-primary focus:shadow-outline"   maxlength="6" type= "text" v-model="verify_code" placeholder="Verify code..">
                </div>
                <div v-if="isMatch" class= "text-red-500 mb-4">{{sms_alert}}</div>
                <div class="flex text-right justify-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-primary focus:shadow-outline" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
        <loading-show v-if="isVerifying">
                Verifying...
        </loading-show>
    </div>
</template>
<script>
// import axios from "../../axios-http"
// import LoadingShow from './../animations/LoadingShow.vue';
export default({
    components: {
        'loading-show': LoadingShow,
    },
    emits: ['confirm-code'],
    data() {
        return {
            isMatch: '',
            verify_code: '',
            sms_alert: '',
            isVerifying: false,
        }
    },
    methods: {
        async confirmVerifyEmail(){
            if (this.verify_code != ""){
                this.isVerifying = true;
                this.isMatch = false
                await axios.post('verifyCode',{verify_code:this.verify_code} ).then((res)=>{
                    this.isVerifying = false
                    if (res.data.status){
                        this.$emit('confirm-code');
                    }else{
                        
                        this.isMatch = true;
                        this.sms_alert = res.data.message;
                    }
                })
            }else{
                this.isMatch = true;
                this.sms_alert = "Verify code should be completed"
            }
        },
    }
})
</script>
