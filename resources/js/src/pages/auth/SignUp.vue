<template>
    <div class="auth py-20 flex items-center justify-center backdrop-blur-[20px]">
        <div class="min-w-[330px]">
            <div class="text-center mb-4">
                <svg height="48" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="48" data-view-component="true" class="mx-auto" fill="white">
                    <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                </svg>
                <h1 class="text-[25px] tracking-wide text-slate-400 font-light mt-5">Sign up to GitHub</h1>
            </div>
            <div class="p-6 rounded bg-white/5 border border-white/10">
                <form @submit.prevent="SubmitForm">
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-xs text-slate-300">Name</label>
                        <input type="text" :class="[ error.name ? 'border-red-500' : 'border-white/10', 'w-full text-xs bg-transparent focus:outline-none text-slate-300 border px-2 py-2 rounded']" v-model="register.name">
                        <p class="text-red-500 text-xs my-2" v-if="error.name">{{ error.name[0] }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-xs text-slate-300">Email</label>
                        <input type="email" :class="[ error.email ? 'border-red-500' : 'border-white/10', 'w-full text-xs bg-transparent focus:outline-none text-slate-300 border px-2 py-2 rounded']" v-model="register.email">
                        <p class="text-red-500 text-xs my-2" v-if="error.email">{{ error.email[0] }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-xs text-slate-300">Password</label>
                        <input type="password" :class="[ error.password ? 'border-red-500' : 'border-white/10', 'w-full text-xs bg-transparent focus:outline-none text-slate-300 border px-2 py-2 rounded']" v-model="register.password">
                        <p class="text-red-500 text-xs my-2" v-if="error.password">{{ error.password[0] }}</p>
                    </div>
                    <div class="form-group mb-3">
                        <label class="block mb-2 text-xs text-slate-300">Password Confirmation</label>
                        <input type="password" :class="[ error.password_confirmation ? 'border-red-500' : 'border-white/10', 'w-full text-xs bg-transparent focus:outline-none text-slate-300 border px-2 py-2 rounded']" v-model="register.password_confirmation">
                        <p class="text-red-500 text-xs my-2" v-if="error.password_confirmation">{{ error.password_confirmation[0] }}</p>
                    </div>
                    <div class="form-group mb-3">
                         <button type="submit" class="w-full text-sm bg-green-primary text-center text-white px-2 py-2 rounded flex justify-center items-center" :disabled="loading">
                            <div class="laoding flex justify-center items-center" v-if="loading">
                                <div class="w-4 h-4 rounded-full animate-spin border-2 border-solid border-white border-t-transparent shadow-md mr-2"></div>
                                <span>Signing up...</span> 
                            </div>
                            <span v-else>Sign Up</span> 
                        </button>
                    </div>
                </form>
            </div>
            <div class="p-6 rounded bg-white/5 border border-white/10 mt-3 text-center">
                <p class="text-slate-300 text-sm">Already have an account? <router-link to='/login' class="text-blue-500"> Sign in →</router-link></p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SignUpPage",
    data(){
        return{
            register: {},
            error: {},
            loading: false
        }
    },
    methods:{
        SubmitForm(){
            this.loading = true
            axios.post('/api/register', this.register)
            .then(res=>{
                this.loading = false
                this.$router.push('/login')
            }).catch(err=>{
                this.loading = false
                if(err.response.status === 422)
                {
                    this.error = err.response.data.errors
                }
            })
        }
    }
}
</script>