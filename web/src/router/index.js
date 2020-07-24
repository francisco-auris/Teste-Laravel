import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/pages/Home'
import Detail from '@/pages/Detail'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/video/:id',
    name: 'video',
    component: Detail
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
