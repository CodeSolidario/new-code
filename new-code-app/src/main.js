import Vue from 'vue'
import App from './App.vue'
import router from './routes'
import VueResource from 'vue-resource'
import store from './mainStore'

Vue.config.productionTip = false
Vue.use(VueResource)

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')
