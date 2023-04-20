import { createRouter, createWebHistory } from "vue-router";

import ContentPage from "../components/commons/Content.vue"
import NotFound from "../components/NotFound.vue"
import BMIIndex from '../components/BMI/Index.vue'

const routes = [
    {
        path: '/login',
        component: import('../components/Authentication/Login.vue'),
        name: 'login',
    },
    {
        path: '/register',
        component: import('../components/Authentication/Register.vue'),
        name: 'register',
    },
    {
        path: '/',
        component: import('../components/Dashboard.vue'),
        name: 'dashboard',
        children: [
            {
                path: '',
                component: import('../components/Pages/OptionFeature.vue'),
                name: 'IndexBMI',
            },
            {
                path: '/bmi',
                component: BMIIndex,
                name: "BMIIndex",
                children: [
                    {
                        path: '',
                        component: import('../components/BMI/components/ListOptionBMI.vue'),
                        name: 'ListOptionBMI',
                    },
                    {
                        path: 'compare-bmi',
                        component: import('../components/BMI/components/CompareBMI.vue'),
                        name: 'CompareBMI',
                    },
                    {
                        path: 'calculator-bmi',
                        component: import('../components/BMI/components/BMICalculator.vue'),
                        name: 'BMICalculator',
                    },
                    {
                        path: 'compare-bmi',
                        component: import('../components/BMI/components/CompareBMI.vue'),
                        name: 'CompareBMI',
                    }
                ]
            }

        ]
    },
    {
        path: '/not-found',
        component: NotFound,
        name: "NotFoundPage",
    },

]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;