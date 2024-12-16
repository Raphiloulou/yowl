<template>
  <div>
    <div v-if="showPopup" class="popup-overlay">
      <div class="popup">
        <img class="Login" src="@/assets/Login.png" />
        <form @submit.prevent="handleLogin">
          <input class="text" type="text" placeholder="Email ou Nom d'utilisateur" v-model="identifier" />
          <input class="password" type="password" placeholder="Mot de passe" v-model="password" />
          <button class="submit" type="submit">Se connecter</button>
        </form>
        <p class="compte">
          Vous n'avez pas de compte ?
          <a href="#signup" @click.prevent="showSignupPopup">Créer un compte</a>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SectionLogin',
  data() {
    return {
      showPopup: window.location.hash === '#login',
      identifier: '',
      password: '',
    };
  },
  methods: {
    async handleLogin() {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            login: this.identifier,
            password: this.password,
          }),
        });

        if (!response.ok) {
          const error = await response.json();
          console.error('Erreur:', error);
          alert(error.message || 'Une erreur est survenue.');
          return;
        }

        const data = await response.json();
        console.log('Connexion réussie:', data);

        localStorage.setItem('user', JSON.stringify(data.user));
        alert('Connexion réussie !');

        window.location.hash = '#accueil';
        window.location.reload();
      } catch (error) {
        console.error('Erreur réseau:', error);
        alert('Une erreur réseau est survenue.');
      }
    },
    showSignupPopup() {
      this.showPopup = false;
      window.location.hash = '#signup';
      window.location.reload();
    },
  },
};
</script>

<style scoped>
.popup-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
}

.popup {
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  width: 90%;
  max-width: 400px;
  text-align: center;
}

.Login {
  display: flex;
  width: 40%;
  margin-left: 30%;
}

.text,
.password {
  display: flex;
  margin-left: 23%;
  font-size: 110%;
  width: 54%;
}

.submit {
  display: flex;
  font-size: 110%;
  margin-top: 7%;
  margin-left: 37%;
}
</style>
