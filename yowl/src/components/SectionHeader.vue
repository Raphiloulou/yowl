<template>
  <div class="header">
    <img class="logo" src="@/assets/logo.png">
    <div class="search-bar">
      <img class="logorecherche" src="@/assets/logorecherche.png">
      <input
        type="text"
        placeholder="Recherche..."
        class="search" />
    </div>
    <div>
      <img class="profil" src="@/assets/profil.png">
      <p v-if="isLoggedIn" class="logout" @click="handleLogout">Log out</p>
    </div>
  </div>

  <div>
    <router-link to="/login" v-if="!isLoggedIn">Login</router-link>
    <router-link to="/signup" v-if="!isLoggedIn">Signup</router-link>
    <router-link to="/accueil">Accueil</router-link>
    
  </div>
</template>

<script>
export default {
  name: 'SectionHeader',
  data() {
    return {
      isLoggedIn: false, 
    };
  },
  mounted() {
    const user = localStorage.getItem('user');
    if (user) {
      this.isLoggedIn = true;
    }
  },
  methods: {
    handleLogout() {
      localStorage.removeItem('user');

      window.location.hash = '#login';
      window.location.reload();
    },
  },
};
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
  padding: 0;
  font-family: "roboto";
}

.logo {
  width: 8%;
  height: 80%;
  display: flex;
  margin-left: 1%;
  margin-top: 0.5%;
}

.search-bar {
  display: flex;
  align-items: center;
  background-color: black;
  border-radius: 30px;
  width: 45%;
  height: 60%;
  margin-left: 27%;
  margin-top: -4%;
}

.logorecherche {
  margin-right: 2%;
  height: 65%;
  width: 7%;
  margin-left: 1.5%;
}

.search {
  background: none;
  border: none;
  outline: none;
  color: pink;
  font-size: 20px;
  width: 100%;
}

.search::placeholder {
  color: pink;
}

.profil {
  display: flex;
  width: 60px;
  height: 50px;
  margin-left: 95%;
  margin-top: -3.5%;
}

.logout {
  display: flex;
  color: black;
  margin-top: -2.3%;
  margin-left: 89%;
  font-size: 120%;
  
}


</style>
