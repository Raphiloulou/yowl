<template>
<SectionHeader />
<SectionAccueil />
<SectionImg />

</template>

<script>
import SectionHeader from './components/SectionHeader.vue'
import SectionAccueil from'./components/SectionAccueil.vue'
import SectionImg from'./components/SectionImg.vue'

export default {
  name: 'App',
  components: {
    SectionHeader,
    SectionAccueil,
    SectionImg,
  }
}
</script>

<style>
body{
  background-color: #9f9d9d;
}
</style>
