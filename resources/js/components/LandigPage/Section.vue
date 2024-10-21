<template>
    <section id="download">
      <div class="overlay"></div> <!-- Div con opacidad -->
      <v-container fluid>
        <v-row align="center" justify="center">
          <v-col cols="10">
            <v-row align="center" justify="center">
              <v-col sm="4" class="hidden-xs-only">
                <v-img src="../../../../img/fiesta.png" class="d-block ml-auto mr-auto" max-width="350px" />
              </v-col>
              <v-col cols="12" sm="8" class="white--text text-left">
                <h1 class="font-weight-light display-2 mb-2">Entra a una nueva era en la realización de tus eventos</h1>
                <h1 class="font-weight-light">
                    Tenemos ubicaciones con servicios completos para cada presupuesto que tengas, nuestro catalogo de opciones te permitira elegir entre los mejores lugares con las amenidades que requieras para que tu evento sea todo un éxito.
                </h1>
              </v-col>
            </v-row>
          </v-col>
        </v-row>
      </v-container>
    </section>
  </template>
  
  <style scoped>
  #download {
    background-image: url("../../../../public/img/fondo.jpg");
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 500px;
    position: relative; /* Necesario para el posicionamiento del overlay */
  }
  
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.735); /* Color negro con opacidad */
    z-index: 1; /* Asegura que el overlay esté sobre el fondo */
  }
  
  #download .container,
  #download .row {
    height: 100%;
    position: relative; /* Para que el contenido esté por encima del overlay */
    z-index: 2; /* Asegura que el contenido esté sobre el overlay */
  }
  </style>
  