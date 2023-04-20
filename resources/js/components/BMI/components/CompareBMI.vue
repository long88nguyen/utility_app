<template>
    <div class="compare">
        <h1>Compare BMI</h1>

        <h4>
           {{ getMembers}}
        </h4>
    </div>  
    
</template>

<script>
import { ref, onMounted, computed } from "vue";
import { memberStore } from '../../../stores/member'
export default {
    setup(){
        const getMemberStore = memberStore();

        const getMembers = computed(() => {
        return getMemberStore.getMembers;
        });
        const members = computed(() => {
        return getMemberStore.members;
        });
        onMounted(() => {
            fetchDataMember();
        });

        const fetchDataMember = () => {
            getMemberStore.fetchMembers().then(()=>{
            }).catch(() => {
            });
        }


        return {
            getMemberStore,
            getMembers,
            members,
            fetchDataMember
        }
    }
}
</script>

<style lang="scss" scoped>
.compare{
    background: white;
    height: 500px;
}
</style>