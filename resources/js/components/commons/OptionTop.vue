<template>
    <div class="option_top">
            <select name="" id="" class="form-control" v-model="selectLanguage" @change="changeselect">
                <option v-for="(item,index) in listLanguage" :value="item.flag" :key="index">{{ item.language }}</option>
            </select>
    </div>
</template>

<script setup>
import { ref,reactive } from 'vue'
import i18n from "../../i18n";
const selectLanguage = ref('en')
const listLanguage = reactive([
    {
        'flag': 'en',
        'language': "English",
    },
    {
        'flag': 'vi',
        'language': "Vietnamese",
    },
    {
        'flag': 'ch',
        'language': "Chinese",
    }
]);

const changeselect = () =>{
    i18n.global.locale.value = selectLanguage.value;
}


</script>

<style scoped lang="scss">
.option_top{
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
    select{
        width: 200px;
        
    }
}
</style>