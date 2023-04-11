<template>
    <HeaderVue/>
    <ContentVue/>
    <FooterVue/>
    </template>

<script>
import HeaderVue from './commons/Header.vue';
import ContentVue from './commons/Content.vue';
import FooterVue from './commons/Footer.vue';

export default {
    components:{
        HeaderVue,
        ContentVue,
        FooterVue
    }
}
</script>

<style>

</style>