// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
// import router from './router'
import VueRoute from 'vue-router'
import BootstrapVue from 'bootstrap-vue'
import VeeValidate from 'vee-validate';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import VueApexCharts from 'vue-apexcharts'
//VueResource = require('vue-resource');
import VueResource from 'vue-resource';
import {routes} from './route'
import VueSession from 'vue-session'
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
Vue.use(VueSession)
Vue.use(VueApexCharts)
Vue.component('apexchart', VueApexCharts)
const router =new VueRoute({
  routes,
  mode:'history'
});

Vue.use(VueRoute);
Vue.use(VueResource);

Vue.use(VeeValidate)
Vue.use(BootstrapVue)

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
