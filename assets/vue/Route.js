import { createRouter, createWebHistory } from 'vue-router';

import Admin from './components/Admin'
import App from "./App";
import Home from "./components/Home";

const routes =  [
    { path: '/',name:'Match', component: Home },
    { path: '/admin',name:'Admin', component: Admin }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
