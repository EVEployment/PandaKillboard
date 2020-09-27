// import 'bootstrap';

import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueI18n from 'vue-i18n'
import { InertiaApp } from '@inertiajs/inertia-vue'

Vue.use(VueAxios, axios)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueI18n)
Vue.use(InertiaApp)

const container = document.getElementById('app')

const app = new Vue({
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(container.dataset.page),
            resolveComponent: name => require(`./Views/${name}`).default,
        },
    })
}).$mount(container)
