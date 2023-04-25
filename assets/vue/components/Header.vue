<template>
  <LoginModal @username="getUsername"/>
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
          <i class="fas fa-user-circle me-1"></i>
          <span v-if="username">Welcome {{ username }}</span>
          <span v-else>User</span>
        </a>
      </div>

      <!-- Pulsanti di Login e Signup -->
      <div class="navbar-nav d-flex align-items-center">
        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal" >Login</a>
        <a class="nav-link btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Signup</a>
      </div>
    </div>
  </nav>

</template>

<script>
import LoginModal from "./LoginModal";
import SignupModal from "./SignupModal";
export default {
  name: "Header",
  components: {SignupModal, LoginModal},
  data() {
    return {
      username:null
    }
  },
  methods: {
    getUsername(username) {
      this.username = username
    }
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