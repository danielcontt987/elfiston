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
                    <v-card-title class="secondary justify-center">
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
                                <v-select label="Ubiación"
                                    outlined 
                                    :items="municipalities" 
                                    item-text="name"
                                    item-value="id"
                                 />
                            </v-col>
                            <v-col cols="12" md="6">
                                <v-select label="Categorías" 
                                    outlined 
                                    :items="categories"
                                    item-text="name"
                                    item-value="id"
                                 />
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
                    <v-card-title class="secondary justify-center">
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
                                <v-data-table :headers="headers" :items="business">
                                    <template v-slot:item.name="{item}">
                                        {{ item.name }}
                                    </template>
                                    <template v-slot:item.price="{item}">
                                        {{ item.price | currency }}
                                    </template>
                                    <template v-slot:item.ubication="{item}">
                                        {{ item.municipality.name }}
                                    </template>
                                    <template v-slot:item.category="{item}">
                                        {{ item.category.name }}
                                    </template>
                                    <template v-slot:item.created_at="{item}">
                                        {{ item.created_at | date }}
                                    </template>
                                    <template v-slot:item.actions="{item}">
                                        <v-row>
                                            <v-col class="12">
                                                <v-btn
                                                    depressed
                                                    small
                                                    fab
                                                    class="rounded-lg"
                                                    color="info"
                                                    @click="goToDetail(item)"
                                                    ><v-icon>mdi-eye</v-icon>
                                                </v-btn>
                                                <v-btn
                                                    depressed
                                                    small
                                                    fab
                                                    class="rounded-lg"
                                                    color="accent"
                                                    ><v-icon>mdi-calendar</v-icon>
                                                </v-btn>
                                            </v-col>
                                        </v-row>
                                    </template>
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
import {mapState} from "vuex";
import business from "../../stores/business";

export default {
    name: 'ListService',

    mounted(){
        this.$store.dispatch('ubication/listMunicipalities');
        this.$store.dispatch('category/listCategories');
        this.$store.dispatch('business/listBusiness');
    },
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
                value: "name",
                sortable: true,
                align: "center",
                class: "black--text",
            },
            {
                text: "Precio",
                value: "price",
                sortable: true,
                align: "center",
                class: "black--text",
            },
            {
                text: "Ubicación",
                value: "ubication",
                sortable: true,
                align: "center",
                class: "black--text",
            },
            {
                text: "Categoría",
                value: "category",
                sortable: true,
                align: "center",
                class: "black--text",
            },
            {
                text: "Fecha de registro",
                value: "created_at",
                sortable: true,
                align: "center",
                class: "black--text",
            },
            {
                text: "Acciones",
                value: "actions",
                sortable: true,
                align: "center",
                class: "black--text",
            },
        ]
    }),
    methods:{
        goToHome(){
            this.$router.push({path: "/"});
        },
        goToDetail(item){
            this.$router.push({
                name: "Detalle del servicio",
                params: {
                    id: item.id,
                    business: item
                }
            });

            this.$store.dispatch("business/setBusiness", item);
        }
    },

    computed: {
        ...mapState("ubication", ['municipalities']),
        ...mapState("category", ['categories']),
        ...mapState("business", ['business']),
    }
};
</script>