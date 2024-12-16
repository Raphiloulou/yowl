<template>
<SectionHeader />
<SectionAccueil />
<SectionLogin />
<SectionSignup />
<SectionCategorie />

</template>

<script>
import SectionHeader from './components/SectionHeader.vue'
import SectionAccueil from'./components/SectionAccueil.vue'
import SectionLogin from'./components/SectionLogin.vue'
import SectionSignup from'./components/SectionSignup.vue'
import SectionCategorie from'./components/SectionCategorie.vue'

export default {
  name: 'App',
  components: {
    SectionHeader,
    SectionAccueil,
    SectionLogin,
    SectionSignup,
    SectionCategorie,
  }
}
</script>

<style>
body{
  background-color: #9f9d9d;
}
</style>
