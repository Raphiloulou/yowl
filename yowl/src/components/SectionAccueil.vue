<template>
    <div>
        <img class="fondgris" src="@/assets/fondgris.png">
        <img class="fondblanc1" src="@/assets/fondblanc.png">
        <img class="fondblanc2" src="@/assets/fondblanc.png">
        <img class="fondblanc3" src="@/assets/fondblanc.png">
        <img class="fondblanc4" src="@/assets/fondblanc.png">
        <img class="fondblanc5" src="@/assets/fondblanc.png">
        <img class="film" src="@/assets/film.png">
        <img class="art" src="@/assets/art.png">
        <img class="sport" src="@/assets/sport.png">
        <img class="musique" src="@/assets/musique.png">
        <img class="politique" src="@/assets/politique.png">
        <img class="barregris" src="@/assets/barregris.png">
    </div>
</template>
  
  <script>
  export default {
    name: 'SectionAccueil',
    props: {
      msg: String
    }
  }
  </script>
  
  <style scoped>
  .fondgris{
    display: flex;
    margin-left: -1%;
    width: 18%;
    height: 500px;
  }

  .fondblanc1{
    display: flex;
    width: 13%;
    margin-top: -27%;
    margin-left: 1.5%;
  }
  .fondblanc2{
    display: flex;
    width: 13%;
    margin-left: 1.5%;
  }
  .fondblanc3{
    display: flex;
    width: 13%;
    margin-left: 1.5%;
  }
  .fondblanc4{
    display: flex;
    width: 13%;
    margin-left: 1.5%;
  }
  .fondblanc5{
    display: flex;
    width: 13%;
    margin-left: 1.5%;
  }
  
  .film{
    display: flex;
    width: 2.5%;
    margin-top: -22.2%;
    margin-left: 2%;
  }
  .art{
    display: flex;
    width: 2.3%;
    margin-top: 2.9%;
    margin-left: 2.2%;
  }
  .sport{
    display: flex;
    width: 1.8%;
    margin-top: 2.9%;
    margin-left: 2.3%;
  }
  .musique{
    display: flex;
    width: 1.7%;
    margin-top: 3.1%;
    margin-left: 2.3%;
  }
  .politique{
    display: flex;
    width: 2%;
    margin-top: 2.9%;
    margin-left: 2.1%;
  }
  .barregris{
    display: flex;
    width: 10%;
    margin-top: 10%;
  }
  </style>

  