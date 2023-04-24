import { defineStore } from 'pinia'

import axios from "../axios"

export const memberStore = defineStore("member",{
    state: () => ({
        members:[],
    }),
    getters: {
        getMembers(state){
            return state.members
          }
    },
    actions: {
        async fetchMembers() {
            try {
              const data = await axios.get('/api/members')
                this.members = data.data
              }
              catch (error) {
                console.log(error)
            }
          }
    },
})