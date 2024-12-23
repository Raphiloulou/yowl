<template>
  <div class="categories-container">
    <h2>Catégories</h2>
    <ul>
      <li 
        v-for="category in categories" 
        :key="category.id" 
        @click="selectCategory(category.id)" 
        :class="{ selected: selectedCategory === category.id }"
      >
        {{ category.name }}
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'SectionCategorie',
  data() {
    return {
      categories: [],
      selectedCategory: null,
    };
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
    selectCategory(categoryId) {
      this.selectedCategory = categoryId;
      this.$emit('categorySelected', categoryId); 
    },
  },
  mounted() {
    this.fetchCategories();
  },
};
</script>

<style scoped>
.categories-container {
  width: 200px;
  background-color: #f4f4f4;
  padding: 10px;
  border-radius: 5px;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  padding: 8px 10px;
  cursor: pointer;
}
li.selected {
  background-color: #d4d4d4;
  font-weight: bold;
}
</style>
