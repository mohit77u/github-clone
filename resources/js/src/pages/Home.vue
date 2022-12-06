<template>
<div>
    <!-- top header -->
    <Header :user="githubUser" />

    <!-- main -->
    <section class="main flex flex-wrap bg-dark-main min-h-screen">
        <!-- sidebar -->
        <SideBar :user="githubUser" />

        <!-- main -->
        <div class="main-right-content bg-dark-main flex-auto px-8 py-5">
            <div class="flex flex-wrap">
                <div class="lg:w-8/12 md:w-6/12 w-full">
                    <div class="top">
                        <h1 class="text-gray-300 text-[32px] font-semibold mb-3">The home for all developers — including you.</h1>
                        <p class="text-gray-400 text-sm mb-3 leading-6">Welcome to your personal dashboard, where you can find an introduction to how GitHub works, tools to help you build software, and help merging your first lines of code.</p>
                    </div>

                    <!-- top bar -->
                    <div class="flex justify-between items-center mt-4">
                        <div class="top flex items-center gap-x-2">
                            <div class="icon bg-gray-400 w-10 h-10 text-center leading-8 rounded-full">
                                <svg aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="20" data-view-component="true" class="h-full mx-auto">
                                    <path fill-rule="evenodd" d="M4.72 3.22a.75.75 0 011.06 1.06L2.06 8l3.72 3.72a.75.75 0 11-1.06 1.06L.47 8.53a.75.75 0 010-1.06l4.25-4.25zm6.56 0a.75.75 0 10-1.06 1.06L13.94 8l-3.72 3.72a.75.75 0 101.06 1.06l4.25-4.25a.75.75 0 000-1.06l-4.25-4.25z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 text-sm">Start writing code</p>
                        </div>
                        <div class="top flex flex-end">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <!-- main grid create readme -->
                    <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
                        <div class="left create">
                            <div class="create-main my-3 border border-gray-800 bg-white/5 rounded px-4 pt-4 h-full">
                                <h4 class="text-gray-300 font-medium mb-3 text-[16px]">Start a new repository</h4>
                                <p class="text-gray-400 text-[14px] mb-3 leading-6">A repository contains all of your project's files, revision history, and collaborator discussion.</p>

                                <!-- form top -->
                                <div class="form-top flex items-center gap-x-1">
                                    <p class="text-gray-300 text-sm">{{githubUser.login}}/</p>
                                    <input type="text" placeholder="name your new repository..." class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300">
                                </div>

                                <!-- create form -->
                                <form class="my-4">
                                    <div class="form-group flex items-start gap-2 mb-3">
                                        <input type="radio" id="public" name="type" value="public" class="mt-1.5 w-3.5 h-3.5 bg-gray-400 border border-gray-500">
                                        <label for="public" class="flex items-start gap-x-2">
                                            <svg aria-hidden="true" height="36" viewBox="0 0 24 24" version="1.1" width="24" data-view-component="true" class="fill-gray-400">
                                                <path fill-rule="evenodd" d="M3 2.75A2.75 2.75 0 015.75 0h14.5a.75.75 0 01.75.75v20.5a.75.75 0 01-.75.75h-6a.75.75 0 010-1.5h5.25v-4H6A1.5 1.5 0 004.5 18v.75c0 .716.43 1.334 1.05 1.605a.75.75 0 01-.6 1.374A3.25 3.25 0 013 18.75v-16zM19.5 1.5V15H6c-.546 0-1.059.146-1.5.401V2.75c0-.69.56-1.25 1.25-1.25H19.5z"></path>
                                                <path d="M7 18.25a.25.25 0 01.25-.25h5a.25.25 0 01.25.25v5.01a.25.25 0 01-.397.201l-2.206-1.604a.25.25 0 00-.294 0L7.397 23.46a.25.25 0 01-.397-.2v-5.01z"></path>
                                            </svg>
                                            <div class="mt-0.5">
                                                <p class="text-gray-300 text-sm mb-1">Public</p>
                                                <p class="text-gray-500 text-xs">Anyone on the internet can see this repository</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-group flex items-start gap-2 mb-3">
                                        <input type="radio" id="private" name="type" value="public" class="mt-1.5 w-3.5 h-3.5 bg-gray-400 border border-gray-500">
                                        <label for="private" class="flex items-start gap-x-2">
                                            <svg aria-hidden="true" height="36" viewBox="0 0 24 24" version="1.1" width="24" data-view-component="true" class="fill-gray-400">
                                                <path fill-rule="evenodd" d="M6 9V7.25C6 3.845 8.503 1 12 1s6 2.845 6 6.25V9h.5a2.5 2.5 0 012.5 2.5v8a2.5 2.5 0 01-2.5 2.5h-13A2.5 2.5 0 013 19.5v-8A2.5 2.5 0 015.5 9H6zm1.5-1.75C7.5 4.58 9.422 2.5 12 2.5c2.578 0 4.5 2.08 4.5 4.75V9h-9V7.25zm-3 4.25a1 1 0 011-1h13a1 1 0 011 1v8a1 1 0 01-1 1h-13a1 1 0 01-1-1v-8z"></path>
                                            </svg>
                                            <div class="mt-0.5">
                                                <p class="text-gray-300 text-sm mb-1">Private</p>
                                                <p class="text-gray-500 text-xs">You choose who can see and commit to this repository</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-group my-5">
                                        <button class="bg-green-primary px-3 py-1.5 text-white font-semibold rounded text-xs">Create new repository</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="right">
                            <div class="create-main my-3 border border-gray-800 bg-white/5 rounded px-4 pt-4 h-full">
                                <h4 class="text-gray-300 font-medium mb-3 text-[16px]">Introduce yourself with a profile README</h4>
                                <p class="text-gray-400 text-[14px] mb-3 leading-6">Share information about yourself by creating a profile README, which appears at the top of your profile page.</p>

                                <div class="readme border border-gray-800 rounded-md my-3">
                                    <!-- form top -->
                                    <div class="form-top flex items-center justify-between px-3 py-2">
                                        <p class="text-gray-300 text-sm">{{githubUser.login}} / README.md</p>
                                        <button class="bg-green-primary px-3 py-1.5 text-white font-semibold rounded text-xs">Create</button>
                                    </div>
                                    <div class="readme-content px-3 bg-white/5">
                                        <article class="py-2">
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">1</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 👋 Hi, I’m @mohit77u</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">2</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 👀 I’m interested in ...</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">3</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 🌱 I’m currently learning ...</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">4</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 💞️ I’m looking to collaborate on ...</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">5</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"> - 📫 How to reach me ...</pre>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="blob-num pinned-gist-blob-num text-gray-400 text-[13px]">6</span>
                                                <pre class="lh-condensed-ultra overflow-hidden text-gray-300 text-[13px]"></pre>
                                            </div>
                                        </article>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-4/12 md:w-6/12 w-full">

                </div>
            </div>
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
            <svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ml-3 text-sm font-normal text-gray-200">{{ toast }}</div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5  text-white" data-dismiss-target="#toast-success" aria-label="Close" @click="toast = !toast">
            <span class="sr-only">Close</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
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
    data() {
        return {
            connect: false,
            user: '',
            githubUser: '',
            error: '',
            toast: false,
        }
    },
    created() {
        this.getUser();
        console.log(this.$route.params.username)
    },
    methods: {
        getUser() {
            axios.get('/user')
                .then((res) => {
                    this.user = res.data.user
                    const username = res.data.user.username
                    if (username == null || username == '') {
                        this.connect = true
                    } else {
                        this.getGithubUser(username);
                    }
                }).catch((err) => {
                    console.log(err)
                })
        },
        getGithubUser(username) {
            axios.get('https://api.github.com/users/' + username)
                .then((res) => {
                    this.githubUser = res.data
                }).catch((err) => {
                    console.log(err)
                })
        },
        updateUserName() {
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
        },
    },

}
</script>
