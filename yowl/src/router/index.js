
import { createRouter, createWebHistory } from 'vue-router';
import SectionLogin from '@/components/SectionLogin.vue';
import SectionSignup from '@/components/SectionSignup.vue';
import SectionAccueil from '@/components/SectionAccueil.vue';
import SectionCategorie from '@/components/SectionCategorie.vue';
import SectionPosts from '@/components/SectionPosts.vue';
// import PostDetails from '@/components/PostDetails.vue';

const routes = [
  { path: '/login', component: SectionLogin },
  { path: '/signup', component: SectionSignup },
  { path: '/accueil', component: SectionAccueil, meta: { requiresAuth: true } },
  { path: '/categories', component: SectionCategorie },
  { path: '/posts', name: 'Posts', component: SectionPosts },
  // { path: '/posts/:id', component: PostDetails, props: true },
  
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  const user = JSON.parse(localStorage.getItem('user'));
  if (to.meta.requiresAuth && !user) {
    next('/login'); 
  } else {
    next(); 
  }
});

export default router;



