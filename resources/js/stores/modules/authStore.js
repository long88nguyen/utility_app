import { defineStore } from 'pinia'

import axios from "axios"
import Cookies from "js-cookie";
import router from '../../router';
import { pinia } from "../index.js";
import { commonStore } from './commonStore';
import service from "../../services/service";


const common = commonStore(pinia);

export const authStore = defineStore({
    id:'auth',
    state: () => ({
        user:null,
        token: null,
    }),
 
    actions: {
        async login(params) {
            let url = "/api/login";
            const response = await service.post(url, params);
            if (response.data?.success == true && response.status == 200) {
              this.token = response.data.result.token;
              this.user = response?.data.result.user;
            }
            return response;
          },
    },

    getters: {
        isLogin(){
            return this.token != null;
        }
    },

    persist: true,
    
})
