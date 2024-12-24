<template>
  <div class="section-posts">
    <img class="barregris" src="@/assets/barregris.png">

    <div class="create-post-container">
      <form @submit.prevent="createPost" class="create-post-form">
        <input
          class="post-title"
          type="text"
          v-model="newPost.title"
          placeholder="Titre du post"
        />
        <textarea
          class="post-content"
          v-model="newPost.content"
          placeholder="Que voulez-vous partager ?"
        ></textarea>
        <button class="post-submit" type="submit">Créer un post</button>
      </form>
    </div>

    <div class="posts-list">
      <div
        v-for="post in posts"
        :key="post.id"
        class="post-card"
      >
        <div class="post-header">
          <div class="post-user-info">
            <p class="post-user-name">
              {{ post.user?.name || 'Utilisateur inconnu' }}
            </p>
            <p class="post-timestamp">
              {{ post.created_at ? formatDate(post.created_at) : 'Date inconnue' }}
            </p>
          </div>
        </div>

        <div class="post-body">
          <h3>{{ post.title }}</h3>
          <p class="post-text">{{ post.content }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SectionPosts",
  data() {
    return {
      posts: [], 
      newPost: {
        title: "",
        content: "",
        category_id: 10, 
      },
    };
  },
  methods: {
    async fetchPosts() {
      try {
        const response = await fetch("http://127.0.0.1:8000/api/posts");
        if (!response.ok) throw new Error("Erreur lors de la récupération des posts.");
        const data = await response.json();
        this.posts = data.data; 
      } catch (error) {
        console.error(error);
        alert("Impossible de charger les posts.");
      }
    },

    async createPost() {
      try {
        const user = JSON.parse(localStorage.getItem("user"));
        if (!user || !user.id) {
          alert("Vous devez être connecté pour créer un post.");
          return;
        }

        const response = await fetch("http://127.0.0.1:8000/api/posts", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
          },
          body: JSON.stringify({
            ...this.newPost,
            user_id: user.id, 
          }),
        });

        if (!response.ok) {
          const errorData = await response.json();
          throw new Error(errorData.message || "Erreur lors de la création du post.");
        }

        const newPost = await response.json();
        this.posts.unshift(newPost.data); 
        this.newPost.title = "";
        this.newPost.content = "";
        alert("Post créé avec succès !");
      } catch (error) {
        console.error(error);
        alert("Impossible de créer le post. Vérifiez vos données.");
      }
    },

    formatDate(date) {
      return new Date(date).toLocaleString();
    },
  },
  mounted() {
    this.fetchPosts();
  },
};
</script>

<style scoped>
.section-posts {
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}

.create-post-container {
  margin-bottom: 20px;
}

.create-post-form {
  display: flex;
  flex-direction: column;
}

.post-title {
  display: flex;
  width: 12%;
  height: 25px;
  text-align: center;
  border-radius: 5px;
  margin-top: -4.7%;
  margin-left: -0.5%;
}

.post-content {
  display: flex;
  width: 100%;
  height: 25px;
  resize: none;
  margin-left: 15%;
  margin-top: -3.9%;
  border-radius: 5px;
  text-align: left;
}

.post-submit {
  display: flex;
  margin-top: -3.8%;
  margin-left: 118%;
  width: 13%;
  height: 31px;
  border-radius: 5px;
  text-align: center;
}

.posts-list {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.post-card {
  border: 1px solid #ccc;
  border-radius: 8px;
  padding: 15px;
  background-color: #fff;
}

.post-header {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.post-user-info {
  display: flex;
  flex-direction: column;
}

.post-user-name {
  font-weight: bold;
}

.post-timestamp {
  color: #666;
  font-size: 0.9em;
}

.post-body {
  margin-bottom: 10px;
}

.post-text {
  margin-bottom: 10px;
}

.barregris {
  display: flex;
  width: 137%;
  margin-top: -55%;
  margin-left: -2.5%;
  border-radius: 10px;
  height: 45px;
}
</style>
