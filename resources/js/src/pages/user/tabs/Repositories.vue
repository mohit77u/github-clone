<template>
    <div>
        <div class="content px-3">
            <div class="repos">
                <div class="top-repo flex flex-wrap justify-between items-center my-5">
                    <div class="search lg:w-5/12 xl:w-6/12 2xl:w-6/12 w-full">
                        <input type="text" placeholder="Find a repository..." class="border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-[15px] rounded w-full bg-dark-main text-gray-300" v-model="search">
                    </div>

                    <div class="right w-full lg:w-7/12 xl:w-6/12 2xl:w-6/12 mt-4 lg:mt-0 flex flex-col lg:flex-row justify-between lg:justify-end lg:gap-2">
                        <div class="w-full lg:w-auto flex items-center justify-between gap-2">
                            <button class="lg:w-auto w-full lg:px-4 px-2 lg:py-1.5 py-1 text-gray-400 border border-gray-700 rounded-md text-[12px] hover:border-gray-400 bg-white/5 flex justify-center items-center gap-2">
                                <span class="flex items-center font-semibold text-center text-gray-300">Type<span class="dropdown-caret ml-2"></span></span>
                            </button>
                            <button class="lg:w-auto w-full lg:px-4 px-2 lg:py-1.5 py-1 text-gray-400 border border-gray-700 rounded-md text-[12px] hover:border-gray-400 bg-white/5 flex justify-center items-center gap-2">
                                <span class="flex items-center font-semibold text-center text-gray-300">Language<span class="dropdown-caret ml-2"></span></span>
                            </button>
                        </div>
                        <div class="w-full lg:w-auto flex items-center justify-between gap-2">
                            <button class="mt-4 lg:mt-0 lg-w-auto w-full lg:px-4 px-2 lg:py-1.5 py-1 text-gray-400 border border-gray-700 rounded-md text-[12px] hover:border-gray-400 bg-white/5 flex justify-center items-center gap-2">
                                <span class="flex items-center font-semibold text-center text-gray-300">Sort<span class="dropdown-caret ml-2"></span></span>
                            </button>
                            <router-link :to="{name: 'CreateNewRepo'}" class="mt-4 lg:mt-0 lg-w-auto w-full lg:px-4 px-2 lg:py-1.5 py-1 text-gray-100 rounded-md text-[12px] bg-green-primary flex justify-center items-center gap-2">
                                <svg aria-hidden="true" fill="white" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo">
                                    <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                                </svg>
                                <span class="flex items-center font-semibold text-center text-gray-100">New</span>
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="all-repos grid grid-cols-1 gap-4 my-6">
                    <div class="single-repo border-b flex justify-between items-start pt-4 pb-10 border-gray-800 rounded" v-for="(repo,index) in repositories" :key="index">
                        <div class="left">
                            <div class="flex items-center gap-2">
                                <router-link :to="repo.full_name" class="text-blue-400 font-medium text-lg hover:underline underline-offset-2">{{repo.name}}</router-link>
                                <span class="border border-gray-700 rounded-full text-gray-400 ml-2 px-2 text-[11px] py-0.5">{{repo.private ? 'Private' : 'Public'}}</span>
                            </div>
                            <p class="text-xs text-gray-500 mt-3">Updated {{ moment(repo.updated_at).fromNow() }}</p>
                        </div>
                        <div class="right">
                            <button class="text-gray-400 rounded-md text-[12px] bg-white/5 flex justify-between items-center">
                                <div class="flex gap-2 justify-between items-center px-4 border border-r-transparent border-gray-700 rounded-r-none rounded-md hover:border-gray-400">
                                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" :class="repo.stargazers_count > 0 ? 'fill-yellow-300' : 'fill-gray-400'">
                                        <path fill-rule="evenodd" d="M8 .25a.75.75 0 01.673.418l1.882 3.815 4.21.612a.75.75 0 01.416 1.279l-3.046 2.97.719 4.192a.75.75 0 01-1.088.791L8 12.347l-3.766 1.98a.75.75 0 01-1.088-.79l.72-4.194L.818 6.374a.75.75 0 01.416-1.28l4.21-.611L7.327.668A.75.75 0 018 .25zm0 2.445L6.615 5.5a.75.75 0 01-.564.41l-3.097.45 2.24 2.184a.75.75 0 01.216.664l-.528 3.084 2.769-1.456a.75.75 0 01.698 0l2.77 1.456-.53-3.084a.75.75 0 01.216-.664l2.24-2.183-3.096-.45a.75.75 0 01-.564-.41L8 2.694v.001z"></path>
                                    </svg>
                                    <span class="flex items-center font-semibold py-1">Star</span>
                                </div>
                                <span class="border border-gray-700 rounded-l-none rounded-md hover:border-gray-400 w-9 h-7 leading-[43px]"><span class="dropdown-caret "></span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Octokit } from "@octokit/core";
    import { usersStore } from '../../../stores/usersStore'
    import moment from 'moment'
    export default {
        name: 'Repositories',
        setup() {
            const store = usersStore()
            return {
                store,
            }
        },
        data(){
            return{
                repositories: '',
                search: '',
                
            }
        },
        watch: {
            search: function(value){
                this.searchRepo(value);
            }
        },

        mounted(){
            setTimeout(()=> {
                this.getRepository();
            }, 500)
        }, 
        methods:{
            moment(date) {
                return moment(date);
            },
            // getRepository of auth user from api
            async getRepository(){
                const octokit = new Octokit({
                    auth: this.store.user.access_token
                })
                await octokit.request('GET /users/{username}/repos', {
                    username: this.store.user.username
                })
                .then((res) => {
                    this.repositories = res.data
                }).catch((err) => {
                    console.log(err)
                })
            },
            // showMore repositories
            // showMoreRepo(){
            //     this.loading = !this.loading
            //     this.showMore = !this.showMore
            //     this.loading = false
            // },
            // search repo 
            searchRepo(value){
                value = value.toLowerCase();
                let filtered_repo = this.repositories.filter(function(user, index){
                    user.name = user.name.toLowerCase();
                    console.log(user, index)
                    return user.name.includes(value)
                });
                
                this.repositories = filtered_repo
            }
        }
    }
</script>
