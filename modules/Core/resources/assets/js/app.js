
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

window.Event = new Vue();

// register
Vue.component('navbar-burger', {
    template: `<div class="navbar-burger" v-on:click="toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>`,
    props: ['target'],
    data: () => {
        return {
            isActive: false
        }
    },
    methods: {
        toggle: function (event) {
            this.isActive = !this.isActive
            let el = document.getElementById(this.target)
            el.classList.toggle('is-active');
        }
    }
})

// create a root instance
new Vue({
  el: '#app'
})


