<template>
    <v-container fluid>
        <v-dialog
            v-model="showDialog"
            persistent
            max-width="450"
            v-if="showDialog">
            <v-card class="ma-0" style="overflow: hidden !important">
                <v-card-title class="text-center">
                    <v-row>
                        <v-col cols="12" class="text-center mb-2">
                            <v-icon size="84" :color="color">{{ icon }}</v-icon>
                        </v-col>
                    </v-row>
                </v-card-title>
                <v-card-title
                    class="text-center"
                    style="font-weight: bold; word-break: break-word"
                    :class="colorClass"
                    v-if="title">
                    <v-row class="mx-0">
                        <v-col cols="12" class="text-center">
                            {{ title }}
                        </v-col>
                    </v-row>
                </v-card-title>
                <v-card-text
                    class="text-center"
                    style="font-size: 18px; word-break: break-word">
                    <span v-html="msg"></span>
                </v-card-text>
                <v-card-text v-if="note && folio">
                    <v-alert
                        icon="mdi-alert-circle-outline"
                        prominent
                        text
                        color="cyan">
                        <p>{{ note }}</p>
                        <b v-html="folio" />
                    </v-alert>
                </v-card-text>
                <v-card-actions class="mb-3" v-if="type === 0">
                    <v-row class="mx-0">
                        <v-col class="text-center">
                            <v-btn
                                class="rounded-lg white--text"
                                large
                                depressed
                                block
                                color="primary"
                                @click="closeDialog()">
                                Entendido
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-actions>
                <v-card-actions class="mb-3" v-if="type === 1">
                    <v-row class="mx-0">
                        <v-col class="text-center">
                            <v-btn
                                class="rounded-lg white--text"
                                large
                                depressed
                                block
                                color="primary"
                                @click="closeDialogReturn()">
                                Entendido
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-actions>
                <v-card-actions class="mb-3" v-if="type === 2">
                    <v-row class="mx-0">
                        <v-col class="text-center">
                            <v-btn
                                class="rounded-lg white--text"
                                large
                                depressed
                                block
                                color="primary"
                                @click="closeDialog()">
                                Intentar más tarde
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-actions>
                <v-card-actions class="mb-3" v-if="type === 3">
                    <v-row class="mx-0">
                        <v-col class="text-center">
                            <v-btn
                                v-if="ruta"
                                class="rounded-lg"
                                large
                                depressed
                                block
                                color="primary white--text"
                                @click="closeDialogRoute()">
                                Entendido
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-actions>
                <v-card-actions class="mb-3" v-if="type === 4">
                    <slot></slot>
                </v-card-actions>
                <v-card-actions class="mb-3" v-if="type === 5">
                    <v-row class="mx-0">
                        <v-col class="text-center">
                            <v-btn
                                class="rounded-lg"
                                large
                                depressed
                                block
                                color="primary white--text"
                                @click="reloadPage()">
                                Recargar página
                            </v-btn>
                        </v-col>
                    </v-row>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-container>
</template>

<script>
import {mapState} from "vuex";
export default {
    methods: {
        closeDialog() {
            this.$store.dispatch("alert/closeDialog");
        },
        closeDialogReturn() {
            this.$store.dispatch("alert/closeDialog");
            this.$router.go(-1);
        },
        closeDialogRoute() {
            this.$store.dispatch("alert/closeDialog");
            this.$router.push(this.ruta);
        },
        reloadPage(){
            window.location.reload();
        }
    },
    computed: {
        ...mapState({
            showDialog: (state) => state.alert.showDialog,
            msg: (state) => state.alert.msg,
            title: (state) => state.alert.title,
            color: (state) => state.alert.color,
            icon: (state) => state.alert.icon,
            textOk: (state) => state.alert.textOk,
            type: (state) => state.alert.type,
            note: (state) => state.alert.note,
            folio: (state) => state.alert.folio,
            ruta: (state) => state.alert.ruta,
        }),
        colorClass() {
            return this.color + "--text";
        },
    },
};
</script>