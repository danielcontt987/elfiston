// app.js
import Vue from "vue";
import vuetify from "./plugins/vuetify";

Vue.component('app', require('./components/App.vue').default);


const app = new Vue({
  el: "#app",
  vuetify,
  data: () => {
    return {
      show1: false,
    };
  },
  mounted() {
    setTimeout(() => (document.body.className += "loaded"), 10);
  },
});
