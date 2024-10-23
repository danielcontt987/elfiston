import axios from "axios";

const types = {
    SET_MUNICIPALITIES: "SET_MUNICIPALITIES",
};

const state = {
    municipalities: [],
};

const actions = {
    listMunicipalities({commit}){
        axios.get('municipality/list')
             .then((response) =>{
            commit(types.SET_MUNICIPALITIES, response.data.municipality);
        })
    }
};

const mutations = {
    [types.SET_MUNICIPALITIES](state, payload) {
        state.municipalities = payload;
    },
};

export default {
    namespaced: true,
    state,
    actions,
    mutations
}
