<template>
    <div class="relative px-6">
        <div class="loading mt-24" v-if="profileLoading && !loggedInUser.login"></div>
        <div class="profile" v-else>
            <div class="profile-image relative lg:-mt-8 mt-8" v-if="loggedInUser.avatar_url">
                <img :src="loggedInUser.avatar_url" :alt="loggedInUser.login" class="rounded-full max-w-[90%] mx-auto">
                <div class="absolute bg-dark-primary right-3 bottom-7 z-30 px-1 py-1.5 border border-gray-700  rounded-full cursor-pointer" @click="statusPopup = true">
                    <button class="group py-1 px-2 text-gray-500 text-[13px] rounded w-full flex items-center">
                        <svg class="fill-gray-500 group-hover:fill-blue-400" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 8a6.5 6.5 0 1113 0 6.5 6.5 0 01-13 0zM8 0a8 8 0 100 16A8 8 0 008 0zM5 8a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zM5.32 9.636a.75.75 0 011.038.175l.007.009c.103.118.22.222.35.31.264.178.683.37 1.285.37.602 0 1.02-.192 1.285-.371.13-.088.247-.192.35-.31l.007-.008a.75.75 0 111.222.87l-.614-.431c.614.43.614.431.613.431v.001l-.001.002-.002.003-.005.007-.014.019a1.984 1.984 0 01-.184.213c-.16.166-.338.316-.53.445-.63.418-1.37.638-2.127.629-.946 0-1.652-.308-2.126-.63a3.32 3.32 0 01-.715-.657l-.014-.02-.005-.006-.002-.003v-.002h-.001l.613-.432-.614.43a.75.75 0 01.183-1.044h.001z"></path>
                        </svg>
                        <span class="ml-2 group-hover:text-blue-400 hidden group-hover:block">Set Status</span>
                    </button>
                </div>
            </div>
            <div class="profile-details" v-if="!profileEdit">
                <h2 class="text-gray-300 text-2xl mt-5 font-semibold" v-if="loggedInUser.name">{{ loggedInUser.name }}</h2>
                <p class="text-gray-400 text-lg mb-1 font-light">{{ loggedInUser.login }}</p>
                <p class="bio text-gray-300 text-md mt-3 mb-1" v-if="loggedInUser.bio">{{ loggedInUser.bio }}</p>
                <button class="w-full px-2 py-1 mt-4 border border-gray-700 bg-white/5 text-gray-300 font-medium rounded text-[15px] flex justify-center items-center gap-2" @click="profileEdit = true">
                    Edit profile
                </button>
        
                <div class="flex items-center flex-wrap gap-2 mt-5" v-if="loggedInUser.followers > 0">
                    <div class="flex items-center text-gray-400 text-sm">
                        <svg text="muted" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400 mt-1">
                            <path fill-rule="evenodd" d="M5.5 3.5a2 2 0 100 4 2 2 0 000-4zM2 5.5a3.5 3.5 0 115.898 2.549 5.507 5.507 0 013.034 4.084.75.75 0 11-1.482.235 4.001 4.001 0 00-7.9 0 .75.75 0 01-1.482-.236A5.507 5.507 0 013.102 8.05 3.49 3.49 0 012 5.5zM11 4a.75.75 0 100 1.5 1.5 1.5 0 01.666 2.844.75.75 0 00-.416.672v.352a.75.75 0 00.574.73c1.2.289 2.162 1.2 2.522 2.372a.75.75 0 101.434-.44 5.01 5.01 0 00-2.56-3.012A3 3 0 0011 4z"></path>
                        </svg>
                        <span class="ml-1"><span class="text-white">{{loggedInUser.followers}}</span> follower</span>
                        <span class="mx-1">.</span>
                        <span class=""><span class="text-white">{{loggedInUser.following}}</span> following</span>
                    </div>
                </div>

                <div class="flex items-center flex-wrap gap-2 mt-5" v-if="loggedInUser.company">
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M1.5 14.25c0 .138.112.25.25.25H4v-1.25a.75.75 0 01.75-.75h2.5a.75.75 0 01.75.75v1.25h2.25a.25.25 0 00.25-.25V1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25v12.5zM1.75 16A1.75 1.75 0 010 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 00.25-.25V8.285a.25.25 0 00-.111-.208l-1.055-.703a.75.75 0 11.832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0114.25 16h-3.5a.75.75 0 01-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 01-.75-.75V14h-1v1.25a.75.75 0 01-.75.75h-3zM3 3.75A.75.75 0 013.75 3h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 3.75zM3.75 6a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM3 9.75A.75.75 0 013.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 9.75zM7.75 9a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM7 6.75A.75.75 0 017.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 017 6.75zM7.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5z"></path>
                        </svg>
                        <span class="ml-2">{{loggedInUser.company}}</span>
                    </div>
                </div>
        
                <div class="flex items-center flex-wrap gap-2 mt-2" v-if="loggedInUser.location">
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg class="fill-gray-400" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                            <path fill-rule="evenodd" d="M11.536 3.464a5 5 0 010 7.072L8 14.07l-3.536-3.535a5 5 0 117.072-7.072v.001zm1.06 8.132a6.5 6.5 0 10-9.192 0l3.535 3.536a1.5 1.5 0 002.122 0l3.535-3.536zM8 9a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                        <span class="ml-2">{{loggedInUser.location}}</span>
                    </div>
                </div>

                <div class="flex items-center flex-wrap gap-2 mt-2" v-if="loggedInUser.blog">
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                        </svg>
                        <span class="ml-2">{{loggedInUser.blog}}</span>
                    </div>
                </div>

                <div class="flex items-center flex-wrap gap-2 mt-2" v-if="loggedInUser.twitter_username">
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 273.5 222.3" height="16" width="16" class="fill-gray-500 text-gray-500"><title>Twitter</title>
                            <path d="M273.5 26.3a109.77 109.77 0 0 1-32.2 8.8 56.07 56.07 0 0 0 24.7-31 113.39 113.39 0 0 1-35.7 13.6 56.1 56.1 0 0 0-97 38.4 54 54 0 0 0 1.5 12.8A159.68 159.68 0 0 1 19.1 10.3a56.12 56.12 0 0 0 17.4 74.9 56.06 56.06 0 0 1-25.4-7v.7a56.11 56.11 0 0 0 45 55 55.65 55.65 0 0 1-14.8 2 62.39 62.39 0 0 1-10.6-1 56.24 56.24 0 0 0 52.4 39 112.87 112.87 0 0 1-69.7 24 119 119 0 0 1-13.4-.8 158.83 158.83 0 0 0 86 25.2c103.2 0 159.6-85.5 159.6-159.6 0-2.4-.1-4.9-.2-7.3a114.25 114.25 0 0 0 28.1-29.1" fill="currentColor"></path>
                        </svg>
                        <span class="ml-2">@{{loggedInUser.twitter_username}}</span>
                    </div>
                </div>
            </div>
            <div class="edit-profile" v-else>
                <form @submit.prevent="updateUserDetails">
                    <div class="form-group mb-2">
                        <label class="block mb-1.5 font-medium text-gray-100 text-sm">Name</label>
                        <input type="text" placeholder="Name" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.name">
                    </div>
                    <div class="form-group mb-1">
                        <label class="block mb-1.5 font-medium text-gray-100 text-sm">Bio</label>
                        <textarea type="text" placeholder="Add a bio" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" rows="3" v-model="loggedInUser.bio"></textarea>
                    </div>
                    <p class="text-gray-500 text-xs mb-1.5">You can @mention other users and organizations to link to them.</p>
                    <div class="form-group mb-1.5 flex items-center gap-2">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M1.5 14.25c0 .138.112.25.25.25H4v-1.25a.75.75 0 01.75-.75h2.5a.75.75 0 01.75.75v1.25h2.25a.25.25 0 00.25-.25V1.75a.25.25 0 00-.25-.25h-8.5a.25.25 0 00-.25.25v12.5zM1.75 16A1.75 1.75 0 010 14.25V1.75C0 .784.784 0 1.75 0h8.5C11.216 0 12 .784 12 1.75v12.5c0 .085-.006.168-.018.25h2.268a.25.25 0 00.25-.25V8.285a.25.25 0 00-.111-.208l-1.055-.703a.75.75 0 11.832-1.248l1.055.703c.487.325.779.871.779 1.456v5.965A1.75 1.75 0 0114.25 16h-3.5a.75.75 0 01-.197-.026c-.099.017-.2.026-.303.026h-3a.75.75 0 01-.75-.75V14h-1v1.25a.75.75 0 01-.75.75h-3zM3 3.75A.75.75 0 013.75 3h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 3.75zM3.75 6a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM3 9.75A.75.75 0 013.75 9h.5a.75.75 0 010 1.5h-.5A.75.75 0 013 9.75zM7.75 9a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5zM7 6.75A.75.75 0 017.75 6h.5a.75.75 0 010 1.5h-.5A.75.75 0 017 6.75zM7.75 3a.75.75 0 000 1.5h.5a.75.75 0 000-1.5h-.5z"></path>
                        </svg>
                        <input type="text" placeholder="Company" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.company">
                    </div>
                    <div class="form-group mb-1.5 flex items-center gap-2">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M11.536 3.464a5 5 0 010 7.072L8 14.07l-3.536-3.535a5 5 0 117.072-7.072v.001zm1.06 8.132a6.5 6.5 0 10-9.192 0l3.535 3.536a1.5 1.5 0 002.122 0l3.535-3.536zM8 9a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                        <input type="text" placeholder="Location" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.location">
                    </div>
                    <div class="form-group mb-1.5 flex items-center gap-2">
                        <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-500">
                            <path fill-rule="evenodd" d="M7.775 3.275a.75.75 0 001.06 1.06l1.25-1.25a2 2 0 112.83 2.83l-2.5 2.5a2 2 0 01-2.83 0 .75.75 0 00-1.06 1.06 3.5 3.5 0 004.95 0l2.5-2.5a3.5 3.5 0 00-4.95-4.95l-1.25 1.25zm-4.69 9.64a2 2 0 010-2.83l2.5-2.5a2 2 0 012.83 0 .75.75 0 001.06-1.06 3.5 3.5 0 00-4.95 0l-2.5 2.5a3.5 3.5 0 004.95 4.95l1.25-1.25a.75.75 0 00-1.06-1.06l-1.25 1.25a2 2 0 01-2.83 0z"></path>
                        </svg>
                        <input type="text" placeholder="Website" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.blog">
                    </div>
                    <div class="form-group mb-3 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 273.5 222.3" height="16" width="16" class="fill-gray-500 text-gray-500"><title>Twitter</title>
                            <path d="M273.5 26.3a109.77 109.77 0 0 1-32.2 8.8 56.07 56.07 0 0 0 24.7-31 113.39 113.39 0 0 1-35.7 13.6 56.1 56.1 0 0 0-97 38.4 54 54 0 0 0 1.5 12.8A159.68 159.68 0 0 1 19.1 10.3a56.12 56.12 0 0 0 17.4 74.9 56.06 56.06 0 0 1-25.4-7v.7a56.11 56.11 0 0 0 45 55 55.65 55.65 0 0 1-14.8 2 62.39 62.39 0 0 1-10.6-1 56.24 56.24 0 0 0 52.4 39 112.87 112.87 0 0 1-69.7 24 119 119 0 0 1-13.4-.8 158.83 158.83 0 0 0 86 25.2c103.2 0 159.6-85.5 159.6-159.6 0-2.4-.1-4.9-.2-7.3a114.25 114.25 0 0 0 28.1-29.1" fill="currentColor"></path>
                        </svg>
                        <input type="text" placeholder="Twitter username" class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" v-model="loggedInUser.twitter_username">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="bg-green-primary px-3 py-1.5 text-white font-semibold rounded text-xs">Save</button>
                        <button type="button" class="px-2 py-1 border border-gray-700 bg-white/5 text-gray-300 font-medium rounded-md text-[12px] ml-2" @click="profileEdit = false">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- status popup -->
       <StatusPopup v-if="statusPopup" @closePopup="closePopup" />

         <!-- success toast -->
        <div id="toast-success" class="flex fixed sm:right-10 right-2 bottom-5 z-50 items-center sm:px-4 sm:py-4 py-3 px-2 mb-4 w-full max-w-[280px] sm:max-w-xs text-gray-200 rounded bg-[#0d1117]  border border-gray-700 shadow  animate__animated animate__fadeInRight" role="alert" v-if="toast && errorType == 'success'">
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
    import { usersStore } from '../stores/usersStore'
    import { Octokit } from "@octokit/core";
    import StatusPopup from './StatusPopup.vue'
    export default {
        name: 'Profile',
        components: {
            StatusPopup,
        },
        setup() {
            const store = usersStore()

            return {
                // you can return the whole store instance to use it in the template
                store,
            }
        },
        data() {
            return {
                loggedInUser: {},
                profileLoading: true,
                profileEdit: false,
                errorType: '',
                toast: false,
                statusPopup: false,
                clearTimeMenu: false,
                statusExpire: 'Never',
            }
        },
        mounted() {
            setTimeout(() => {
                this.getloggedInUser();
            }, 600)
        },
        methods: {
            // getloggedInUser
            getloggedInUser() {
                this.loggedInUser = this.store.gitHubUser
                this.profileLoading = false
            },
            // update profile
            async updateUserDetails(){
                const octokit = new Octokit({
                    auth: this.store.user.access_token
                })

                await octokit.request('PATCH /user', {
                    name: this.loggedInUser.name,
                    bio: this.loggedInUser.bio,
                    company: this.loggedInUser.company,
                    location: this.loggedInUser.location,
                    blog: this.loggedInUser.blog,
                    twitter_username: this.loggedInUser.twitter_username,
                })
                .then((res) => {
                    this.errorType = 'success'
                    this.toast = 'User details updated successfully.'
                    this.loggedInUser = res.data
                    this.profileEdit = false
                    setTimeout(()=> {
                        this.toast = false
                    }, 4000)
                }).catch((err) => {
                    console.log(err)
                    this.errorType = 'error'
                    this.toast = 'Error on updating successfully.'
                    setTimeout(()=> {
                        this.toast = false
                    }, 4000)
                })
            },
            // clsoe popup
            closePopup(value){
                if(value){
                    this.statusPopup = false
                }
            }

        }
    }
</script>
