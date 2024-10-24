<template>
  <v-app>
    <Navigation :color="color" :flat="flat" v-if="$route.path === '/'" />
    <v-main class="pt-0" :class="$route.path === '/' ? 'v-main-bg' : 'bg-color'">
      <Home v-if="$route.path === '/'"/>
      <SectionLanding v-if="$route.path === '/'" />
      <Contact v-if="$route.path === '/'" />
      <router-view v-if="$route.path === '/listado-de-servicios' || $route.path === '/detalle-del-servicio'"></router-view>
    </v-main>
    <FooterLanding v-if="$route.path === '/'"/>
    <v-scale-transition>
      <v-btn
        fab
        v-show="fab"
        v-scroll="onScroll"
        dark
        fixed
        bottom
        right
        color="secondary"
        @click="toTop"
      >
        <v-icon>mdi-arrow-up</v-icon>
      </v-btn>
    </v-scale-transition>
  </v-app>
</template>

<style scoped>
.v-main-bg {
  background-image: url("../../../public/img/bgMain.png");
  background-attachment: fixed;
  background-position: center;
  background-size: cover;
}

.v-main {
  font-family: "Montserrat" !important;
}

.bg-color{
  background-color: #f7f7f7;
}
</style>

<script>
import Contact from './LandigPage/Contact.vue';
import FooterLanding from './LandigPage/Footer.vue';
import Home from './LandigPage/Home.vue';
import Navigation from './LandigPage/Navigation.vue';
import SectionLanding from './LandigPage/Section.vue';



export default {
  name: "App",

  components: {
    Navigation,
    Home,
    SectionLanding,
    Contact,
    FooterLanding,
  },

  data: () => ({
    fab: null,
    color: "",
    flat: null,
  }),

  created() {
    const top = window.pageYOffset || 0;
    if (top <= 60) {
      this.color = "transparent";
      this.flat = true;
    }
  },

  watch: {
    fab(value) {
      if (value) {
        this.color = "secondary";
        this.flat = false;
      } else {
        this.color = "transparent";
        this.flat = true;
      }
    },
  },

  methods: {
    onScroll(e) {
      if (typeof window === "undefined") return;
      const top = window.pageYOffset || e.target.scrollTop || 0;
      this.fab = top > 60;
    },
    toTop() {
      this.$vuetify.goTo(0);
    },
  },
};
</script>
