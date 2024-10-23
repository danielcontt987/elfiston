import axios from "axios";

const types = {
    SET_BUSINESS: "SET_BUSINESS",
    SET_GET_BUSINESS: "SET_GET_BUSINESS",
};

const state = {
    business: [],
    getBusiness: null,
};

const actions = {
    listBusiness({commit}){
        axios.get('business/list')
             .then((response) =>{
            commit(types.SET_BUSINESS, response.data.business);
        })
    },
    setBusiness({commit}, payload){
        commit(types.SET_GET_BUSINESS, payload)
    }
};

const mutations = {
    [types.SET_BUSINESS](state, payload) {
        state.business = payload;
    },
    [types.SET_GET_BUSINESS](state, payload) {
        state.getBusiness = payload;
    },
};

export default {
    namespaced: true,
    state,
    actions,
    mutations
}
