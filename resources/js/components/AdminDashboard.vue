<template>
    <div>
      <div>
        <form @submit.prevent>
          <div class="mb-3">
            <label for="Date" class="form-label">Date</label>
            <input type="text" id="Date" @click="toggleCalendar" readonly v-model="booking.booked_date">
            <div v-if="showCalendar">
              <v-date-picker v-model="booking.booked_date" :attributes="attrs" :min-date="today" :is-inline="true" @input="toggleCalendar"/>
            </div>
          </div>
          <div class="mb-3">
            <label for="time" class="form-label">Time</label>
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
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { ref, watch } from 'vue';
  import { Calendar, DatePicker as VDatePicker } from 'v-calendar';
  import 'v-calendar/dist/style.css';
  
  export default {
    components: {
      Calendar,
      VDatePicker,
    },
    setup() {
      const booking = ref({
        booked_date: null,
        booked_time: null,
      });
      const showCalendar = ref(false);
      const today = new Date().toISOString().split('T')[0];
  
      const toggleCalendar = () => {
        showCalendar.value = !showCalendar.value;
      };
  
      watch(() => booking.value.booked_date, (newValue) => {
        if (newValue) {
          // Format the date or handle changes as needed
        }
      });
  
      // Define any additional functions here and return them
      const getCurrentDateTime = () => {
        const now = new Date();
        // Formatting logic
        return `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}T${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}:${String(now.getSeconds()).padStart(2, '0')}`;
      };
  
      return { booking, showCalendar, toggleCalendar, today, getCurrentDateTime };
    },
  };
  </script>
  