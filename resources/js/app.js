require('./bootstrap');
import Vue from 'vue'
import { createApp } from 'vue'

import App from './components/App.vue';
import * as VueRouter from 'vue-router';
import {routes} from './routes';
import axios from 'axios'
import VueAxios from 'vue-axios'
import User from './store/auth'

const router = VueRouter.createRouter({
  history: VueRouter.createWebHistory(),
  routes,
});
  
const eventBus = createApp(App)
eventBus.use(router);
eventBus.use(VueAxios, axios)
eventBus.mount('#app')