<template>
  <div class="container">
    <form @submit.prevent="submitPrevent">
      <div class="mb-3">
        <label for="Date" class="form-label">Date</label>
        <input type="text" id="Date" @click="toggleCalendar" readonly :value="formattedDate">
        <div v-if="showCalendar">
          <v-date-picker v-model="prevent.prevent_date" :attributes="attrs" :min-date="today" :is-inline="true" @input="toggleCalendar"/>
        </div>
      </div>
      <div class="mb-3">
        <label for="time" class="form-label">Time</label>
        <select name="time" id="time" v-model="prevent.prevent_time" class="form-select">
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
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
import { ref, computed , onMounted  } from 'vue';
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

    const formattedDate = computed(() => {
      if (prevent.value.prevent_date) {
        const date = new Date(prevent.value.prevent_date);
        return date.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
      }
      return '';
    });


    const availableTimes = ref([]);

    

      const submitPrevent = () => {

          if (prevent.value.prevent_date) {
          // Create a new date object for the selected date
          let date = new Date(prevent.value.prevent_date);

          // Adjust the date object for the timezone offset
          date = new Date(date.getTime() - (date.getTimezoneOffset() * 60000));

          // Format the date as 'Y-M-D'
          const formattedPreventDate = date.toISOString().split('T')[0];

          let formData = {
            prevent_date: formattedPreventDate,
            prevent_time: prevent.value.prevent_time,
          };

          axios.post('/prevent-date-time', formData)
            .then(response => {
              console.log(response);
              alert('Submission successful!');
            })
            .catch(error => {
              console.error(error);
              if (error.response) {
                // Provides more detailed information about the error
                console.log(error.response.data);
              }
              alert('An error occurred.');
            });
        }
      };

    return { prevent, showCalendar, toggleCalendar, today, submitPrevent, availableTimes, formattedDate  };
  },
}
</script>