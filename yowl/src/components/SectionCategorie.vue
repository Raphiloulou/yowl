<template>
  <div class="categories-container">
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
  data() {
    return {
      categories: [
        { id: 1, name: "All" },
        { id: 2, name: "Séries et films" },
        { id: 3, name: "Politique" },
        { id: 4, name: "Art" },
        { id: 5, name: "Sport" },
      ],
      selectedCategory: 1,
    };
  },
  methods: {
    selectCategory(categoryId) {
      this.selectedCategory = categoryId;
    },
  },
};
</script>

<style scoped>
.categories-container {
  position: absolute;
  left: -8px;
  top: 17%;
  width: 240px;
  background-color: rgba(128, 128, 128, 0.151);
  padding: 10px;
  border-radius: 8px;
 
}

ul {
  display: flex;
  flex-direction: column;
  gap: 30px;
  list-style-type: none;
  margin: 10%;
  padding: 0;
}

li {
  padding: 8px 10px;
  font-size: 14px;
  background-color: white;
  border-radius: 4px;
  text-align: center;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

li:hover {
  background-color: white;
}

li.selected {
  background-color: white;
  font-weight: bold;
}

@media screen and (max-width: 1200px) {

  .categories-container {
  position: absolute;
  left: -10.5px;
  top: 6%;
  width: 80px;
  background-color: rgba(128, 128, 128, 0.151);
  padding: 10px;
  border-radius: 8px;
 
}

ul {
  display: flex;
  flex-direction: column;
  gap: 10px;
  list-style-type: none;
  margin: 10%;
  padding: 0;
}

li {
  padding: 8px 10px;
  font-size: 14px;
  background-color: white;
  border-radius: 4px;
  text-align: center;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

li:hover {
  background-color: white;
}

li.selected {
  background-color: white;
  font-weight: bold;
}
}
</style>
