<template>
    <div class="header bg-[#161b22] py-4">
        <div class="flex flex-wrap items-center justify-between md:justify-start">
            <button class="md:hidden block pl-4" @click="mobileMenu = !mobileMenu">
                <svg aria-hidden="true" height="24" viewBox="0 0 16 16" version="1.1" width="24" data-view-component="true" class="fill-gray-100">
                    <path fill-rule="evenodd" d="M1 2.75A.75.75 0 011.75 2h12.5a.75.75 0 110 1.5H1.75A.75.75 0 011 2.75zm0 5A.75.75 0 011.75 7h12.5a.75.75 0 110 1.5H1.75A.75.75 0 011 7.75zM1.75 12a.75.75 0 100 1.5h12.5a.75.75 0 100-1.5H1.75z"></path>
                </svg>
            </button>
            <div class="left md:w-[250px] lg:w-[350px] w-auto pl-6">
                <div class="flex items-center justify-between sm:justify-start">
                    <router-link to="/" @click="mobileMenu = false">
                        <svg height="32" aria-hidden="true" viewBox="0 0 16 16" version="1.1" width="48" data-view-component="true" class="mx-auto" fill="white">
                            <path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                        </svg>
                    </router-link>
                    <input type="text" placeholder="Search or jump to..." class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-auto lg:w-full bg-dark-main text-gray-300 hidden md:block">
                </div>
            </div>
            <div class="md:w-[calc(100%-250px)] lg:w-[calc(100%-350px)] w-auto flex justify-between">
                <div class="middle md:w-9/12 w-full lg:pl-3 hidden md:block">
                    <div class="menu flex items-center lg:gap-x-5 gap-x-2 md:pl-3 lg:pl-0 pl-0">
                        <a href="#" class="text-gray-200 font-medium lg:text-sm text-[14px] hover:text-gray-400">Pull requests</a>
                        <a href="#" class="text-gray-200 font-medium lg:text-sm text-[14px] hover:text-gray-400">Issues</a>
                        <a href="#" class="text-gray-200 font-medium lg:text-sm text-[14px] hover:text-gray-400">Codespaces</a>
                        <a href="#" class="text-gray-200 font-medium lg:text-sm text-[14px] hover:text-gray-400">Marketplace</a>
                        <a href="#" class="text-gray-200 font-medium lg:text-sm text-[14px] hover:text-gray-400">Explore</a>
                    </div>
                </div>
                <div class="last md:w-3/12 w-full md:pr-6 pr-4 ml-auto">
                    <div class="menu flex items-center justify-end gap-x-4" @click="mobileMenu = false">
                        <a href="#" class="" >
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-bell" fill="white">
                                <path d="M8 16a2 2 0 001.985-1.75c.017-.137-.097-.25-.235-.25h-3.5c-.138 0-.252.113-.235.25A2 2 0 008 16z"></path><path fill-rule="evenodd" d="M8 1.5A3.5 3.5 0 004.5 5v2.947c0 .346-.102.683-.294.97l-1.703 2.556a.018.018 0 00-.003.01l.001.006c0 .002.002.004.004.006a.017.017 0 00.006.004l.007.001h10.964l.007-.001a.016.016 0 00.006-.004.016.016 0 00.004-.006l.001-.007a.017.017 0 00-.003-.01l-1.703-2.554a1.75 1.75 0 01-.294-.97V5A3.5 3.5 0 008 1.5zM3 5a5 5 0 0110 0v2.947c0 .05.015.098.042.139l1.703 2.555A1.518 1.518 0 0113.482 13H2.518a1.518 1.518 0 01-1.263-2.36l1.703-2.554A.25.25 0 003 7.947V5z"></path>
                            </svg>
                        </a>
                        <a href="#" class="items-center gap-x-1 hidden md:flex">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-plus" fill="white">
                                <path fill-rule="evenodd" d="M7.75 2a.75.75 0 01.75.75V7h4.25a.75.75 0 110 1.5H8.5v4.25a.75.75 0 11-1.5 0V8.5H2.75a.75.75 0 010-1.5H7V2.75A.75.75 0 017.75 2z"></path>
                            </svg>
                            <span class="dropdown-caret"></span>
                        </a>
                        <div class="profile relative hidden md:block">
                            <button class="flex items-center gap-x-1" @click="profile = !profile">
                                <img :src="loggedInUser.avatar_url" class="w-6 h-6 rounded-full" alt="user">
                                <span class="dropdown-caret"></span>
                            </button>
                            <div class="profile-menu absolute right-0 top-12 min-w-[180px] w-full bg-dark-primary border border-gray-700 rounded z-30" v-if="profile">
                                <div class="top-menu text-gray-300 text-sm py-3 px-4">
                                    <h5>Signed in as <span class="font-semibold">{{ loggedInUser.login }}</span></h5>
                                </div>
                                <div class="bottom border-y border-gray-700 py-2 px-8">
                                    <button class="group border border-gray-700 py-1 px-2 text-gray-500 text-[13px] rounded w-full flex items-center">
                                        <svg class="fill-gray-500 group-hover:fill-blue-400" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM5 8a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zM5.32 9.636a.75.75 0 011.038.175l.007.009c.103.118.22.222.35.31.264.178.683.37 1.285.37.602 0 1.02-.192 1.285-.371.13-.088.247-.192.35-.31l.007-.008a.75.75 0 111.222.87l-.614-.431c.614.43.614.431.613.431v.001l-.001.002-.002.003-.005.007-.014.019a1.984 1.984 0 01-.184.213c-.16.166-.338.316-.53.445-.63.418-1.37.638-2.127.629-.946 0-1.652-.308-2.126-.63a3.32 3.32 0 01-.715-.657l-.014-.02-.005-.006-.002-.003v-.002h-.001l.613-.432-.614.43a.75.75 0 01.183-1.044h.001z"></path>
                                        </svg>
                                       <span class="ml-2 group-hover:text-blue-400">Set Status</span>
                                    </button>
                                </div>
                                <div class="menu-items py-2" @click="profile = !profile">
                                    <router-link :to="{name: 'Profile', params: { username: loggedInUser.login }}" class="text-gray-300 hover:bg-blue-500 hover:text-white py-1.5 text-sm block px-4 whitespace-nowrap">Your Profile</router-link>
                                    <router-link :to="{name: 'Profile', params: {username: loggedInUser.login}, query: { tab: 'repositories' }}" class="text-gray-300 hover:bg-blue-500 hover:text-white py-1.5 text-sm block px-4 whitespace-nowrap">Your Repositories</router-link>
                                    <router-link :to="{name: 'Profile', params: {username: loggedInUser.login}, query: { tab: 'projects' }}" class="text-gray-300 hover:bg-blue-500 hover:text-white py-1.5 text-sm block px-4 whitespace-nowrap">Your Projects</router-link>
                                    <router-link :to="{name: 'Profile', params: {username: loggedInUser.login}, query: { tab: 'stars' }}" class="text-gray-300 hover:bg-blue-500 hover:text-white py-1.5 text-sm block px-4 whitespace-nowrap">Your Stars</router-link>
                                    <a :href="'https://gist.github.com/' + loggedInUser.login" class="text-gray-300 hover:bg-blue-500 hover:text-white py-1.5 text-sm block px-4 whitespace-nowrap">Your Gists</a>
                                    <a href="#" class="text-gray-300 hover:bg-blue-500 hover:text-white py-1.5 text-sm block px-4 whitespace-nowrap">Settings</a>
                                    <div class="bottom my-1 border-t border-gray-700"></div>
                                    <a href="/logout" class="text-gray-300 hover:bg-blue-500 hover:text-white py-1.5 text-sm block px-4 whitespace-nowrap">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- mobile menu -->
        <div class="mobile-menu absolute top-16 left-0 z-50 bg-[#161b22] h-auto w-full px-4 pb-4 pt-2" v-if="mobileMenu">
            <div class="menu-content">
                <div class="search">
                    <input type="text" placeholder="Search or jump to..." class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300 ">
                </div>
                <div class="menu mt-5 bg-[#161b22] border-t border-gray-700" @click="mobileMenu = false">
                    <router-link to="/" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">Dashboard</router-link>
                    <a href="#" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">Pull requests</a>
                    <a href="#" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">Issues</a>
                    <a href="#" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">Codespaces</a>
                    <a href="#" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">Marketplace</a>
                    <a href="#" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">Explore</a>
                    <a href="#" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">Sponsers</a>
                    <a href="#" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">Settings</a>
                    <a href="#" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">
                        <button class="flex items-center gap-x-1">
                            <img :src="loggedInUser.avatar_url" class="w-5 h-5 rounded-full" alt="user">
                            <span class="font-semibold">{{ loggedInUser.login }}</span>
                        </button>
                    </a>
                    <a href="/logout" class="block py-[8px] border-b border-gray-700 text-gray-100 font-medium lg:text-sm text-[14px] hover:text-gray-400">
                        <button class="flex items-center gap-x-1">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-100">
                                <path fill-rule="evenodd" d="M2 2.75C2 1.784 2.784 1 3.75 1h2.5a.75.75 0 010 1.5h-2.5a.25.25 0 00-.25.25v10.5c0 .138.112.25.25.25h2.5a.75.75 0 010 1.5h-2.5A1.75 1.75 0 012 13.25V2.75zm10.44 4.5H6.75a.75.75 0 000 1.5h5.69l-1.97 1.97a.75.75 0 101.06 1.06l3.25-3.25a.75.75 0 000-1.06l-3.25-3.25a.75.75 0 10-1.06 1.06l1.97 1.97z"></path>
                            </svg>
                            <span class="font-semibold">Sign out</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { usersStore } from '../stores/usersStore'

export default {
    name: 'Header',
    setup() {
        const store = usersStore()

        return {
            // you can return the whole store instance to use it in the template
            store,
        }
    },
    data(){
        return{
            loggedInUser: '',
            profile: false,
            mobileMenu: false,
        }
    },
    computed: {

    },
    mounted(){
        this.getloggedInUser();
    }, 
    methods: {
        getloggedInUser(){
            this.store.getUser()
            setTimeout(() => {
                this.loggedInUser = this.store.gitHubUser
            }, 800)
        }
    },
}
</script>
