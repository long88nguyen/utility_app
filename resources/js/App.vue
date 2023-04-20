<template>
    <div class="utility_app">
        <router-view></router-view>
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

</style>