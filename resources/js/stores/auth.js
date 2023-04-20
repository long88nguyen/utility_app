import { defineStore } from 'pinia'

import axios from "axios"
import Cookies from "js-cookie";
import router from '../router';

export const authStore = defineStore("auth", {
    state: () => ({
        account: [],
        email: null,
        password: null,
        token: Cookies.get("access_token") ? Cookies.get("access_token") : '',
    }),
    getters: {
        getAccount(state) {
            return state.account
        }
    },
    actions: {
        async login() {
            await axios.post('/api/login', {
                email: this.email,
                password: this.password
            }).then((response) => {
                let cookieOptions = { expires: response.data.expires_in / 86400 }
                Cookies.set("access_token", response.data.access_token, cookieOptions)
                router.push('/')
            }).catch((error) => {
                console.log(error);
                alert(error.message)
            })
        },

        async register(payload){
            await axios.post()
        }
    },
    
})
