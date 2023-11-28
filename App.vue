<!-- le contenue de ma page  -->

<template>
  <div id="app">
    <header>
      <nav>
        <button @click="currentView = 'home'">Home</button>
        <button @click="currentView = 'users'">Users</button>
      </nav>
    </header>

    <main>
      <HomePage v-if="currentView === 'home'"></HomePage>
      <UsersPage v-if="currentView === 'users'"></UsersPage>
    </main>
  </div>
</template>


<!-- les données et les methodes utilisés  -->

<script>
import HomePage from './components/HomePage.vue';
import UsersPage from './components/UsersPage.vue';

export default {
  components: {
    HomePage,
    UsersPage
  },
  data() {
    return {
      currentView: 'home',
    };
  }
};
</script>


<!-- le style de ma page  -->

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

header {
  background-color: #34495e;
  padding: 16px 0;
}

nav button {
  margin: 0 10px;
  background-color: #2ecc71;
  border: none;
  padding: 10px 20px;
  color: white;
  cursor: pointer;
  border-radius: 5px;
  font-size: 16px;
  outline: none;
}

nav button:hover {
  background-color: #27ae60;
}

main {
  margin-top: 20px;
}
</style>