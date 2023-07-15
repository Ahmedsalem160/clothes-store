/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
/** For Routes */
import routes from './Routes';
import { createRouter, createWebHistory } from 'vue-router';
/**For Alert */
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
/**For Pagination */
import { Bootstrap5Pagination } from 'laravel-vue-pagination';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'
/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
/* import specific icons */
import { faHouse, faPhone, faPrint, faEnvelope, faPaperPlane} from '@fortawesome/free-solid-svg-icons'
import { faTwitter,faFacebook, faGoogle, faInstagram, faLinkedin, faGithub} from '@fortawesome/free-brands-svg-icons'
import axios from 'axios'
axios.defaults.baseURL = 'http://localhost:8000/api/';

/* add icons to the library related to awesome*/
library.add(faPaperPlane, faTwitter, faFacebook, faGoogle, faInstagram, faLinkedin, faGithub, faHouse, faPhone, faPrint, faEnvelope)
/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});


import NavComponent from './components/NavComponent.vue';
import FooterComponent from './components/FooterComponent.vue';
// app.component('example-component', ExampleComponent);
app.component('nav-component', NavComponent);
app.component('footer-component', FooterComponent);
app.component('font-awesome-icon', FontAwesomeIcon);
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
 * The folllowing block of code will define the Routes of this App
 * Each route should map to a component.
 */
// const routes = [
//     {path:'/:WelcomePage', component: LoginComponent},
//     {path:'/login', component: LoginComponent, name: '/login'},
//     {path:'/register', component: RegisterComponent, name: '/register'},
// ];
/**
 * Create the router instance and pass the `routes` option
 */
const router = createRouter({
    mode:'history',
    history:createWebHistory(),
    routes,
})
/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */
app.use(router);
app.use(VueSweetalert2);
app.use(Bootstrap5Pagination);
app.mount('#app');
