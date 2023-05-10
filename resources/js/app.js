import './bootstrap';

import AppPage from './App.vue'
import { createApp } from 'vue';
import { createI18n } from 'vue-i18n'
import { createPinia } from 'pinia'
import router from './router'

import "sweetalert2/dist/sweetalert2.min.css";
import "./assets/css/custom-sweetalert2.css";
import VueSweetalert2 from "vue-sweetalert2";
import toast from "./helpers/toast.js";

import Antd from "ant-design-vue";
import "ant-design-vue/dist/antd.css";

const app = createApp(AppPage);
const pinia = createPinia();

app.provide("$toast", toast)
app.use(VueSweetalert2)
app.use(Antd)
app.use(pinia)
app.use(router)
app.mount('#app')