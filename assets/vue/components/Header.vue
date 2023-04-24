<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <!-- Logo e nome del sito -->
      <a class="navbar-brand" href="#">
        <img src="/path/to/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
        EURO
      </a>

      <!-- Icona del profilo -->
      <div class="navbar-nav ms-auto d-flex align-items-center">
        <a class="nav-link" href="#">
          <i class="fas fa-user-circle me-1"></i>
          Nome Utente
        </a>
      </div>

      <!-- Pulsanti di Login e Signup -->
      <div class="navbar-nav d-flex align-items-center">
        <a class="nav-link" href="#">Login</a>
        <a class="nav-link btn btn-primary" href="#">Signup</a>
      </div>
    </div>
  </nav>

</template>

<script>
export default {
  name: "Header"
}
</script>

<style scoped lang="scss">
  header {
    min-height: 4rem;
    width: 100%;
    background: lightgray;
  }
</style>