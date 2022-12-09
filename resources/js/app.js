window.global ||= window;
import './bootstrap';

import { createApp } from 'vue';
// console.log(import.meta.env.VITE_GITHUB_ACCESS_TOKEN)

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import AppComponent from './src/AppComponent.vue';
app.component('app-component', AppComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

import router from './src/routes/routes'

import { createPinia } from 'pinia'
const pinia = createPinia()

app.use(router)
.use(pinia)
.mount('#app');
