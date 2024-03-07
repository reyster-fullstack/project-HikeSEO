import { createRouter, createWebHistory } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BookingComponent from '../components/BookingComponent.vue';
import Dashboard from '../components/Dashboard.vue';

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: LoginComponent,
  },
  { path: '/', component: Dashboard, name: 'dashboard' },
  { path: '/booking', component: BookingComponent, name: 'booking' },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
