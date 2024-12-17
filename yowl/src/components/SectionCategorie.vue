<template>
  <div>
    <h2>Liste des catégories</h2>
   
  </div>
</template>

<script>
export default {
  name: 'SectionCategorie',
  
  mounted() {
    this.fetchCategories();
  },
  methods: {
    async fetchCategories() {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/categories');
        if (!response.ok) {
          throw new Error('Erreur lors de la récupération des catégories.');
        }
        const data = await response.json();
        this.categories = data;
      } catch (error) {
        console.error('Erreur lors de la récupération des catégories:', error);
      }
    },
  },
};
</script>
