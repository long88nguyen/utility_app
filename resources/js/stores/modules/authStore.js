import { defineStore } from 'pinia'

import { pinia } from "../index.js";
import { commonStore } from './commonStore';
import service from "../../services/service";


const common = commonStore(pinia);

export const authStore = defineStore({
    id:'auth',
    namespaced: true,
    state: () => ({
        token: null,
        user: null,
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

        async resetPass(params) {
            const res = await service.post("/api/reset-password", params);
            return res;
        },

        async verifyResetRequest(params) {
            return await service.get("/api/verify-reset-request", params);
        },

        async changePass(params) {
            const res = await service.post("/api/change-password", params);
            
            return res;
        },

    },

    getters: {
        isLogin(){
            return this.token != null;
        }
    },

    persist: true,
    
})
