require('./bootstrap');
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue/dist/vue'
window.Event = new Vue()

Vue.component('bands', require('./views/Bands/Bands').default);
Vue.component('create-band', require('./views/Bands/CreateBand').default);
Vue.component('band-profile', require('./views/Bands/BandProfile').default);
Vue.component('album-profile', require('./views/Bands/Albums/AlbumProfile').default);
Vue.component('song-profile', require('./views/Bands/Albums/Songs/SongProfile').default);

/** Helpers mixin */
import helpers from './mixins/helpers';
Vue.mixin(helpers)

const app = new Vue({
    el: '#app',
});
