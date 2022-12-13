<template>
    <div>
        <div class="content px-3">
            <!-- profile tab -->
            <Profile v-if="tab == 'profile'" />

            <!-- repositories tab -->
            <Repositories v-if="tab == 'repositories'" />

            <!-- Projects tab -->
            <Projects v-if="tab == 'projects'" />

            <!-- Packages tab -->
            <Packages v-if="tab == 'packages'" />

            <!-- Stars tab -->
            <Stars v-if="tab == 'stars'" />
        </div>
    </div>
</template>

<script>
    import Profile from './tabs/Profile.vue'
    import Repositories from './tabs/Repositories.vue'
    import Projects from './tabs/Projects.vue'
    import Packages from './tabs/Packages.vue'
    import Stars from './tabs/Stars.vue'

    export default {
        name: 'ProfileTab',
        components: {
            Profile,
            Repositories,
            Projects,
            Packages,
            Stars
        },
        data(){
            return{
                tab: '',
            }
        },
        watch:{
            $route (to, from){
                var tab = to.query.tab
                if(tab != undefined) {
                    this.tab = tab
                } else {
                    this.tab = 'profile'
                }
            }
        },
        created(){
            if(this.$route.query.tab == undefined){
                this.tab = 'profile'
            } else {
                this.tab = this.$route.query.tab
            }
        },
    }
</script>
