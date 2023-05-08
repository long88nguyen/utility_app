<template>
    <div class="suggest-health">
    <h1>Suggest</h1>
    <div>
        <a-steps :current="current">
        <a-step v-for="item in steps" :key="item.title" :title="item.title" />
        </a-steps>
        <div class="steps-content">
        {{ steps[current].content }}
        </div>
        <div class="steps-action">
        <a-button v-if="current < steps.length - 1" type="primary" @click="next">Next</a-button>
        <a-button
            v-if="current == steps.length - 1"
            type="primary"
            @click="message.success('Processing complete!')"
        >
            Done
        </a-button>
        <a-button v-if="current > 0" style="margin-left: 8px" @click="prev">Previous</a-button>
        </div>
    </div>
    </div>
</template>

<script setup>
import { ref,reactive } from 'vue';
import { message } from 'ant-design-vue'

const current = ref(0);

const next = () =>{
    current.value++;
}

const prev = () =>{
    current.value--;
}

const steps = reactive([
        {
          title: "First",
          content: "First-content",
        },
        {
          title: "Second",
          content: "Second-content",
        },
]);

</script>

<style>
.suggest-health
{
    background:white;
    height:300px;
}
</style>