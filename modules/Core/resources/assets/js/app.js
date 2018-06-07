'use strict';

import "./bootstrap";
import "./elements/tinymce";
import "./elements/file-upload";
/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/

// Register components
//Vue.component('navbar-burger', require('./components/NavbarBurgerComponent.vue'));

// Create vue root instance
new Vue({
    el: '#app',
    data: {
        showNav: false
    }
})
