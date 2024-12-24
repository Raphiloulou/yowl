<template>
  <div>
    <div v-if="showPopup" class="popup-overlay">
      <div class="popup">
        <img class="Signup" src="@/assets/Signup.png" />
        <form @submit.prevent="handleSignup">
          <input class="text" type="text" placeholder="Nom d'utilisateur" v-model="username" />
          <input class="email" type="email" placeholder="Email" v-model="email" />
          <input class="password" type="password" placeholder="Créer un mot de passe" v-model="password" />
          <button class="submit" type="submit">S'inscrire</button>
        </form>
        <p class="compte">
          Vous avez déjà un compte ?
          <a href="#login" @click.prevent="showLoginPopup">Se connecter</a>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'SectionSignup',
  data() {
    return {
      showPopup: window.location.hash === '#signup' || !window.location.hash,
      username: '',
      email: '',
      password: '',
    };
  },
  methods: {
    async handleSignup() {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/signup', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            username: this.username,
            email: this.email,
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
        console.log('Inscription réussie:', data);
        alert('Inscription réussie. Vous pouvez maintenant vous connecter.');

        window.location.hash = '#login';
        window.location.reload();
      } catch (error) {
        console.error('Erreur réseau:', error);
        alert('Une erreur réseau est survenue.');
      }
    },
    showLoginPopup() {
      this.showPopup = false;
      window.location.hash = '#login';
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

.Signup {
  display: flex;
  width: 40%;
  margin-left: 30%;
}

.text,
.email,
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

@media screen and (max-width: 1200px) {

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
  width: 75%;
  max-width: 400px;
  text-align: center;
  margin-top: -40%;
}

.Signup {
  display: flex;
  width: 40%;
  margin-left: 30%;
}

.text,
.email,
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

}

</style>
