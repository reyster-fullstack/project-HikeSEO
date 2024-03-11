<template>
  <div class="container">
    <form @submit.prevent="submitPrevent">
      <div class="mb-3">
        <label for="Date" class="form-label">Date</label>
        <input type="text" id="Date" @click="toggleCalendar" readonly v-model="prevent.prevent_date">
        <div v-if="showCalendar">
          <v-date-picker v-model="prevent.prevent_date" :attributes="attrs" :min-date="today" :is-inline="true" @input="toggleCalendar"/>
        </div>
      </div>
      <div class="mb-3">
        <label for="time" class="form-label">Time</label>
        <select name="time" id="time" v-model="prevent.prevent_time" class="form-select">
          <!-- Time options -->
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
import { ref, watch } from 'vue';
import { Calendar, DatePicker as VDatePicker } from 'v-calendar';
import 'v-calendar/dist/style.css';
import axios from 'axios';

export default {
  components: {
    Calendar,
    VDatePicker,
  },
  setup() {
    const prevent = ref({
      prevent_date: null,
      prevent_time: null,
    });
    const showCalendar = ref(false);
    const today = new Date().toISOString().split('T')[0];
    const toggleCalendar = () => showCalendar.value = !showCalendar.value;

    // Watcher to format the date
    watch(() => prevent.value.prevent_date, (newValue) => {
      if (newValue) {
        const formattedDate = new Date(newValue).toISOString().split('T')[0];
        prevent.value.prevent_date = formattedDate;
      }
    });

    const submitPrevent = () => {
      // Use axios to send prevent data to your backend
      axios.post('YOUR_BACKEND_ENDPOINT', prevent.value)
        .then(response => {
          console.log(response);
          alert('Submission successful!');
          // Reset form or perform other actions as needed
        })
        .catch(error => {
          console.error(error);
          alert('An error occurred.');
        });
    };

    return { prevent, showCalendar, toggleCalendar, today, submitPrevent };
  },
}
</script>