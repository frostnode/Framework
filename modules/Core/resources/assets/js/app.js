
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

// Register components
Vue.component('navbar-burger', {
    template: `
        <div class="navbar-burger" v-on:click="toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>`,
    props: ['target'],
    data() {
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
});

Vue.component('tabs', {
    template: `
        <div>
            <nav class="tabs is-boxed">
                <ul>
                    <li v-for="tab in tabs" v-bind:class="{'is-active': tab.isActive}">
                        <a @click="selectTab(tab)">
                            {{ tab.name }}
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="tab-details">
                <slot></slot>
            </div>
        </div>
    `,
    data() {
        return {
            tabs: [],
        }
    },
    created() {
        this.tabs = this.$children;
    },
    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach(function(tab){
                    tab.isActive = (selectedTab.name == tab.name)
            })
        }
    }
});

Vue.component('tab', {
    template: `
        <div v-show="isActive">
            <slot>
            </slot>
        </div>
    `,
    props: {
        name: {
            required: true
        },
        selected: {
            default: false
        }
    },
    data() {
        return {
            isActive: false
        }
    },
    mounted() {
        this.isActive = this.selected;
    }
});

Vue.component('detached-tabs', {
    template: `
        <nav class="tabs is-boxed">
            <ul>
                <slot></slot>
            </ul>
        </nav>
    `,
    data() {
        return {
            tabs: [],
        }
    },
    created() {
        this.tabs = this.$children;
    }
});

Vue.component('tab-item', {
    template: `
        <li :class="{'is-active': isActive}">
            <a @click="selectTab()">
                {{ name }}
            </a>
        </li>
    `,
    props: {
        name: {
            required: true
        },
        target: {
            required: true
        },
        selected: {
            default: false
        }
    },
    data() {
        return {
            isActive: false,
            tabTarget: this.target
        }
    },
    mounted() {
        this.isActive = this.selected;
    },
    methods: {
        selectTab() {
            this.$parent.tabs.forEach(function(tab){
                tab.isActive = false;
            });
            this.isActive = !this.isActive;

            let tabs = Array.prototype.slice.call(document.getElementsByClassName("tab-panel"));
            let target = this.tabTarget;

            tabs.forEach(function(tab){
                tab.classList.remove("is-active");

                if (tab.id == target) {
                    tab.classList.add("is-active");
                }
            });


        }
    }
});

Vue.component('tab-panels', {
    template: `
        <div class="tab-panels">
            <slot></slot>
        </nav>
    `,
    data() {
        return {
            tabs: [],
        }
    },
    created() {
        this.tabs = this.$children;
    }
});

// Create vue root instance
new Vue({
  el: '#app'
})


