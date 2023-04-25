import { createRouter, createWebHistory } from 'vue-router';

import Admin from './components/Admin'
import App from "./App";
import Match from "./components/Match";

const routes =  [
    { path: '/',name:'Match', component: Match },
    { path: '/admin',name:'Admin', component: Admin }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
