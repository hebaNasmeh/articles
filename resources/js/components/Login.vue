<template>
  <div class="home col-5 mx-auto py-5 mt-5">
    <h1 class="text-center">Login</h1>
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label for="email">Email address:</label>
          <input
            type="email"
            v-model="form.email"
            class="form-control"
            id="email"
          />
          <span class="text-danger" v-if="errors.email">
            {{ errors.email[0] }}
          </span>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input
            type="password"
            v-model="form.password"
            class="form-control"
            id="password"
          />
          <span class="text-danger" v-if="errors.password">
            {{ errors.password[0] }}
          </span>
        </div>
        <button @click.prevent="login" class="btn btn-primary btn-block">
          Login
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import User from "../store/auth";
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      form: {
        email: "",
        password: ""
      },
      errors: []
    };
  },
  methods: {
    login() {
      User.login(this.form)
        .then((resp) => {
          this.$root.$emit("login", true);
          if(resp["data"]["success"] == false)
         {
           Swal.fire({
            title: 'OPPS',
            text:   "error",
            icon: 'warning',
        });
         }
         else
         {
        localStorage.setItem("auth", "true");
        //this.$router.push('article')
        location.replace("/article")
         }
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
            this.$router.push({path:"/login"})
          }
        });
    }
  }
};
</script>