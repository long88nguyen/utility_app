import { createRouter,createWebHistory } from "vue-router";

import MainPage from "../components/CalculateMBI/MainPage.vue"
import ContentPage from "../components/commons/Content.vue"
import NotFound from "../components/NotFound.vue";

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
    {
        path: '/not-found',
        component: NotFound,
        name: "NotFoundPage",
    },
   
]

const router = createRouter({
    history:createWebHistory(),
    routes
})

export default router;