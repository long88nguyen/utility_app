<template>
    
    <div class="utility_app">
        <OptionTop/>
        <router-view></router-view>
    </div>
   
</template>

<script>
import OptionTop from  "./components/commons/OptionTop.vue"
import Dashboard from './components/Dashboard.vue';

export default {
    components:{
        Dashboard,
        OptionTop,
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