import { defineStore } from 'pinia';

export const useCounterStore = defineStore('count', {
    state: () => ({
        counter: 12
    }),

    getters: {
        doubleCount: state => state.counter * 2
    },
    
    actions: {
        increment() {
            this.counter++
        },
    }
})