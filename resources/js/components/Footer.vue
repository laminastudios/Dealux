<!-- resources/js/components/Footer.vue -->
<template>
  <footer class="footer">
    <div class="container">
      <p>&copy; {{ currentYear }} This is just a tester. All rights reserved.</p>
      <ul class="footer-nav">
        <li class="nav-item"><router-link to="/">Privacy Policy</router-link></li>
        <li class="nav-item"><router-link to="/">Terms of Service</router-link></li>
        <li class="nav-item"><router-link to="/">Contact Us</router-link></li>
      </ul>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
  data() {
    return {
      currentYear: new Date().getFullYear()
    };
  }
};
</script>

<style scoped>
/* Add your CSS styling here */
.footer {
  background-color: #333;
  color: #fff;
  padding: 1rem;
  text-align: center;
}
.footer .container {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.footer-nav {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  justify-content: center;
}
.nav-item {
  margin: 0 1rem;
}
.nav-item a {
  color: #fff;
  text-decoration: none;
}
</style>
