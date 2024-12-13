   <template>
    <div>
      <div v-if="showPopup" class="popup-overlay">
        <div class="popup">
          <img class="Signup" src="@/assets/Signup.png">
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
      handleSignup() {
        console.log('Inscription avec:', this.username, this.email, this.password);
        
        window.location.hash = '#login'; 
        window.location.reload(); 
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


  .Signup{
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

  .email{
    display: flex;
    font-size: 110%;
    margin-top: 4%;
    margin-left: 23%;

  }
  .password{
    display: flex;
    width: 53.8%;
    font-size: 110%;
    margin-top: 4%;
    margin-left: 23%;
  }

  .submit{
    display: flex;
    font-size: 110%;
    margin-top: 7%;
    margin-left: 37%;
  }
  
  </style>
  

  

   