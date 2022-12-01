<template>
    <div>
        <!-- top header -->
        <Header />

        <!-- main -->
        <section class="main flex flex-wrap px-8 bg-[#010409] min-h-screen">
            <!-- sidebar -->
            <SideBar :user="githubUser" />

            <!-- main -->
            <div class="main-right-content md:ml-[383px] ml-0 p-4 bg-[#010409]">

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
