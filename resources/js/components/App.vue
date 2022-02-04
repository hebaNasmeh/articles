<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#">VUE.JS</router-link>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav" v-if="!auth">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/login" class="nav-item nav-link">login</router-link>
                    <router-link to="/register" class="nav-item nav-link">Register</router-link>
                </div>
                <div class="navbar-nav" v-else>
                        <router-link exact-active-class="active" to="/" class="nav-item nav-link">Home</router-link>
                        <router-link exact-active-class="active" to="/article" class="nav-item nav-link">Article</router-link>
                        <a class="nav-item nav-link" style="cursor: pointer;" @click="logout">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>
 
<script>
import User from "../store/auth";
export default {
  data() {
    return {
      user: null,
    };
  },
  created () {
         if(localStorage.auth){
            this.auth = true
         }
     },
  mounted() {
    User.auth().then(response => {
      this.user = response.data;
    });
  },
  methods:{
       logout(){
            User.logout()
        .then((resp) => {
          localStorage.removeItem("auth");
          ///this.$router.push('login')
          location.replace("../login")
        })
        }
  }
}
</script>