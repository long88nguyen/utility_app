<template>
    <div class="utility_app">
        <div class="container">
        <Dashboard/>
    </div>
    </div>
   
</template>

<script>
import Dashboard from './components/Dashboard.vue';

export default {
    components:{
        Dashboard
    }
}
</script>

<style>

*{
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
.utility_app{
    background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(uploads/pgss.png) ;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 100vh;
    background-position: center;
}
</style>