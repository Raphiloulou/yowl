<template>
    <div id="app">
      <header class="profile-header">
        <div class="profile-icon">
          <div class="icon-placeholder">Icon</div>
        </div>
        <div class="profile-info">
          <h1>JEAN-BENOIT</h1>
          <button class="edit-profile-btn">MODIFIER VOTRE PROFIL</button>
        </div>
      </header>
      <div class="recent-post">
        <h2>POST recent-post</h2>
        <div class="post-card">
          <div class="post-header">
            <span class="post-category">SPORT</span>
            <span class="post-time">9:52</span>
          </div>
          <div class="post-content">
            <div class="mask-placeholder">Masque de joueur</div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "SectionImg",
  };
  </script>
  
  <style>
  #app {
    font-family: Arial, sans-serif;
    padding: 20px;
  }
  
  .profile-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 2px solid #ccc;
    padding-bottom: 10px;
  }
  
  .profile-icon .icon-placeholder {
    width: 50px;
    height: 50px;
    background-color: #eee;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  .profile-info {
    text-align: right;
  }
  
  .edit-profile-btn {
    background-color: black;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
  }
  
  .recent-post {
    margin-top: 20px;
  }
  
  .post-card {
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 10px;
  }
  
  .post-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }
  
  .mask-placeholder {
    width: 100%;
    height: 200px;
    background-color: #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-style: italic;
  }
  </style>
  