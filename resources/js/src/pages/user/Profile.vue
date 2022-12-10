<template>
    <div class="relative">
        <div class="profile-details py-5">
            <div class="top pt-4 border-b border-gray-800">
                <div class="flex flex-wrap">
                    <div class="left md:w-8/12 w-full ml-auto">
                        <ul class="flex items-center gap-1">
                            <li class="pb-1 border-b-2 border-orange-500">
                                <button class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                        <path fill-rule="evenodd" d="M4.72 3.22a.75.75 0 011.06 1.06L2.06 8l3.72 3.72a.75.75 0 11-1.06 1.06L.47 8.53a.75.75 0 010-1.06l4.25-4.25zm6.56 0a.75.75 0 10-1.06 1.06L13.94 8l-3.72 3.72a.75.75 0 101.06 1.06l4.25-4.25a.75.75 0 000-1.06l-4.25-4.25z"></path>
                                    </svg>
                                    <span>Code</span>
                                </button>
                            </li>
                            <li class="pb-1 border-b-2 border-transparent">
                                <button class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                        <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path><path fill-rule="evenodd" d="M8 0a8 8 0 100 16A8 8 0 008 0zM1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0z"></path>
                                    </svg>
                                    <span>Issues</span>
                                </button>
                            </li>
                            <li class="pb-1 border-b-2 border-transparent">
                                <button class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                        <path fill-rule="evenodd" d="M7.177 3.073L9.573.677A.25.25 0 0110 .854v4.792a.25.25 0 01-.427.177L7.177 3.427a.25.25 0 010-.354zM3.75 2.5a.75.75 0 100 1.5.75.75 0 000-1.5zm-2.25.75a2.25 2.25 0 113 2.122v5.256a2.251 2.251 0 11-1.5 0V5.372A2.25 2.25 0 011.5 3.25zM11 2.5h-1V4h1a1 1 0 011 1v5.628a2.251 2.251 0 101.5 0V5A2.5 2.5 0 0011 2.5zm1 10.25a.75.75 0 111.5 0 .75.75 0 01-1.5 0zM3.75 12a.75.75 0 100 1.5.75.75 0 000-1.5z"></path>
                                    </svg>
                                    <span>Pull Requests</span>
                                </button>
                            </li>
                            <li class="pb-1 border-b-2 border-transparent">
                                <button class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                        <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM6.379 5.227A.25.25 0 006 5.442v5.117a.25.25 0 00.379.214l4.264-2.559a.25.25 0 000-.428L6.379 5.227z"></path>
                                    </svg>
                                    <span>Actions</span>
                                </button>
                            </li>
                            <li class="pb-1 border-b-2 border-transparent">
                                <button class="px-3 py-1.5 hover:bg-white/10 text-gray-300 font-medium rounded-md text-[14px] flex justify-center items-center gap-2">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400">
                                        <path fill-rule="evenodd" d="M0 1.75C0 .784.784 0 1.75 0h12.5C15.216 0 16 .784 16 1.75v12.5A1.75 1.75 0 0114.25 16H1.75A1.75 1.75 0 010 14.25V1.75zM1.5 6.5v7.75c0 .138.112.25.25.25H5v-8H1.5zM5 5H1.5V1.75a.25.25 0 01.25-.25H5V5zm1.5 1.5v8h7.75a.25.25 0 00.25-.25V6.5h-8zm8-1.5h-8V1.5h7.75a.25.25 0 01.25.25V5z"></path>
                                    </svg>
                                    <span>Projects</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="lg:w-10/12 md:w-7/12 w-full mx-auto flex flex-wrap">
                <div class="left md:w-3/12 w-full">
                    <div class="mt-8">
                        <UserProfile></UserProfile>
                    </div>
                </div>
                <div class="left md:w-9/12 w-full">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Octokit } from "@octokit/core";
    import { usersStore } from '../../stores/usersStore'
    import  UserProfile  from '../../components/UserProfile.vue'
    export default {
        name: 'Profile',
        components:{
            UserProfile
        },
        data(){
            return{
                loggedInUser: '',
            }
        },
        setup(){
            const store = usersStore()

            return {
                // you can return the whole store instance to use it in the template
                store,
            }
        },
        mounted(){
            setTimeout(() => {
                this.getloggedInUser();
            }, 800)
        },
        methods:{
            getloggedInUser(){
                this.loggedInUser = this.store.gitHubUser
            }
            
        }
    }
</script>