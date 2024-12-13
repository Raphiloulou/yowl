
   <template>
    <div>
      <div v-if="showPopup" class="popup-overlay">
        <div class="popup">
          <img class="Login" src="@/assets/Login.png">
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
      handleLogin() {
        console.log('Connexion avec:', this.identifier, this.password);
        this.closePopup();
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
    background: rgba(0, 0, 0, 0.5)
;
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

  .Login{
    display: flex;
    width: 40%;
    margin-left: 30%;

  }

  .text{
    display: flex;
    margin-left: 23%;
    font-size: 110%;
    /* background-color: #9f9d9d; */
   
   
  }
  .password{
    display: flex;
    margin-left: 23%;
    width: 53.8%;
    font-size: 110%;
    margin-top: 4%;
  }

  .submit{
    display: flex;
    font-size: 110%;
    margin-top: 7%;
    margin-left: 34%;
  }

  .compte{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }
  </style>
  