import { createRouter, createWebHistory } from "vue-router";

import NotFound from "../components/NotFound.vue"
import BMIIndex from '../components/BMI/Index.vue'
import { authStore } from "../stores/modules/authStore";

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
        path: '/forgot-password',
        component: import('../components/Authentication/ForgotPassword.vue'),
        name: 'forgot-password',
    },
    {
        path: '/change-password',
        component: import('../components/Authentication/ChangePassword.vue'),
        name: 'change-password',
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
                meta:{
                    authGuard:true,
                },
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
                    },
                    {
                        path: 'suggest-health',
                        component: import('../components/BMI/components/SuggestHealth.vue'),
                        name: 'Suggest Health',
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