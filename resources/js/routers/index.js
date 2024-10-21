import Vue from "vue";
import VueRouter from "vue-router";


let Service = Vue.component(
    "ListService",
    require("../components/Service/ListService.vue").default
);

const routes = [
    {
        path: "/listado-de-servicios",
        name: "ListService",
        component: Service,
      },
];


const router = new VueRouter({
    mode: "history",
    routes,
    scrollBehavior() {
      return { x: 0, y: 0 };
    },
  });
  
  export default router;