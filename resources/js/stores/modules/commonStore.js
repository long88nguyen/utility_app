import {defineStore} from "pinia";

export const commonStore = defineStore({
    namespaced: true,
    id: 'common',
    state: () => ({
        isCallingApi: false
    }),
    actions: {

    },
    getters: {
        getIsCallingApi: (state) => state.isCallingApi
    }
})