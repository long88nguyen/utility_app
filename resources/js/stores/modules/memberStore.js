import { defineStore } from 'pinia'

import axios from "axios"
import Cookies from "js-cookie";
import router from '../../router';
import { pinia } from "../index.js";
import { commonStore } from './commonStore';
import service from "../../services/service";


const common = commonStore(pinia);


export const memberStore = defineStore({
    id:'member',

    state: () => ({
        members:[],
    }),

    actions: {
        async fetchDataMembers(params) {
            let url = "/api/member";
            const response = await service.get(url, params);
            console.log(response.data.result.data);
            if (response.data?.success == true && response.status == 200) {
                this.members = response.data.result.data;
            }
            return response;
        },
    }

});