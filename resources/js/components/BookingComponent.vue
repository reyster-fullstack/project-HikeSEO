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
            <option v-for="vehicle in vehicles" :key="vehicle.id" :value="vehicle.Make + ' - ' + vehicle.Model" >
                {{ vehicle.Make }} - {{ vehicle.Model }}
            </option>
          </select>
        </div>
        <div class="mb-3">
          <label for="Date" class="form-label">Date</label>
          <input type="text" id="Date" @click="toggleCalendar" readonly :value="formattedDate">
          
          <div v-if="showCalendar">
            <v-date-picker v-model="booking.booked_date" :attributes="attrs" :min-date="today" :format="dateFormat" is-inline></v-date-picker>
          </div>
          
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Time</label>
          <select name="time" id="time" class="form-select" v-model="booking.booked_time">
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
  import { Calendar, DatePicker as VDatePicker } from 'v-calendar';
  import 'v-calendar/dist/style.css';
  import { ref, computed  } from 'vue';
  
  export default {
    data() {
      return {
          user: {}, // Initialize user
          booking: {
          name: '',
          email: '',
          phone: '',
          vehicle_model: '',
          booked_date: '',
          booked_time: '',
          booking_date: '',
        },

      components: {
        Calendar,
        VDatePicker,
      },
        vehicles: [],
        bookings: [],
      };
      
    },
    created() {
      this.fetchVehicles();
      this.fetchBookings();
      this.fetchUserData();

    },
    setup() {

      
      const booking = ref({
        booked_date: null,
        });

        const user = ref({
          name: '',
          email: '',
        });

        // Define getCurrentDateTime and resetForm here if they are not already defined
        // Assuming these functions are defined somewhere within setup()

        // Moved fetchUserData function definition here so it's defined before being called
        const fetchUserData = () => {
          const userData = localStorage.getItem('user');

          if (userData) {
            user.value = JSON.parse(userData);
          }
        };

        // Now that fetchUserData is defined, it can be called.
       

      const  getCurrentDateTime =()=> {
      const now = new Date();
      const year = now.getFullYear();
      const month = (now.getMonth() + 1).toString().padStart(2, '0'); // JS months are 0-based
      const day = now.getDate().toString().padStart(2, '0');
      const hours = now.getHours().toString().padStart(2, '0');
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const seconds = now.getSeconds().toString().padStart(2, '0');

      

      return `${year}-${month}-${day}T${hours}:${minutes}:${seconds}`;
    };


        const dateFormat = 'YYYY-MM-DD';
        const showCalendar = ref(false);
        const today = new Date().toISOString().split('T')[0];
        const toggleCalendar = () => (showCalendar.value = !showCalendar.value);

        const formattedDate = computed(() => {
          if (booking.value.booked_date) {
            let date = new Date(booking.value.booked_date);
            // This assumes you have a booked_date in the correct format.
            return date.toLocaleDateString('en-CA', { year: 'numeric', month: '2-digit', day: '2-digit' });
            
          }
          return '';
        });

        const submitBooking = () => {
          // Ensure booking.value is used to access and modify its properties
          if (booking.value.booked_date) {
            let date = new Date(booking.value.booked_date);

            // Adjust for the timezone offset
            date = new Date(date.getTime() - (date.getTimezoneOffset() * 60000));

            // Format the date
            const formattedPreventDate = date.toISOString().split('T')[0];
            booking.value.booked_date = formattedPreventDate; // Use booking.value to set the date
            booking.value.email = user.value.email; // Assuming user is also a ref, use user.value
            booking.value.name = user.value.name; // Assuming user is also a ref, use user.value
            booking.value.booking_date = getCurrentDateTime(); // Assuming getCurrentDateTime() is accessible

            axios.post('http://localhost:8000/api/booking', booking.value) 
              .then(response => {
                alert('Booking submitted successfully!');
                resetForm(); // Assuming resetForm is a function you've defined that resets booking.value's properties
              })
              .catch(error => {
                console.error("There was an error submitting the booking: ", error);
              });
          }
        };

        const resetForm=()=> {
          this.booking = {
            email: '',
            phone: '',
            vehicle_model: '',
            booking_date: '',
          };
        };

        
      return { booking, user, showCalendar, toggleCalendar, dateFormat, today, formattedDate, submitBooking };
    },
    methods: {


      
      async fetchBookings(date = null) {
        try {
          // Build the URL with a query parameter if a date is provided
          let url = 'http://localhost:8000/api/booking';
          if (date) {
            url += `?date=${date}`;
          }

          const response = await axios.get(url);
          this.bookings = response.data;
          const booking = response.data;
          console.log(booking);
          //localStorage.setItem('booking', JSON.stringify(response.data));
        } catch (error) {
          console.error("There was an error fetching the bookings: ", error);
        }
      },

      isWeekend(date) {
        const day = new Date(date).getDay();
        return day === 0 || day === 6; // 0 for Sunday, 6 for Saturday
      },
      
        fetchVehicles() {
        axios.get('/api/vehicles')
            .then(response => {
            this.vehicles = response.data;
            const vehicle = response.data;
            localStorage.setItem('vehicleMakeModels', JSON.stringify(vehicle));
            })
            .catch(error => {
            console.error("There was an error fetching the vehicles: ", error);
            });
        },
      fetchUserData() {
      const userData = localStorage.getItem('user');

      if (userData) {
            this.user = JSON.parse(userData);
        }
    },
    


    
  },
};
  
  </script>