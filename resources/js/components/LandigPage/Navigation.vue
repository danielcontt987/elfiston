<template>
    <div>
      <v-navigation-drawer
        v-model="drawer"
        app
        temporary
        dark
      >
        <v-list>
          <v-list-item>
            <v-list-item-avatar>
              <img src="../../../../public/images/logo.png" alt="Logo" />
            </v-list-item-avatar>
            <v-list-item-content>
              <v-list-item-title class="title">Calango</v-list-item-title>
              <v-list-item-subtitle>WEB</v-list-item-subtitle>
            </v-list-item-content>
          </v-list-item>
        </v-list>
  
        <v-divider />
  
        <v-list dense>
          <v-list-item
            v-for="([icon, text, link], i) in items"
            :key="i"
            link
            @click="$vuetify.goTo(link)"
          >
            <v-list-item-icon class="justify-center">
              <v-icon>{{ icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title class="subtitile-1">{{
                text
              }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-navigation-drawer>
  
      <v-app-bar
        app
        :color="color"
        :flat="flat"
        dark
        class="px-15"
        :class="{ expand: flat }"
      >
        <v-toolbar-title>
          <v-img src="../../../../images/logo.png" max-width="50px" />
        </v-toolbar-title>
        <v-spacer />
        <v-app-bar-nav-icon
          @click.stop="drawer = !drawer"
          class="mr-4"
          v-if="isXs"
        />
        <div v-else>
          <v-btn text @click="$vuetify.goTo('#services')">
            <span class="mr-2">Nuestros servicios</span>
          </v-btn>
          <v-btn text @click="$vuetify.goTo('#download')">
            <span class="mr-2">Descargas</span>
          </v-btn>
          <v-btn text @click="goTolist">
            <span class="mr-2">Haz tu fieston</span>
          </v-btn>
          <v-btn rounded outlined text @click="$vuetify.goTo('#contact')">
            <span class="mr-2">Contactenos</span>
          </v-btn>
        </div>
      </v-app-bar>
    </div>
  </template>
  
  <style scoped>
  .v-toolbar {
    transition: 0.6s;
  }
  
  .expand {
    height: 80px !important;
    padding-top: 10px;
  }
  </style>
  
  <script>
  export default {
    data: () => ({
      drawer: null,
      isXs: false,
      items: [
        ["mdi-home-outline", "Nuestros servicios", "#services"],
      ],
    }),
    props: {
      color: String,
      flat: Boolean,
    },
    methods: {
      onResize() {
        this.isXs = window.innerWidth < 850;
      },

      goTolist(){
        this.$router.push({ path: '/listado-de-servicios' });
      }
    },
  
    watch: {
      isXs(value) {
        if (!value) {
          if (this.drawer) {
            this.drawer = false;
          }
        }
      },
    },
    mounted() {
      this.onResize();
      window.addEventListener("resize", this.onResize, { passive: true });
    },
  };
  </script>
  