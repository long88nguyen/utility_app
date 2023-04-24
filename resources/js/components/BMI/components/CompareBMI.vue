<template>
    <div class="compare">
        <h1>Compare BMI</h1>

        <h4>
           {{ authList}}?
        </h4>
    </div>  
    
</template>

<script>
import { ref, onMounted, computed } from "vue";
import { memberStore } from "../../../stores/modules/memberStore";
import { authStore } from "../../../stores/modules/authStore";
export default {
    setup(){
        const getMemberStore = memberStore();
        const auth = authStore();

        // const getMembers = computed(() => {
        // return getMemberStore.getMembers;
        // });
        const members = computed(() => {
        return getMemberStore.members;
        });

        const authList = computed(() => {
        return auth.token;
        });

        onMounted(() => {
            fetchDataMember();
        });

        const fetchDataMember = () => {
            getMemberStore.fetchDataMembers().then(()=>{
            }).catch(() => {
            });
        }


        return {
            getMemberStore,
            members,
            auth,
            authList,
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