import { createRouter,createWebHistory } from "vue-router";

import MainPage from "../components/CalculateMBI/MainPage.vue"
import ContentPage from "../components/commons/Content.vue"

const routes = [
    {
        path: '/',
        component: ContentPage,
        name: "ContentPage",
    },
    {
        path: '/calculate',
        component: MainPage,
        name: "CalculateMBI",
    },
]

const router = createRouter({
    history:createWebHistory(),
    routes
})

export default router;