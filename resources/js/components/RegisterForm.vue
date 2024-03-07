<template>
  <div class="w-100 d-flex justify-content-center mt-5">
    <div class="w-50 border p-5">
      <form @submit.prevent="register">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input v-model="form.name" class="form-control" type="text" placeholder="Name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input v-model="form.email" class="form-control" type="email" placeholder="Email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input v-model="form.password" class="form-control" type="password" placeholder="Password">
        </div>
        <div class="mb-3">
          <label for="confirmpasssword" class="form-label">Email address</label>
          <input v-model="form.password_confirmation" class="form-control" type="password" placeholder="Confirm Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
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
          alert('Registration successful'); // Notify user of success
          //window.location.href = '/dashboard'; // Redirect on success
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
  