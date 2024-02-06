import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler'
import Toaster from "@meforma/vue-toaster";
import form from './components/Form.vue'
import axios from 'axios'
import router from './Routes'
import VueAxios from 'vue-axios'
const app = createApp({})
app.component('two', form)
app.use(VueAxios, axios)
app.use(router)
app.use(Toaster)
app.mount('#app');

