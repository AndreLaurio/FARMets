import Vue from 'vue'
import VueRouter from 'vue-router'
import Index from '../views/Index.vue'
import Admin from '../views/admin/AdminHome'
import Seller from '../views/seller/SellerHome'
import Buyer from '../views/buyer/BuyerHome'
import AdminApproval from '../views/admin/AdminApproval'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Index',
    component: Index
  },
  {
    path: '/seller',
    name: 'Seller',
    component: Seller
  },
  {
    path: '/buyer',
    name: 'Buyer',
    component: Buyer
  },
  {
    path: '/admin',
    name: 'Admin',
    component: Admin
  },
  {
    path:'/admin/approval',
    name: 'AdminApproval',
    component: AdminApproval
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
