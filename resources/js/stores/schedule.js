import axios from "axios";

const types = {
    SET_SCHEDULE: "SET_SCHEDULE",
    SET_STATUS: "SET_STATUS",
};

const state = {
    business: [],
    status: 0,
};

const actions = {
    listSchedule({commit}){
        axios.get('schedule/list')
             .then((response) =>{
            commit(types.SET_SCHEDULE, response.data.schedules);
        })
    },
    storeSchedule({commit}, payload){        
        commit(types.SET_SCHEDULE, 0);
        return new Promise((resolve, reject) => {
            axios.post('schedule/store', payload)
                .then((response) =>{
                commit(types.SET_SCHEDULE, response.data.status);
                resolve(response)
            }).catch((error) => {
                reject(error)
            })
        })
    }
};

const mutations = {
    [types.SET_SCHEDULE](state, payload) {
        state.business = payload;
    },
    [types.SET_STATUS](state, status) {
        state.status = status;
    },
};

export default {
    namespaced: true,
    state,
    actions,
    mutations
}
