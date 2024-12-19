<template>
    <div class="section-posts">
        <img class="barregris" src="@/assets/barregris.png">

      <div class="create-post-container">
        <form @submit.prevent="createPost" class="create-post-form">
          <input class="post-title" type="text" v-model="newPost.title" placeholder="Titre du post" />
          <textarea class="post-content" v-model="newPost.content" placeholder="Que voulez-vous partager ?"></textarea>
          <button class="post-submit" type="submit">Créer un post</button>
        </form>
      </div>
  
      <!-- Liste des posts -->
      <div class="posts-list">
        <div v-for="post in posts" :key="post.id" class="post-card">
          <div class="post-header">
            <img class="post-profile-pic" :src="post.user.profile_picture || defaultProfilePic" alt="Photo de profil" />
            <div class="post-user-info">
              <p class="post-user-name">{{ post.user.name }}</p>
              <p class="post-timestamp">{{ formatDate(post.created_at) }}</p>
            </div>
          </div>
  
          <div class="post-body">
            <p class="post-text">{{ post.content }}</p>
            <img v-if="post.image" :src="post.image" alt="Image du post" class="post-image" />
          </div>
  
          <div class="post-footer">
            <button class="post-like" @click="likePost(post.id)">👍 {{ post.likes }}</button>
            <button class="post-dislike" @click="dislikePost(post.id)">👎 {{ post.dislikes }}</button>
            <button class="post-comment">💬 Commenter</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'SectionPosts',
    data() {
      return {
        posts: [],
        newPost: {
          title: '',
          content: '',
        },
        defaultProfilePic: 'https://via.placeholder.com/50', // Image par défaut
      };
    },
    methods: {
      async fetchPosts() {
        try {
          const response = await fetch('http://127.0.0.1:8000/api/posts', {
            headers: {
              Authorization: `Bearer ${this.getToken()}`,
            },
          });
          if (!response.ok) throw new Error('Erreur lors de la récupération des posts');
          this.posts = await response.json();
        } catch (error) {
          console.error(error);
          alert('Impossible de charger les posts.');
        }
      },
      async createPost() {
        try {
          const response = await fetch('http://127.0.0.1:8000/api/posts', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              Authorization: `Bearer ${this.getToken()}`,
            },
            body: JSON.stringify(this.newPost),
          });
          if (!response.ok) throw new Error('Erreur lors de la création du post');
          const post = await response.json();
          this.posts.unshift(post);
          this.newPost.title = '';
          this.newPost.content = '';
        } catch (error) {
          console.error(error);
          alert('Impossible de créer le post.');
        }
      },
      likePost(postId) {
        console.log(`Liked post ${postId}`);
      },
      dislikePost(postId) {
        console.log(`Disliked post ${postId}`);
      },
      formatDate(date) {
        return new Date(date).toLocaleTimeString();
      },
      getToken() {
        const user = JSON.parse(localStorage.getItem('user'));
        return user ? user.token : null;
      },
    },
    mounted() {
      if (this.getToken()) this.fetchPosts();
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
    margin-bottom: 10px;
  }
  
  .post-content {
    margin-bottom: 10px;
  }
  
  .post-submit {
    align-self: flex-end;
    display: flex;
    margin-top: -12.3%;
    margin-left: auto;
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
  
  .post-profile-pic {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
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
  
  .post-image {
    width: 100%;
    border-radius: 8px;
  }
  
  .post-footer {
    display: flex;
    justify-content: space-around;
  }
  
  .post-like,
  .post-dislike,
  .post-comment {
    background: none;
    border: none;
    cursor: pointer;
  }

  .barregris{
    display: flex;
    width: 130%;
    margin-top: -55%;
    border-radius: 10px;
  }
  </style>
  