/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap.js';
import VCalendar from 'v-calendar';
import 'v-calendar/dist/style.css';


import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});


import RegisterForm from './components/RegisterForm.vue';
app.component('register-form', RegisterForm);

import Dashboard from './components/Dashboard.vue';
app.component('dashboard', Dashboard);

import LoginComponent from './components/LoginComponent.vue';
app.component('login-component', LoginComponent);

import BookingComponent from './components/BookingComponent.vue';
app.component('booking-component', BookingComponent);

import AdminDashboard from './components/AdminDashboard.vue';
app.component('admin-dashboard', AdminDashboard);

import AppComponent from './components/AppComponent.vue';
app.component('app-component', AppComponent);
import router from './router/index.js'; 

app.use(VCalendar, {});




app.use(router);


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

app.mount('#app');
