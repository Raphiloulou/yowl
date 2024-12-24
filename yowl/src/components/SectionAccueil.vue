<template>
    <div>
        <img class="fondgris" src="@/assets/fondgris.png">
        <img class="film" src="@/assets/film.png">
        <img class="art" src="@/assets/art.png">
        <img class="sport" src="@/assets/sport.png">
        <img class="politique" src="@/assets/politique.png">
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


  
  .fondgris {
  display: flex;
  margin-left: -1%;
  width: 18%;
  height: 500px;
  position: relative;
}

.film {
  position: absolute;
  width: 2.5%;
  left: 2.5%; 
  top: 29.3%; 
  z-index: 11;
}

.art {
  position: absolute;
  width: 2.3%;
  left: 2.8%; 
  top: 44.3%; 
  z-index: 11;
}

.sport {
  position: absolute;
  width: 1.8%;
  left: 3%; 
  top: 52.2%; 
  z-index: 11;
}


.politique {
  position: absolute;
  width: 2%;
  left: 2.7%; 
  top: 36.8%; 
  z-index: 11;
}
@media screen and (max-width: 1200px){
  .fondgris {
  display: flex;
  margin-left: -2%;
  width: 19%;
  height: 300px;
  position: relative;
}

.film {
  position: absolute;
  width: -11%;
  left: 2.5%; 
  top: 0%; 
  z-index: 0;
}

.art {
  position: absolute;
  width: 2.3%;
  left: 2.8%; 
  top: 0%; 
  z-index: 0;
}

.sport {
  position: absolute;
  width: 1.8%;
  left: 3%; 
  top: 0%; 
  z-index: 0;
}


.politique {
  position: absolute;
  width: 2%;
  left: 2.7%; 
  top: 0%; 
  z-index: 0;
}

}
 
  </style>

  