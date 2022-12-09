<template>
    <div class="app">
        <!-- top header -->
        <Header />
        <router-view></router-view>
    </div>
</template>

<script>
    import Header from './components/Header.vue';
    export default {
        name: 'AppComponent', 
        components: {
            Header,
        },
        data(){
            return{
                
            }
        },
        methods: {
        }
    }
</script>
