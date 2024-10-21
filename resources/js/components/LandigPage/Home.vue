<template>
  <section id="hero">
    <v-parallax dark src="../../../../images/bg3.jpg" height="750">
      <v-row align="center" justify="center">
        <v-col cols="10">
          <v-row align="center" justify="center">
            <v-col cols="12" md="6" xl="8">
              <h1 class="display-2 font-weight-bold mb-4">Bienvenido a una nueva experiencia.</h1>
              <h1 class="font-weight-light">
                ¡Danos la oportunidad de ofrecerte las mejores opciones para <br>
                realizar tu evento! Afiliate a <br>
                nuestro servicio sin costo de inscripción.
              </h1>
            </v-col>
            <v-col cols="12" md="6" xl="4" class="hidden-sm-and-down"> </v-col>
          </v-row>
        </v-col>
      </v-row>
      <div class="svg-border-waves text-white">
        <v-img src="../../../../public/img/borderWaves.svg" />
      </div>
    </v-parallax>
    <v-container fluid id="services" class="mt-2">
      <v-row align="center" justify="center">
        <v-col cols="12" class="mb-4">
          <h1 class="text-center">Nuestros servicios</h1>
        </v-col>
        <v-col cols="10">
          <v-row align="center" justify="space-around">
            <v-col cols="12" sm="3" class="text-center" v-for="(feature, i) in features" :key="i">
              <v-hover v-slot:default="{ hover }">
                <v-card class="card" shaped :elevation="hover ? 10 : 4" :class="{ up: hover }">
                  <v-avatar color="primary" size="75">
                    <v-icon size="35" color="white">mdi-glass-tulip</v-icon>
                  </v-avatar>
                  <h1 class="font-weight-regular">{{ feature.title }}</h1>
                  <h4 class="font-weight-regular subtitle-1">
                    {{ feature.text }}
                  </h4>
                </v-card>
              </v-hover>
            </v-col>
          </v-row>
        </v-col>
      </v-row>
    </v-container>
    <div class="svg-border-waves">
      <img src="../../../../public/img/wave2.svg" />
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      dialog: false,
      features: [
        {
          img: "https://landingpagecalangoweb.web.app/img/icon2.7e36b0c4.png",
          title: "Brindis",
          text: "Te proporcionamos información acerca de los mejores lugares para la realización de tu brindis!",
        },
        {
          img: "https://landingpagecalangoweb.web.app/img/icon2.7e36b0c4.png",
          title: "Fiestas",
          text: "No importa la temporada ni la tematica de la fiesta, siempre tenemos el lugar para ti!",
        },
        {
          img: "https://landingpagecalangoweb.web.app/img/icon2.7e36b0c4.png",
          title: "Celebraciones",
          text: "¡Siempre hay algo que celebrar y para eso tenemos una amplio catalogo de casinos!",
        },
        {
          img: "https://landingpagecalangoweb.web.app/img/icon2.7e36b0c4.png",
          title: "Eventos",
          text: "¡Tambien para tu evento tenemos ese lugar adecuado y de acuerdo a tu presupuesto!",
        },
      ],
    };
  },
  watch: {
    dialog(value) {
      if (!value) {
        this.pause();
      }
    },
  },
  methods: {

  },
};
</script>

<style lang="scss">
.circle {
  stroke: white;
  stroke-dasharray: 650;
  stroke-dashoffset: 650;
  -webkit-transition: all 0.5s ease-in-out;
  opacity: 0.3;
}

.playBut {
  /*  border: 1px solid red;*/
  display: inline-block;
  -webkit-transition: all 0.5s ease;

  .triangle {
    -webkit-transition: all 0.7s ease-in-out;
    stroke-dasharray: 240;
    stroke-dashoffset: 480;
    stroke: white;
    transform: translateY(0);
  }

  &:hover {
    .triangle {
      stroke-dashoffset: 0;
      opacity: 1;
      stroke: white;
      animation: nudge 0.7s ease-in-out;

      @keyframes nudge {
        0% {
          transform: translateX(0);
        }

        30% {
          transform: translateX(-5px);
        }

        50% {
          transform: translateX(5px);
        }

        70% {
          transform: translateX(-2px);
        }

        100% {
          transform: translateX(0);
        }
      }
    }

    .circle {
      stroke-dashoffset: 0;
      opacity: 1;
    }
  }
}
</style>

<style>
.btn-play {
  transition: 0.2s;
}

.svg-border-waves .v-image {
  position: absolute;
  bottom: 0;
  left: 0;
  height: 3rem;
  width: 100%;
  overflow: hidden;
}

#hero {
  z-index: 0;
}

.svg-border-waves img {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  margin-bottom: -2px;
  z-index: -1;
}

.card {
  min-height: 300px;
  padding: 10px;
  transition: 0.5s ease-out;
}

.card .v-image {
  margin-bottom: 15px;
  transition: 0.75s;
}

.card h1 {
  margin-bottom: 10px;
}

.zoom-efect {
  transform: scale(1.1);
}

.up {
  transform: translateY(-20px);
  transition: 0.5s ease-out;
}
</style>

<style>
section {
  position: relative;
}
</style>