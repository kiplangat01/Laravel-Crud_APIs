import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home', 
      component: HomeView,
    },
    {
      path: '/tasks',
      name: 'UserIndex',
    component: ()=> import("../views/tasks/UserIndex.vue")
    },
    {
      path: '/tasks/create',
      name: 'UserCreate',
    component: ()=> import("../views/tasks/UserCreate.vue")
    },
    {
      path: '/tasks/:id/edit',
      name: 'UserEdit',
    component: ()=> import("../views/tasks/UserEdit.vue")
    },
  ]
})

export default router
