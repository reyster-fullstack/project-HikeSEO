<!-- resources/js/components/BookingComponent.vue -->
<template>
    <div class="container">
      <form @submit.prevent="submitBooking">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" v-model="user.name" readonly>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" v-model="user.email" readonly>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phone" v-model="booking.phone" required>
        </div>
        <div class="mb-3">
          <label for="vehicleMakeModel" class="form-label">Vehicle</label>
          
          <select class="form-select" aria-label="Select Vehicle" v-model="booking.vehicle_model" required>
            <option v-for="vehicle in vehicles" :key="vehicle.id" :value="vehicle.id" >
                {{ vehicle.Make }} - {{ vehicle.Model }}
            </option>
          </select>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Date</label>
          <v-date-picker v-model="booking.date" :attributes="attrs" :min-date="today" is-inline></v-date-picker>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Time</label>
          <select name="time" id="time" class="form-select">
            <option value="09:00">09:00</option>
            <option value="09:30">09:30</option>
            <option value="10:00">10:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="11:30">11:30</option>
            <option value="12:00">12:00</option>
            <option value="12:30">12:30</option>
            <option value="01:00">01:00</option>
            <option value="01:30">01:30</option>
            <option value="02:00">02:00</option>
            <option value="02:30">02:30</option>
            <option value="03:00">03:00</option>
            <option value="03:30">03:30</option>
            <option value="04:00">04:00</option>
            <option value="04:30">04:30</option>
            <option value="05:00">05:00</option>
            <option value="05:30">05:30</option>
          </select>
        </div>
        <input type="hidden" :value="booking.booking_date">

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
          user: {}, // Initialize user
          booking: {
          name: '',
          email: '',
          phone: '',
          vehicle_model: '',
          booking_date: '',
        },
        vehicles: [],
      };
      
    },
    created() {
      this.fetchVehicles();

      this.fetchUserData();

    },
    methods: {
        fetchVehicles() {
        axios.get('/api/vehicles')
            .then(response => {
            this.vehicles = response.data;
            })
            .catch(error => {
            console.error("There was an error fetching the vehicles: ", error);
            });
        },
      fetchUserData() {
      const userData = localStorage.getItem('user');

      if (userData) {
            this.user = JSON.parse(userData);

            console.log(userData);
        }
    },
    getCurrentDateTime() {
      const now = new Date();
      const year = now.getFullYear();
      const month = (now.getMonth() + 1).toString().padStart(2, '0'); // JS months are 0-based
      const day = now.getDate().toString().padStart(2, '0');
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const seconds = now.getSeconds().toString().padStart(2, '0');

      return `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
    },
    submitBooking() {
      // Assign user details to the booking object before submission
      this.booking.email = this.user.email;
      this.booking.name = this.user.name;
      this.booking.booking_date = this.getCurrentDateTime();

      axios.post('http://localhost:8000/api/booking', this.booking) 
        .then(response => {
          alert('Booking submitted successfully!');
          this.resetForm(); // Clear the form after successful submission
        })
        .catch(error => {
          console.error("There was an error submitting the booking: ", error);
        });
    },

    resetForm() {
      this.booking = {
        email: '',
        phone: '',
        vehicle_model: '',
        booking_date: '',
      };
    },
  },
};
  
  </script>