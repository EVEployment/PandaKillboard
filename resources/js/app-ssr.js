// import 'bootstrap';

import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueI18n from 'vue-i18n'
import { InertiaApp } from '@inertiajs/inertia-vue'
import renderVueComponentToString from 'vue-server-renderer/basic';

Vue.use(VueAxios, axios)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueI18n)
Vue.use(InertiaApp)

const container = document.getElementById('app')

const app = new Vue({
    render: h => h(InertiaApp, {
        props: {
            initialPage: context.page,
            resolveComponent: name => require(`./Views/${name}`).default,
        },
    })
})

renderVueComponentToString(app, (err, html) => {
    if (err) {
        throw new Error(err)
    }

    dispatch(html)
})
