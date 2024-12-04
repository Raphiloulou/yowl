<template>
  <div class="header">
      <p class="RACE">RACE.</p>
  </div>
</template>

<script>
export default {
  name: 'SectionHeader',
  props: {
    msg: String
  }
}
</script>


<style scoped>
.header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 11%;
  background-color: #f9a8d3;
  z-index: 1000;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  padding: 0;
  font-family: "roboto";
}

</style>