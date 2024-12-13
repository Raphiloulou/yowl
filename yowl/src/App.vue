<template>
<SectionHeader />
<SectionAccueil />
<SectionLogin />
<SectionSignup />

</template>

<script>
import SectionHeader from './components/SectionHeader.vue'
import SectionAccueil from'./components/SectionAccueil.vue'
import SectionLogin from'./components/SectionLogin.vue'
import SectionSignup from'./components/SectionSignup.vue'

export default {
  name: 'App',
  components: {
    SectionHeader,
    SectionAccueil,
    SectionLogin,
    SectionSignup,
  }
}
</script>

<style>
body{
  background-color: #9f9d9d;
}
</style>
