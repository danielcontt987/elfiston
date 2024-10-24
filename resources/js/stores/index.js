import Vue from "vue";
import Vuex from "vuex";
import ubication from "./ubication";
import category from "./category";
import business from "./business";
import schedule from "./schedule";
import alert from "./alert";




Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        ubication,
        category,
        business,
        schedule,
        alert,
    }
});    

export default store;