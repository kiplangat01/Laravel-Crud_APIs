<template>
    <div>
      <h1>Tasks</h1>
      <ul>
        <li v-for="task in tasks" :key="task.id">
          {{ task.title }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default{
    data() {
      return {
        tasks: [],
      };
    },
    mounted() {
      axios.get('/api/tasks')
        .then(response => {
          this.tasks = response.data.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
  };
  </script>
  