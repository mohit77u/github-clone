<template>
    <div class="relative">
        <div class="loading" v-if="profileLoading"></div>
        <div class="profile" v-else>
            <img :src="loggedInUser.avatar_url" :alt="loggedInUser.login" class="rounded-full">
            <h2 class="text-gray-300 text-2xl mt-5 font-semibold">{{ loggedInUser.name }}</h2>
            <p class="text-gray-400 text-lg mb-1 font-light">{{ loggedInUser.login }}</p>
            <p class="bio text-gray-300 text-md mt-3 mb-1">{{ loggedInUser.bio }}</p>
            <button class="w-full px-2 py-1 mt-4 border border-gray-700 bg-white/5 text-gray-300 font-medium rounded text-[15px] flex justify-center items-center gap-2">
                Edit profile
            </button>
    
            <div class="flex items-center flex-wrap gap-2 mt-5">
                <div class="flex items-center text-gray-400 text-sm">
                    <svg text="muted" aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="fill-gray-400 mt-1">
                        <path fill-rule="evenodd" d="M5.5 3.5a2 2 0 100 4 2 2 0 000-4zM2 5.5a3.5 3.5 0 115.898 2.549 5.507 5.507 0 013.034 4.084.75.75 0 11-1.482.235 4.001 4.001 0 00-7.9 0 .75.75 0 01-1.482-.236A5.507 5.507 0 013.102 8.05 3.49 3.49 0 012 5.5zM11 4a.75.75 0 100 1.5 1.5 1.5 0 01.666 2.844.75.75 0 00-.416.672v.352a.75.75 0 00.574.73c1.2.289 2.162 1.2 2.522 2.372a.75.75 0 101.434-.44 5.01 5.01 0 00-2.56-3.012A3 3 0 0011 4z"></path>
                    </svg>
                    <span class="ml-1"><span class="text-white">{{loggedInUser.followers}}</span> follower</span>
                    <span class="mx-1">.</span>
                    <span class=""><span class="text-white">{{loggedInUser.following}}</span> following</span>
                </div>
            </div>
    
            <div class="flex items-center flex-wrap gap-2 mt-5">
                <div class="flex items-center text-gray-300 text-sm">
                    <svg class="fill-gray-400" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true">
                        <path fill-rule="evenodd" d="M11.536 3.464a5 5 0 010 7.072L8 14.07l-3.536-3.535a5 5 0 117.072-7.072v.001zm1.06 8.132a6.5 6.5 0 10-9.192 0l3.535 3.536a1.5 1.5 0 002.122 0l3.535-3.536zM8 9a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                    <span class="ml-1">{{loggedInUser.location}}</span>
                </div>
            </div>
        </div>
    </div>
    
</template>

<script>
    import { usersStore } from '../stores/usersStore'
    export default {
        name: 'Profile',
        data() {
            return {
                loggedInUser: '',
                profileLoading: true
            }
        },
        setup() {
            const store = usersStore()

            return {
                // you can return the whole store instance to use it in the template
                store,
            }
        },
        mounted() {
            setTimeout(() => {
                this.getloggedInUser();
            }, 800)
        },
        methods: {
            getloggedInUser() {
                this.loggedInUser = this.store.gitHubUser
                this.profileLoading = false
            }

        }
    }
</script>
