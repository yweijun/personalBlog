import Vue from 'vue'
import Router from 'vue-router'
import UE from 'components/uEdit/uEdit'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/'
    },
    {
      path: '/uedit',
      component: UE
    }
  ]
})
