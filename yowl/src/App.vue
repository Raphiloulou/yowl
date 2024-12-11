<template>
<SectionHeader />
<SectionAccueil />

</template>

<script>  
// import {ref} from 'vue'
// const data = ref ({});
// async function getData(){const respons = await fetch ('lien')
//   return await categories.json();
// } 
import SectionHeader from './components/SectionHeader.vue'
import SectionAccueil from'./components/SectionAccueil.vue'

export default{
  name: 'App',
  components: {
    SectionHeader,
    SectionAccueil,
  }
}
</script>

<style>
body{
  background-color: #9f9d9d;
}
</style>
