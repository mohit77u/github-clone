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
                <h1 class="text-white">Hello</h1>
            </div>
        </section>
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
            user: '',
            githubUser: '',
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
                this.getGithubUser(res.data.user.username);
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
    },
    
}
</script>
