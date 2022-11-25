import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import HomeComponent from './components/HomeComponent.vue';
app.component('home-component', HomeComponent);

import HeaderComponent from './components/layouts/HeaderComponent.vue';
app.component('header-component', HeaderComponent);

app.mount('#app');
