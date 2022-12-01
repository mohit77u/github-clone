<template>
    <div class="sidebar md:w-[383px] w-full md:fixed static md:left-0 md:top-16 md:z-40 md:h-full bg-white/5 border-r border-gray-700 py-5 px-8 overflow-y-auto">
        <div class="top flex flex-wrap items-center justify-between">
            <h3 class="text-md text-gray-300">Top Repository</h3>
            <button class="bg-green-primary px-2 py-1 text-sm rounded text-white flex items-center justify-center gap-x-1">
                <svg aria-hidden="true" fill="white" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-repo">
                    <path fill-rule="evenodd" d="M2 2.5A2.5 2.5 0 014.5 0h8.75a.75.75 0 01.75.75v12.5a.75.75 0 01-.75.75h-2.5a.75.75 0 110-1.5h1.75v-2h-8a1 1 0 00-.714 1.7.75.75 0 01-1.072 1.05A2.495 2.495 0 012 11.5v-9zm10.5-1V9h-8c-.356 0-.694.074-1 .208V2.5a1 1 0 011-1h8zM5 12.25v3.25a.25.25 0 00.4.2l1.45-1.087a.25.25 0 01.3 0L8.6 15.7a.25.25 0 00.4-.2v-3.25a.25.25 0 00-.25-.25h-3.5a.25.25 0 00-.25.25z"></path>
                </svg>
               <span>New</span>
            </button>
        </div>
        <!-- search input -->
        <input type="text" placeholder="Find repository..." class="my-4 border border-gray-700 focus:border-blue-400 focus:outline focus:ring-blue-400 px-3 py-1 text-sm rounded w-full bg-transparent text-gray-300">

        <!-- repositories data -->
        <div class="repositories pb-12">
            <div class="repo py-1.5" v-for="(repo, index) in repositories" :key="index">
                <a href="#" class="flex items-center">
                    <img :src="repo.owner.avatar_url" :alt="repo.name" class="w-5 h-5 rounded-full">
                    <h4 class="text-gray-300 text-sm ml-2">{{repo.full_name}}</h4>
                </a>
            </div>

            <button class="text-gray-500 text-xs my-4 hover:text-blue-500" @click="showMoreRepo" v-if="(!showMore && !loading)">{{ loading ? 'Loading more...' : 'Show more' }}</button>
            <button class="text-gray-500 text-xs my-4 hover:text-blue-500" @click="showMoreRepo" v-else>{{ loading ? 'Loading more...' : 'Hide more' }}</button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Sidebar',
    data(){
        return{
            repositories: '',
            loggedInUser: '',
            loading: false,
            showMore: false,
        }
    },
    // watch: {
    //     showMore: function(){
    //         this.getUser();
    //     }
    // },
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
                this.loggedInUser = res.data.user
                this.getRepository(res.data.user);
            }).catch((err) => {
                console.log(err)
            })
        },
        getRepository(user){
            axios.get('https://api.github.com/users/' + user.username + '/repos')
            .then((res) => {
                this.repositories = res.data
                console.log(this.repositories)
                this.repositories = this.repositories.slice(0, this.showMore ? -1 : 7)
            }).catch((err) => {
                console.log(err)
            })
        },
        showMoreRepo(){
            this.loading = !this.loading
            this.showMore = !this.showMore
            setTimeout(() => {
                this.getUser();
                this.loading = false
            }, 300)
        }
    }
}
</script>
