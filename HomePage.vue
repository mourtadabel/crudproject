<!-- je cree mon formulaire  -->

<template>
  <div class="home">
    <h1>Inscription</h1>
    <form @submit.prevent="submitForm">
      <div>
        <label for="name">Nom:</label>
        <input type="text" id="name" v-model="name" required >
      </div>
      <div>
        <label for="email">E-mail:</label>
        <input type="email" id="email" v-model="email" required >
      </div>
      <div>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" v-model="password" required >
      </div>
      <div>
        <button type="submit">S'inscrire</button>
      </div>
    </form>   
    <!-- Cela va m'afficher si l'inscription a été bien faite ou non -->
    <p v-if="serverResponse">{{ serverResponse }}</p>  

  </div>
</template>


<!-- les données et les méthodes utilisés  -->

<script>
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      serverResponse: '',
    };
  },
  methods: {
    async submitForm() {
            // Ici j'envoie ma requete https pour lier entre mon Front et mon mon back 
            const response = await fetch('http://localhost/backend/add_user.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: new URLSearchParams({
                name: this.name,
                email: this.email,
                password: this.password
              })
            });
            this.serverResponse = await response.text();
    }
}
}
</script>


<!-- le Style de mon composant -->

<style scoped>
  .home {
      max-width: 300px;
      margin: auto;
      padding: 20px;
    }
    
   .home div {
      margin-bottom: 10px;
    }
    
  label {
      display: block;
    }
    
  input[type=email],
  input[type=password], 
  input[type=text]
    {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
    }
    
  button {
      width: 100%;
      padding: 10px;
      background-color: #3498db;
      border: none;
      color: white;
      cursor: pointer;
    }
    
  button:hover {
      background-color: #2980b9;
    }
  </style>