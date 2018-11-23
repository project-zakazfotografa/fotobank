
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



require('./jquery.magnific-popup.min');
require('./cms-script');
require('./pa-script');
require('./script');

require('jquery.maskedinput');
import 'jquery-ui/ui/widgets/datepicker';
import 'jquery-ui/ui/widgets/sortable';


Vue.component('bullets-component', require('./components/cms/BulletsComponent.vue'));


const app = new Vue({
    el: '#app',
    data: {

    }
});
