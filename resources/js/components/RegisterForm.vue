<template>
    <div>
      <form @submit.prevent="register">
        <input v-model="form.name" type="text" placeholder="Name">
        <input v-model="form.email" type="email" placeholder="Email">
        <input v-model="form.password" type="password" placeholder="Password">
        <input v-model="form.password_confirmation" type="password" placeholder="Confirm Password">
        <button type="submit">Register</button>
      </form>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  
  export default {
    name: 'RegistrationForm',
    setup() {
      const form = ref({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      });
  
      const register = async () => {
        const response = await fetch('/register', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Add this line
          },
          body: JSON.stringify(form.value),
        });
  
        if (response.ok) {
          // Handle success
          console.log('User registered successfully');
        } else {
          // Handle error
          console.error('Registration failed');
        }
      };
  
      return {
        form,
        register,
      };
    },
  };
  </script>
  