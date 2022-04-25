require('./bootstrap');
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue/dist/vue'
window.Event = new Vue()

Vue.component('bands', require('./views/Bands/Bands').default);
Vue.component('create-band', require('./views/Bands/CreateBand').default);

const app = new Vue({
    el: '#app',
});
