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
        <a href="/registration">registration</a>
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
            email: this.form.email, // Using the corrected references to form data
            password: this.form.password
        })
        .then(response => {
            
            const user = response.data; 
            console.log(response.data.role);

            
            localStorage.setItem('user', JSON.stringify(user));

        
            switch(response.data.role) {
                case 'Admin':
                    window.location.href = '/admin'; 
                    break;
                case 'User':
                    window.location.href = '/booking'; 
                    break;
                default:
                    window.location.href = '/'; 
                    break;
            }
        
        })
        .catch(error => {
            let errorMessage = "An error occurred";
            if (error.response) {
                // Handle errors based on the response from the server
                console.log(error.response.data);
                console.log(error.response.status);
                console.log(error.response.headers);
                errorMessage = error.response.data.message || `Request failed with status code ${error.response.status}`;
            } else if (error.request) {
                // The request was made but no response was received
                console.log(error.request);
                errorMessage = "No response was received";
            } else {
                // An error occurred in setting up the request
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
