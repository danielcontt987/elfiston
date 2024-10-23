<template>
  <v-container>
    <v-row>
      <v-col cols="12" md="7">
        <h1 class="display-1 font-weight-bold">{{ getBusiness && getBusiness.sort_description }}</h1>
        <p>{{ getBusiness && getBusiness.address }}</p>
        <v-chip color="accent" class="rounded-lg">{{ getBusiness && getBusiness.category.name }}</v-chip>
        <v-chip color="info" class="rounded-lg">{{ getBusiness && getBusiness.municipality.name }}</v-chip>
        <v-row class="mt-4">
          <v-col v-for="(image, index) in images" :key="index" cols="6">
            <v-img :src="image" class="rounded-lg"></v-img>
          </v-col>
        </v-row>
        <p class="mt-4 font-weight-light">
          {{ getBusiness && getBusiness.description }}
        </p>
      </v-col>
      <v-col cols="12" md="5">
        <v-card class="elevation-0">
          <h3 class="text-center mt-3">Reserva por tan solo</h3>
          <p class="font-weight-light text-center"> <b> {{ getBusiness && getBusiness.price | currency }} MXN</b></p>
          <v-row class="ml-1 mr-1">
            <v-col cols="12">
              <v-btn color="secondary" @click="openModal()" class="mt-4 mr-2 elevation-0" large block>
                Reservar
              </v-btn>
            </v-col>
          </v-row>
          <v-card-title class="mt-4">Características</v-card-title>
          <v-row class="ml-1">
            <v-col cols="12" md="6">
              <h4 class="font-weight-light">
                Experiencia
              </h4>
              <h5>{{ getBusiness && getBusiness.service.experience }}</h5>
            </v-col>
            <v-col cols="12" md="6">
              <h4 class="font-weight-light">
                Habilidades
              </h4>
              <h5>{{ getBusiness && getBusiness.service.skills }}</h5>
            </v-col>
            <v-col cols="12" md="6">
              <h4 class="font-weight-light">
                Meseros adicionales
              </h4>
              <v-chip color="error" class="rounded-lg" v-if="getBusiness && getBusiness.service.additional_waiters == 'No'
                || getBusiness && getBusiness.service.additional_waiters == 0">
                {{ getBusiness && getBusiness.service.additional_waiters }}</v-chip>

              <v-chip color="greenLight" class="rounded-lg" v-else>
                {{ getBusiness && getBusiness.service.additional_waiters }}</v-chip>

            </v-col>
            <v-col cols="12" md="6">
              <h4 class="font-weight-light">
                Horas de trabajo
              </h4>
              <h5>{{ getBusiness && getBusiness.service.hour_work > 0 ? getBusiness && getBusiness.service.hour_work + " Horas " : getBusiness && getBusiness.service.hour_work + " Hora " }}</h5>
            </v-col>
            <v-col cols="12" md="6">
              <h4 class="font-weight-light">
                Precio
              </h4>
              <h5>{{ getBusiness && getBusiness.service.price | currency }}</h5>
            </v-col>
            <v-col cols="12" md="6">
              <h4 class="font-weight-light">
                Hora extra
              </h4>
              <h5>{{ getBusiness && getBusiness.service.extras | currency }}</h5>
            </v-col>
            <v-col cols="12" md="6">
              <h4 class="font-weight-light">
                Tipo de local
              </h4>
              <h5>{{ getBusiness && getBusiness.service.local_type }}</h5>
            </v-col>
          </v-row>
          <v-row class="ml-1 mr-1">
            <v-col cols="12">
              <v-btn color="greenLight" class="mt-4 mr-2 elevation-0 white--text" large block>
                <v-icon class="pl-3">mdi-whatsapp</v-icon> Enviar whatsapp
              </v-btn>
            </v-col>
          </v-row>
        </v-card>
      </v-col>
      <v-col cols="12">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7903.043977986815!2d-104.85289392387429!3d21.4863616700694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842737571408262d%3A0x1031e9fecb9d645a!2sMuseo%20Interactivo%20de%20Ciencias%20e%20innovaci%C3%B3n%20de%20Nayarit!5e0!3m2!1ses-419!2smx!4v1729663293229!5m2!1ses-419!2smx"
          width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </v-col>
    </v-row>
    <v-dialog v-model="show" fullscreen>
      <v-card>
        <v-card-title class="primary white--text">
          <v-row>
            <v-col cols="12" md="6"> Calendario de visitas </v-col>
            <v-col cols="12" md="6" style="text-align: end">
              <v-btn color="white" outlined rounded @click="show = false" class="mr-3">
                <v-icon class="mr-2">mdi-close-circle</v-icon>cerrar
              </v-btn>
            </v-col>
          </v-row>
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text>
          <div class="my-5">
            <v-sheet tile height="54" color="grey lighten-3" class="d-flex">
              <v-btn icon class="ma-2" @click="$refs.calendar.prev()">
                <v-icon>mdi-chevron-left</v-icon>
              </v-btn>
              <v-toolbar-title class="mt-3 text-uppercase" v-if="$refs.calendar">
                {{ $refs.calendar.title }}
              </v-toolbar-title>
              <v-toolbar-title v-else>
                {{currentMonth}}
              </v-toolbar-title>
              <v-spacer></v-spacer>
              <v-btn icon class="ma-2" @click="$refs.calendar.next()">
                <v-icon>mdi-chevron-right</v-icon>
              </v-btn>
              <v-select
                v-model="type"
                :items="types"
                item-text="name"
                item-value="value"
                dense
                outlined
                hide-details
                class="ma-2"
                label="Tipo"></v-select>
            </v-sheet>
            <v-sheet height="550">
              <v-calendar ref="calendar" v-model="value" :weekdays="weekday" :type="type" :events="events"
                :event-overlap-mode="mode" :event-overlap-threshold="30" :event-color="getEventColor"
                @change="getEvents" @click:more="viewDay" @click:date="viewDay" @click:event="showEvent"
                color="primary"></v-calendar>
              <v-menu v-model="selectedOpen" :close-on-content-click="false" :activator="selectedElement" offset-y>
                <v-card color="grey lighten-4" min-width="450px" flat>
                  <v-toolbar :color="selectedEvent.color" dark>
                    <v-icon>mdi-account</v-icon>
                    <v-toolbar-title v-html="selectedEvent.name
                      "></v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-chip color="white" class="text-uppercase" outlined v-html="selectedEvent.status">
                    </v-chip>
                  </v-toolbar>
                  <v-card-text>
                    <v-col>
                      <span v-html="selectedEvent.details
                        "></span>
                    </v-col>
                    <v-col>
                      <span v-html="selectedEvent.propiedad
                        "></span>
                    </v-col>
                  </v-card-text>
                  <v-divider></v-divider>
                  <v-card-actions class="justify-center">
                    <v-btn small outlined color="error" @click="selectedOpen = false">
                      Cancelar
                    </v-btn>
                  </v-card-actions>
                </v-card>
              </v-menu>
            </v-sheet>
          </div>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-container>
</template>

<script>
import moment from "moment";
import { mapState } from 'vuex';

export default {
  mounted() {
    if (this.$route.params && Object.keys(this.$route.params).length === 0) {
      this.$router.push({
        name: "Listado de servicios",
      })
    }
  },
  data() {
    return {
      colors: ['blue', 'indigo', 'deep-purple', 'cyan', 'green', 'orange', 'grey darken-1'],
      names: ['Meeting', 'Holiday', 'PTO', 'Travel', 'Event', 'Birthday', 'Conference', 'Party'],
      mode: "stack",
      weekday: [0, 1, 2, 3, 4, 5, 6],
      value: "",
      selectedElement: null,
      selectedOpen: false,
      selectedEvent: {},
      currentMonth: moment().format('MMMM YYYY').toUpperCase(), // Fecha del primer día del mes actual
      images: [
        "https://placehold.co/600x400",
        "https://placehold.co/600x400",
        "https://placehold.co/600x400",
        "https://placehold.co/600x400"
      ],
      show: false,
      events: [
        {
          name: 'Evento 1',
          start: '2024-10-25',
          end: '2024-10-25',
        },
        {
          name: 'Evento 2',
          start: '2024-10-27',
          end: '2024-10-27',
        },
      ],
      type: "month",
        types: [
            {name: "Mensual", value: "month"},
            {name: "Semanal", value: "week"},
            {name: "Diario", value: "day"},
        ],
    };
    
  },
  methods: {
    openWhatsApp() {
      const phoneNumber = '34612345678'; // Reemplaza con tu número en formato internacional
      const message = 'Hola, quiero más información'; // Mensaje predefinido
      const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
      window.open(url, '_blank');
    },
    openModal() {
      this.show = true;
    },
    handleEventClick(event) {
      alert(`Has clicado en ${event.name}`);
    },
    getEventColor(event) {
        return event.color;
    },
    getEvents ({ start, end }) {
        const events = []

        const min = new Date(`${start.date}T00:00:00`)
        const max = new Date(`${end.date}T23:59:59`)
        const days = (max.getTime() - min.getTime()) / 86400000
        const eventCount = this.rnd(days, days + 20)

        for (let i = 0; i < eventCount; i++) {
          const allDay = this.rnd(0, 3) === 0
          const firstTimestamp = this.rnd(min.getTime(), max.getTime())
          const first = new Date(firstTimestamp - (firstTimestamp % 900000))
          const secondTimestamp = this.rnd(2, allDay ? 288 : 8) * 900000
          const second = new Date(first.getTime() + secondTimestamp)

          events.push({
            name: this.names[this.rnd(0, this.names.length - 1)],
            start: first,
            end: second,
            color: this.colors[this.rnd(0, this.colors.length - 1)],
            timed: !allDay,
          })
        }

        this.events = events
    },
    rnd (a, b) {
      return Math.floor((b - a + 1) * Math.random()) + a
    },
    viewDay({date}) {
      this.value = date;
      this.type = "day";
      console.log("hola");
      
    },
    showEvent({nativeEvent, event}) {
        const open = () => {
            this.selectedEvent = event;
            this.selectedElement = nativeEvent.target;
            requestAnimationFrame(() =>
                requestAnimationFrame(() => (this.selectedOpen = true))
            );
        };

        if (this.selectedOpen) {
            this.selectedOpen = false;
            requestAnimationFrame(() =>
                requestAnimationFrame(() => open())
            );
        } else {
            open();
        }
        nativeEvent.stopPropagation();
    },
  },
  computed: {
    ...mapState("business", ["getBusiness"]),
  }
};
</script>

<style>
.v-main {
  font-family: "Montserrat" !important;
}
</style>