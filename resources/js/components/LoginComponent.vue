<template>
  <div class="w-100 d-flex justify-content-center mt-5">
    <div class="w-50 border p-5">
      <form @submit.prevent="login">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input v-model="form.email" class="form-control" type="email" placeholder="Email" />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input v-model="form.password" class="form-control" type="password" placeholder="Password" />
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

export default {
  name: 'LoginComponent',
  data() {
    return {
      form: {
        email: '',
        password: '',
      },
    };
  },
  methods: {
    login() {
    axios.post('/login', {
        email: this.form.email, // Corrected from this.email to this.form.email
        password: this.form.password // Corrected from this.password to this.form.password
    })
    .then(response => {
        // Storing user data in local storage or handling it as needed.
        localStorage.setItem('user', JSON.stringify(response.data));

        // Redirecting to another page or component upon successful login.
        // Ensure you have 'home' route defined in your Vue router
        window.location.href = '/booking';
    })
    .catch(error => {
    let errorMessage = "An error occurred";
    if (error.response) {
        // The request was made and the server responded with a status code
        // that falls out of the range of 2xx
        console.log(error.response.data);
        console.log(error.response.status);
        console.log(error.response.headers);
        errorMessage = error.response.data.message || `Request failed with status code ${error.response.status}`;
    } else if (error.request) {
        // The request was made but no response was received
        console.log(error.request);
        errorMessage = "No response was received";
    } else {
        // Something happened in setting up the request that triggered an Error
        console.log('Error', error.message);
        errorMessage = error.message;
    }
    console.error("Login failed: ", errorMessage);
});

},
    async fetchUserData() {
      try {
        const response = await axios.get('/api/user');
        localStorage.setItem('user', JSON.stringify(response.data)); // Save user data to local storage
        // Redirect or perform other actions after saving user data
      } catch (error) {
        console.error("There was an error fetching the user data: ", error);
        // Handle error
      }
    },
  },
};
</script>
