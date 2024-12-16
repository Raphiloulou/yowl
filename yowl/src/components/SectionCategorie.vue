<template>
    <div>
      <h2>Liste des catégories</h2>
      <ul>
        <li v-for="category in categories" :key="category.id">{{ category.name }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    name: 'SectionCategorie',
    data() {
      return {
        categories: [], // Liste des catégories reçues
      };
    },
    mounted() {
      // Appel à l'API lorsque le composant est monté
      this.fetchCategories();
    },
    methods: {
      async fetchCategories() {
        try {
          const response = await fetch('http://votre-domaine-ou-ip/api/categories'); // Mettre l'URL complète de votre API
          const data = await response.json();
          this.categories = data; // Assigner les données reçues
        } catch (error) {
          console.error('Erreur lors de la récupération des catégories:', error);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  /* Ajoutez votre style ici */
  </style>
  