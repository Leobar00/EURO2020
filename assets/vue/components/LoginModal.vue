<template>
  <!-- Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="login" class="needs-validation" action="/ajax/login" @submit.prevent="loginAjax">
            <div class="form-floating mb-3">
              <input type="email" v-model="email" class="form-control" id="loginInput" placeholder="name@example.com" required>
              <label for="loginInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" v-model="password" class="form-control" id="loginPassword" placeholder="Password" required>
              <label for="loginPassword">Password</label>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="loginCheck">
              <label class="form-check-label" for="loginCheck">Check me out</label>
            </div>
            <div class="mx-3 d-none alert alert-success" v-if="status != false" role="alert">
              Welcome {{ name }}
            </div>
            <div class="mx-3 d-none alert alert-danger" v-if="status == false" role="alert">
              Password or User wrong!
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "LoginModal",
  data() {
    return {
      email: '',
      password: '',
      status:true,
      name:''
    };
  },
  methods: {
    loginAjax: function() {
      let form = document.getElementById('login');
      let url  = form.getAttribute('action');

      axios.post(url,{
        email:this.email,
        password:this.password
      },{headers: {
          'Content-Type': 'application/json'
      }}).then(response => {
        if(response.data.success) {

          this.status = true;
          this.name   = response.data.username
          document.querySelector('#login .alert-success').classList.remove('d-none');
          this.$emit('username', this.name);
        }else {

          this.status = false;
          document.querySelector('#login .alert-danger').classList.remove('d-none');
        }
      }).catch(error => {

        this.status = false;
        document.querySelector('#login .alert-danger').classList.remove('d-none');
      })
    }
  }
}
</script>

<style scoped>

</style>