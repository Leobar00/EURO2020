/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';

import {createApp} from 'vue';
import routes from './vue/Route'
import App from './vue/App.vue';

const app = createApp(App).use(routes);

app.mount("#app");

