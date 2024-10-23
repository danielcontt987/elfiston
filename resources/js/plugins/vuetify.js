import Vue from "vue";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import "@mdi/font/css/materialdesignicons.css";
import langEs from "vuetify/es5/locale/es";

Vue.use(Vuetify);

export default new Vuetify({
    icons: {
        iconfont: "mdi"
    },
    theme: {
        themes: {
            light: {
                primary: "#2e3248",
                secondary: "#001F4A",
                accent: "#00CFB5",
                error: "#C22F2F",
                warning: "#FBC02D",
                info: "#3D56B3",
                success: "#27AE60",
                background: "#EFF3F8",
                background2: "#C5CAE9",
                error_light: "#D0094E",
                excel_color: '#1B5E20',
                successLight: "#e2fbf6",
                greenLight: "#13deb9",
                uvaLight: "#7E57C2",
                warningDark: "#FFAB00",
            },
            dark: {
                primary: "#192A67",
                secondary: "#001F4A",
                accent: "#00CFB5",
                error: "#C22F2F",
                warning: "#FBC02D",
                info: "#3D56B3",
                success: "#27AE60"
            }
        }
    },
     lang: {
         locales: {
             es: langEs
         },
         current: "es"
     }
});
