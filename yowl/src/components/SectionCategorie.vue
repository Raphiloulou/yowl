<template>
  <div>
    <h2>Liste des catégories</h2>
    <ul>
      <li v-if="categories[0]">{{ categories[0].name }}</li>
      <li v-if="categories[1]">{{ categories[1].name }}</li>
      <li v-if="categories[2]">{{ categories[2].name }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'SectionCategorie',
  data() {
    return {
      categories: [],
    };
  },
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
