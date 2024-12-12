// import { createRouter, createWebHistory } from 'vue-router';
// import SectionLogin from '@/components/SectionLogin.vue';
// import SectionSignup from '@/components/SectionSignup.vue';
// import SectionAccueil from '@/components/SectionAccueil.vue';

// const routes = [
//   { path: '/login', component: SectionLogin },
//   { path: '/signup', component: SectionSignup },
//   { path: '/accueil', component: SectionAccueil, meta: { requiresAuth: true } },
// ];

// const router = createRouter({
//   history: createWebHistory(),
//   routes,
// });

// router.beforeEach((to, from, next) => {
//   const user = JSON.parse(localStorage.getItem('user'));
//   if (to.meta.requiresAuth && !user) {
//     next('/login'); 
//   } else {
//     next(); 
//   }
// });

// export default router;
