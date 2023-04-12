import './bootstrap';

import AppPage from './App.vue'
import { createApp } from 'vue';
import { createI18n } from 'vue-i18n'
import router from './router'

import Antd from "ant-design-vue";
import "ant-design-vue/dist/antd.css";

const app = createApp(AppPage);
app.use(Antd)
app.use(router)
app.mount('#app')