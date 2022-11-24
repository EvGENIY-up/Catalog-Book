import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('Test', ExampleComponent);

Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
 });

app.mount('#app');
