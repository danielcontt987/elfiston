import axios from "axios";

const types = {
    SET_CATEGORIES: "SET_CATEGORIES",
};

const state = {
    categories: [],
};

const actions = {
    listCategories({commit}){
        axios.get('category/list')
             .then((response) =>{
            commit(types.SET_CATEGORIES, response.data.categories);
        })
    }
};

const mutations = {
    [types.SET_CATEGORIES](state, payload) {
        state.categories = payload;
    },
};

export default {
    namespaced: true,
    state,
    actions,
    mutations
}
