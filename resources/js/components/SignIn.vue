<template>
    <div>
      <form @submit.prevent="register">
        <div>
          <label for="name">Name:</label>
          <input type="text" id="name" v-model="form.name" required>
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="form.email" required>
        </div>
        <div>
          <label for="password">Password:</label>
          <input type="password" id="password" v-model="form.password" required>
        </div>
        <div>
          <button type="submit">Register</button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    name: 'SignIn',
    data() {
      return {
        form: {
          name: '',
          email: '',
          password: ''
        }
      }
    },
    methods: {
      async register() {
        const response = await fetch('/', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        },
        body: JSON.stringify(this.form),
    });
    const data = await response.json();
    console.log(data);
    // Handle success or failure
      }
    }
  }
  </script>
