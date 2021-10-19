require('./bootstrap');

import { createApp } from "vue";
import router from "./router";
import MainComponent from "./components/MainComponent";

createApp({
    components: {
        MainComponent
    },
}).use(router).mount('#app');
