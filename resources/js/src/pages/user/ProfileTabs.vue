<template>
    <div>
        <div class="content px-3">
            <h4 class="text-gray-300 font-medium mb-3 text-[16px] mt-5">Tabs</h4>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ProfileTab',
        data(){
            return{
                tab: this.$route.query.tab
            }
        },
        watch: {
            // $route(){
            //     this.tab = this.$route.query.tab
            //     if(this.$route.query.tab == undefined){
            //         this.tab = 'profile'
            //     }
            // },
            '$route': {
                handler: function() {
                    console.log(this.$route.query.tab)
                    this.tab = this.$route.query.tab
                    if(this.$route.query.tab == undefined){
                        this.tab = 'profile'
                    }
                },
                deep: true,
                immediate: true
            }
        },
        created(){
            if(this.$route.query.tab == undefined){
                this.tab = 'profile'
            }
        },
    }
</script>