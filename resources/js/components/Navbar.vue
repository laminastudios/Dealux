<!-- resources/js/components/Navbar.vue -->
<template>
  <nav class="navbar">
    <div class="container">
      <router-link to="/" class="navbar-brand">This is just a tester navbar</router-link>
      <ul class="navbar-nav">
        <li class="nav-item"><router-link to="/">Nav1</router-link></li>
        <li class="nav-item"><router-link to="/">Nav2</router-link></li>
        <li class="nav-item"><router-link to="/">Nav3</router-link></li>
        <li class="nav-item"><router-link to="/">Nav4</router-link></li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
};
</script>

<style scoped>
/* Add your CSS styling here */
.navbar {
  background-color: #333;
  color: #fff;
  padding: 1rem;
}
.navbar .container {
  display: flex;
  justify-content: space-between;
}
.navbar-nav {
  list-style: none;
  padding: 0;
}
.nav-item {
  display: inline;
  margin-left: 1rem;
}
.nav-item a {
  color: #fff;
  text-decoration: none;
}
</style>
