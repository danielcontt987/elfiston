<template>
    <v-container fluid>
        <v-row>
            <v-col cols="12" md="8">
                <v-btn color="yellow accent-3" class="rounded-lg elevation-0" large @click="goToHome()">
                    <v-icon left>mdi-arrow-left-circle-outline</v-icon>
                    Regresar
                </v-btn>
            </v-col>
            <v-col cols="12">
                <v-card flat>
                    <v-card-title class="primary justify-center">
                        <v-row>
                            <v-col cols="12">
                                <h4 class="white--text text-center">
                                    Filtro de busqueda
                                </h4>
                            </v-col>
                        </v-row>
                    </v-card-title>
                    <v-card-text>
                        <v-row class="mt-2">
                            <v-col cols="12" md="6">
                                <v-select label="Ubiación" outlined :items="ubications" />
                            </v-col>
                            <v-col cols="12" md="6">
                                <v-select label="Categorías" outlined :items="ubications" />
                            </v-col>
                            <v-col cols="12" class="mt-0">
                                <v-text-field label="Buscar" outlined />
                            </v-col>
                            <v-col cols="12">
                                <v-btn class="rounded-lg elevation-0 primary" x-large block>Filtrar</v-btn>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col cols="12">
                <v-card flat>
                    <v-card-title class="primary justify-center">
                        <v-row>
                            <v-col cols="12">
                                <h4 class="white--text text-center">
                                    Negocios encontrados
                                </h4>
                            </v-col>
                        </v-row>
                    </v-card-title>
                    <v-card-text>
                        <v-row class="mt-2">
                            <v-col cols="12">
                                <v-data-table :headers="headers">

                                </v-data-table>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    name: 'ListService',

    data: () => ({
        ubications: [
            {
                id: 1,
                text: "Tepic",
            },
            {
                id: 2,
                text: "San Blas",
            },
            {
                id: 1,
                text: "Xalisco",
            },
        ],
        headers: [
            {
                text: "Negocio",
                // value: "concept.name",
                sortable: true,
                align: "center",
                class: "black--text",
            },
            {
                text: "Precio",
                sortable: true,
                align: "center",
                class: "black--text",
            },
            {
                text: "Ubicación",
                sortable: true,
                align: "center",
                class: "black--text",
            },
            {
                text: "Categoría",
                sortable: true,
                align: "center",
                class: "black--text",
            },
            {
                text: "Acciones",
                sortable: true,
                align: "center",
                class: "black--text",
            },
        ]
    }),
    methods:{
        goToHome(){
            this.$router.push({path: "/"});
        }
    }
};
</script>