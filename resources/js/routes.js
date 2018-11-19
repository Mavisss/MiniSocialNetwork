import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)

import unread from './components/UnreadNots.vue'
export const routes = new VueRouter([
   {path:'/mark_as_read/:id', name:'markasread', component: unread}
])
