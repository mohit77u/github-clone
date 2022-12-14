<template>
    <div class="relative">
        <div class="content px-3">
            <h4 class="text-gray-300 font-medium mb-3 text-[16px] mt-5">Popular repositories</h4>
            <div class="repositories grid sm:grid-cols-2 grid-cols-1 gap-6 my-5">
                <div class="single-repo border flex justify-between items-start px-5 pt-4 pb-10 border-gray-800 rounded" v-for="(repo,index) in repositories.slice(0,4)" :key="index">
                    <router-link :to="repo.full_name" class="text-blue-400 font-medium text-sm hover:underline underline-offset-2">{{repo.name}}</router-link>
                    <span class="border border-gray-700 rounded-full text-gray-400 ml-2 px-2 text-[11px] py-0.5">{{repo.private ? 'Private' : 'Public'}}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { Octokit } from "@octokit/core";
    import { usersStore } from '../../../stores/usersStore'
    import  UserProfile  from '../../../components/UserProfile.vue'
    export default {
        name: 'Profile',
        components:{
            UserProfile
        },
        data(){
            return{
                loggedInUser: '',
                repositories: '',
            }
        },
        setup(){
            const store = usersStore()

            return {
                // you can return the whole store instance to use it in the template
                store,
            }
        },
        created(){
            console.log(this.$route.query.tab)
        },
        mounted(){
            setTimeout(() => {
                this.getloggedInUser();
            }, 800)

            setTimeout(()=> {
                this.getRepository();
            }, 500)
        },
        methods:{
            getloggedInUser(){
                this.loggedInUser = this.store.gitHubUser
            },
            async getRepository(){
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
            },
            
        }
    }
</script>