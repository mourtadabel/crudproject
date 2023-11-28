<!-- je cree mon tableau  -->

<template>
  <div class="users-page">
    <h1>Liste des Utilisateurs</h1>
    <table class="users-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<!-- les données et les methodes utilisés  -->

<script>
export default {
  data() {
    return {
      users: []
    };
  },
  async mounted() {
    await this.fetchUsers();
  },
  methods: {
    async fetchUsers() {
  try {
    const response = await fetch('http://localhost/backend/get_users.php');
    this.users = await response.json();
    console.log(this.users); 
  } catch (error) {
    console.error('Erreur lors de la récupération des utilisateurs', error);
  }
}
  }
};
</script>


<!-- le Style de mon composant -->

<style scoped>
.users-page {
  padding: 20px;
}

.users-table {
  width: 100%;
  border-collapse: collapse;
}

.users-table th,
.users-table td {
  border: 1px solid #ddd;
  padding: 8px;
}

.users-table th {
  background-color: #f4f4f4;
}
</style>
