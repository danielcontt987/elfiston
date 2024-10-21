// app.js
import Vue from "vue";
import vuetify from "./plugins/vuetify";
import router from "./routers";
import VueRouter from "vue-router";
Vue.component('app', require('./components/App.vue').default);

const originalPush = VueRouter.prototype.push;
VueRouter.prototype.push = function push(location) {
  return originalPush.call(this, location).catch((err) => err);
};

Vue.use(VueRouter);

const app = new Vue({
  el: "#app",
  vuetify,
  router,
  data: () => {
    return {
      show1: false,
    };
  },
  mounted() {
    setTimeout(() => (document.body.className += "loaded"), 10);
  },
});
