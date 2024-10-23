// app.js
import Vue from "vue";
import vuetify from "./plugins/vuetify";
import router from "./routers";
import store from "./stores";

import VueRouter from "vue-router";
import VueMoment from "vue-moment";
import moment from "moment";
import "./filters";

moment.locale("es");
Vue.component('app', require('./components/App.vue').default);

const originalPush = VueRouter.prototype.push;
VueRouter.prototype.push = function push(location) {
  return originalPush.call(this, location).catch((err) => err);
};

Vue.use(VueRouter);
Vue.use(VueMoment,{ moment });

const app = new Vue({
  el: "#app",
  vuetify,
  router,
  store,
  data: () => {
    return {
      show1: false,
    };
  },
  mounted() {
    setTimeout(() => (document.body.className += "loaded"), 10);
  },
});
