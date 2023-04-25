<template>
  <LoginModal @username="getUsername" />
  <SignupModal />
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!-- Logo e nome del sito -->
      <a class="navbar-brand" href="#">
        <img src="/images/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
        EURO2020
      </a>

      <!-- Icona del profilo -->
      <div class="navbar-nav ms-auto d-flex align-items-center">
        <a class="nav-link" href="#">
          <i class="fas fa-user-circle me-1" v-if="username"></i>
          <span v-if="username">Welcome {{ username }}</span>
        </a>
      </div>

      <!-- Pulsanti di Login e Signup -->
      <div class="navbar-nav d-flex align-items-center">
        <a class="nav-link" v-if="admin" href="/admin" >Admin</a>
        <a class="nav-link" v-if="username == null" href="#" data-bs-toggle="modal" data-bs-target="#loginModal" >Login</a>
        <a class="nav-link btn btn-primary" v-if="username == null" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</a>
        <a class="nav-link btn btn-outline-danger" v-if="username != null" @click="exit"  href="#">Esc</a>
      </div>
    </div>
  </nav>

</template>

<script>
import LoginModal from "./LoginModal";
import SignupModal from "./SignupModal";
import axios from 'axios';
export default {
  name: "Header",
  components: {SignupModal, LoginModal},
  data() {
    return {
      username:null,
      admin:false
    }
  },
  methods: {
    getUsername: function (username) {
      this.username = username
    },
    exit: function() {
      axios.get('/ajax/quit').then((response) => {
        window.location.href = '/';
      })
    }
  },
  mounted() {
    axios.get('/ajax/session').then((response) => {
      this.admin = response.data.isAdmin
      this.username = response.data.user
    })
  }
}
</script>

<style scoped lang="scss">
  .navbar {
    min-height: 6rem;
    width: 100%;
    background: lightgray;
  }
</style>