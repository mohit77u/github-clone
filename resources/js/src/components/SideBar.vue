<template>
    <div class="sidebar md:w-[250px] lg:w-[350px] w-full md:sticky md:left-0 md:top-0 md:z-40 md:min-h-[50vh] md:max-h-[100vh] bg-[#0d1117] border-r border-gray-700 py-5 lg:px-8 px-4 overflow-y-auto relative">
        <div class="loading" v-if="repoLoading"></div>
        <div v-else>
            <div class="top flex flex-wrap items-center justify-between">
                <h3 class="text-md font-semibold text-gray-300">Top Repository</h3>
                <router-link :to="{name: 'CreateNewRepo'}" class="bg-green-primary px-3 py-1.5 text-sm rounded-md text-white flex items-center justify-center gap-x-1">
                    <svg aria-hidden="true" fill="white" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo">
                        <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                    </svg>
                   <span>New</span>
                </router-link>
            </div>
            <!-- search input -->
            <input type="text" placeholder="Find repository..." class="my-2 border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-dark-main text-gray-300" @keypress="searchRepo($event)">
    
            <!-- repositories data -->
            <div class="repositories pt-2 pb-12">
                <div class="repo py-1.5" v-for="(repo, index) in repositories.slice(0, this.showMore ? -1 : 7)" :key="index">
                    <router-link :to="{name: 'RepositorySingle', params: {username: repo.owner.login, repository: repo.name}}" class="flex items-center">
                        <img :src="repo.owner.avatar_url" :alt="repo.name" class="w-5 h-5 rounded-full">
                        <h4 class="text-gray-300 text-[14px] ml-2 hover:underline underline-offset-2">{{repo.full_name}}</h4>
                    </router-link>
                </div>
    
                <div v-if="repositories.length >= 7">
                    <button class="text-gray-500 text-xs my-4 hover:text-blue-500" @click="showMoreRepo" v-if="(!showMore && !loading)">{{ loading ? 'Loading more...' : 'Show more' }}</button>
                    <button class="text-gray-500 text-xs my-4 hover:text-blue-500" @click="showMoreRepo" v-else>{{ loading ? 'Loading more...' : 'Hide more' }}</button>
                </div>
    
                <div class="recent py-4">
                    <h3 class="text-md text-gray-300">Recent activity</h3>
                    <div class="p-4 border border-dashed border-gray-700 rounded mt-4">
                        <p class="text-xs text-gray-400 leading-5">When you take actions across GitHub, we???ll provide links to that activity here.</p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</template>

<script>
    import { Octokit } from "@octokit/core";
    import { usersStore } from '../stores/usersStore'
    export default {
        name: 'Sidebar',
        props: ['refresh', 'user'],
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
                loading: false,
                showMore: false,
                repoLoading: true,
                
            }
        },
        watch: {
            user: function(newVal, oldVal){
                this.getRepository();
            }
        },
        mounted(){
            setTimeout(()=> {
                this.getRepository();
            }, 500)
        }, 
        methods:{
            // getRepository of auth user from api
            async getRepository(){
                if (this.user.access_token) {
                    const octokit = new Octokit({
                        auth: this.store.user.access_token
                    })
                    await octokit.request('GET /users/{username}/repos', {
                        username: this.store.user.username
                    })
                    .then((res) => {
                        this.repositories = res.data
                        this.repoLoading = false
                    }).catch((err) => {
                        console.log(err)
                        this.repoLoading = false
                    })
                } else {
                    this.repoLoading = false
                }
            },
            // showMore repositories
            showMoreRepo(){
                this.loading = !this.loading
                this.showMore = !this.showMore
                this.loading = false
            },
            // search repo 
            searchRepo(e){
                this.showMore = true
                let value = e.target.value
                var repositories = this.repositories
                repositories = repositories.filter((repo) => {
                    return repo.full_name.includes(value)
                })
                
                this.repositories = repositories
            }
        }
    }
</script>
