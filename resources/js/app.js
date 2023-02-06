import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler.js';
import App from './App.vue';
import 'bootstrap/dist/css/bootstrap.min.css';

const app = createApp();

app.component('app-component', App);
app.mount("#app");
