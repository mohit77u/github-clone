<template>
    <div>
        <!-- top header -->
        <Header />

        <!-- main -->
        <section class="main flex flex-wrap px-8">
            <!-- sidebar -->
            <SideBar />
            
            <!-- main -->
            <div class="main-right-content md:ml-[383px] ml-0 p-4 bg-dark-primary">

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

        }
    },
    created(){

    },
    methods:{
        
    },
    
}
</script>
