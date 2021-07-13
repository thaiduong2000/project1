import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import userRoutes from "../router/modules/user"
import technologyRoutes from "../router/modules/technology"
import vehicleRoutes from "../router/modules/vehicle"

const router = new VueRouter({
  mode: 'history',
  routes: [
    userRoutes, technologyRoutes, vehicleRoutes
  ],
})

export default router