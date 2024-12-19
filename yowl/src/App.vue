<template>
<SectionHeader />
<SectionAccueil />
<SectionLogin />
<SectionSignup />
<SectionCategorie />
<SectionAdmin />
<SectionPosts />

</template>

<script>
import SectionHeader from './components/SectionHeader.vue'
import SectionAccueil from'./components/SectionAccueil.vue'
import SectionLogin from'./components/SectionLogin.vue'
import SectionSignup from'./components/SectionSignup.vue'
import SectionCategorie from'./components/SectionCategorie.vue'
import SectionAdmin from'./components/SectionAdmin.vue'
import SectionPosts from'./components/SectionPosts.vue'

export default {
  name: 'App',
  components: {
    SectionHeader,
    SectionAccueil,
    SectionLogin,
    SectionSignup,
    SectionCategorie,
    SectionAdmin,
    SectionPosts,
  }
}
</script>

<style>
body{
  background-color: #9f9d9d;
}
</style>
