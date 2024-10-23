import Vue from "vue";
import VueRouter from "vue-router";


let Service = Vue.component(
    "ListService",
    require("../components/Service/ListService.vue").default
);

let ServiceDetail = Vue.component(
  "ServiceDetail",
  require("../components/Service/ServiceDatail.vue").default
);

const routes = [
    {
      path: "/listado-de-servicios",
      name: "Listado de servicios",
      component: Service,
    },
    {
      path: "/detalle-del-servicio",
      name: "Detalle del servicio",
      component: ServiceDetail,
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