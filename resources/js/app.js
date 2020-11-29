require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import Notifications from 'vue-notification'

Vue.use(VueAxios, axios);
Vue.use(Notifications);

import Paginate from 'vuejs-paginate';
import vSelect from 'vue-select'
import VueTaggableSelect from "vue-taggable-select";

Vue.component('vue-taggable-select', VueTaggableSelect);
Vue.component('v-select', vSelect);
Vue.component('paginate', Paginate);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('article-component', require('./components/ArticleComponent.vue').default);
Vue.component('notification-component', require('./components/NotificationComponent.vue').default);
Vue.component('tag-component', require('./components/TagComponent.vue').default);

const app = new Vue({
    el: '#app',
});



