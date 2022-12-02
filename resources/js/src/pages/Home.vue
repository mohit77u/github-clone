<template>
    <div>
        <!-- top header -->
        <Header />

        <!-- main -->
        <section class="main flex flex-wrap bg-dark-main min-h-screen">
            <!-- sidebar -->
            <SideBar :user="githubUser" />

            <!-- main -->
            <div class="main-right-content p-4 bg-dark-main">
                <h1 class="text-white">Content</h1>
            </div>
        </section>

        <!-- connect gitHub popup -->
        <div class="connect-popup fixed top-0 left-0 z-40 bg-black/70 w-full h-full flex justify-center items-center" v-if="connect">
            <div class="popup-main max-w-[350px] min-w-[350px] rounded border border-gray-700 bg-[#0d1117] py-5">
                <div class="popup-head px-5 flex justify-between items-center">
                    <h2 class="text-white text-sm pb-1.5">Connect GitHub</h2>
                    <!-- <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="text-gray-400 hover:text-blue-400" fill="#ddd">
                        <path fill-rule="evenodd" d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                    </svg> -->
                </div>
                <div class="popup-top-bar mt-4 w-full p-4 border-t border-b border-[rgba(187,128,9,0.4)] bg-gradient-to-b from-[rgba(187,128,9,0.15)] to-[rgba(187,128,9,0.15)]">
                    <p class="text-gray-400 text-sm">Connect your GitHub account now.</p>
                </div>
                <div class="popup-main px-5">
                    <p class="text-gray-300 text-sm pt-4">Enter your GitHub username to connect with your account, and you can perform any actions that will reflect to your GitHub account.</p>
                    <form @submit.prevent="updateUserName" class="py-4">
                        <div class="form-group">
                            <label class="block mb-1 text-gray-300 text-sm">Please type your GitHub username</label>
                            <input type="text" placeholder="" class="my-2 border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="user.username">
                            <p v-if="error.username" class="text-red-500 text-xs mb-2">{{ error.username[0]}}</p>
                            <button type="submit" class="bg-transparent hover:bg-green-primary border border-gray-700 w-full px-3 py-1.5 text-sm rounded-md text-green-primary hover:text-white flex items-center justify-center gap-x-1 font-medium">Connect GitHub</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- success toast -->
        <div id="toast-success" class="flex fixed right-10 bottom-5 z-50 items-center p-4 mb-4 w-full max-w-xs text-gray-200 rounded bg-[#0d1117]  border border-gray-700 shadow  animate__animated animate__fadeInRight" role="alert" v-if="toast">
            <div class="inline-flex justify-center items-center w-6 h-6 bg-lime-500 rounded-full text-white">
                <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal text-gray-200">{{ toast }}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5  text-white" data-dismiss-target="#toast-success" aria-label="Close" @click="toast = !toast">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    </div>
</template>


<script>
import Header from '../components/Header.vue';
import SideBar from '../components/SideBar.vue';
export default {
    name: 'HomePage',
    components: {
        SideBar,
        Header,
    },
    data(){
        return{
            connect: false,
            user: '',
            githubUser: '',
            error: '',
            toast: false,
        }
    },
    created(){
        this.getUser();
    },
    methods:{
        getUser(){ 
            const token = localStorage.getItem('token');
            let config = {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            }
            axios.get('/api/user', config)
            .then((res) => {
                this.user = res.data.user
                const username = res.data.user.username
                if(username == null || username == ''){
                    this.connect = true
                } else {
                    this.getGithubUser(username);
                }
            }).catch((err) => {
                console.log(err)
            })
        },
        getGithubUser(username){
            axios.get('https://api.github.com/users/' + username)
            .then((res) => {
                this.githubUser = res.data
                // console.log(this.githubUser)
            }).catch((err) => {
                console.log(err)
            })
        },
        updateUserName(){
            let data = {
                id: this.user.id,
                username: this.user.username
            }
            console.log(data)
            axios.post('/api/update/username', data)
            .then((res) => {
                this.connect = false
                this.getGithubUser(res.data.user.username);
                this.toast = res.data.message
            }).catch((err) => {
                console.log(err)
                this.error = err.response.data.errors
            })
        }
    },
    
}
</script>
