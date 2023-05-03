<template>
  <div>
    <form @submit.prevent="submitForm">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" v-model="user.name" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" v-model="user.email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" v-model="user.password" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  props: ['userId'],
  data() {
    return {
      user: {
        name: '',
        email: '',
        password: '',
      },
    };
  },
  created() {
    if (this.userId) {
      this.loadUser();
    }
  },
  methods: {
    loadUser() {
      axios.get(`/api/users/${this.userId}`).then(response => {
        this.user = response.data;
      });
    },
    submitForm() {
      const data = {
        name: this.user.name,
        email: this.user.email,
        password: this.user.password,
      };
      const method = this.userId ? 'put' : 'post';
      const url = this.userId ? `/api/users/${this.userId}` : '/api/users';

      axios[method](url, data)
        .then(() => {
          this.$emit('formSubmitted');
        })
        .catch(error => {
          console.log(error.response.data.errors);
        });
    },
  },
};
</script>
