<!-- <template>
    <div class="post-details">
      <div class="post-content">
        <h2>{{ post.title }}</h2>
        <p>{{ post.content }}</p>
        <small>Par {{ post.user?.name || 'Utilisateur inconnu' }}</small>
      </div>
      <div class="comments-section">
        <h3>Commentaires</h3>
        <ul>
          <li v-for="comment in comments" :key="comment.id">
            {{ comment.content }} - <small>{{ comment.user?.name || 'Utilisateur inconnu' }}</small>
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      post: {
        type: Object,
        required: true,
      },
    },
    data() {
      return {
        comments: [],
      };
    },
    methods: {
      async fetchComments() {
        try {
          const response = await fetch(`http://127.0.0.1:8000/api/posts/${this.post.id}/comments`);
          if (!response.ok) throw new Error('Erreur lors de la récupération des commentaires');
          this.comments = await response.json();
        } catch (error) {
          console.error(error);
          alert('Impossible de charger les commentaires.');
        }
      },
    },
    mounted() {
      this.fetchComments();
    },
  };
  </script>
  
  <style scoped>
  .post-details {
    display: flex;
    justify-content: space-between;
  }
  
  .post-content {
    width: 60%;
  }
  
  .comments-section {
    width: 35%;
    background-color: #f4f4f4;
    padding: 10px;
    border-radius: 5px;
  }
  </style>
   -->