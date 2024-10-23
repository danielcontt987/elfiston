import Vue from "vue";
import Vuex from "vuex";
import ubication from "./ubication";
import category from "./category";
import business from "./business";




Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        ubication,
        category,
        business
    }
});    

export default store;