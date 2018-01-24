import Vue from 'vue'
import Router from 'vue-router'
import BlogEdit from 'components/blog-edit/blog-edit'
import MainContent from 'components/main-content/main-content'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      redirect: '/mainContent'
    },
    {
      path: '/blogEdit',
      component: BlogEdit
    },
    {
      path: '/mainContent',
      component: MainContent
    }
  ]
})
