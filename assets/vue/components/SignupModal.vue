<template>
  <!-- Modal -->
  <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="registerModalLabel">Sign up</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="registration" class="needs-validation" action="/ajax/registration" @submit.prevent="registerAjax">
            <div class="form-floating mb-3">
              <input type="email" v-model="email" class="form-control" id="registerInput" placeholder="name@example.com" required>
              <label for="registerInput">Email address</label>
            </div>
            <div class="form-floating mb-3 input-group has-validation">
              <input type="name" v-model="name" class="form-control" id="registerName" placeholder="name" required>
              <label for="registerName">Name</label>
            </div> input-group has-validation
            <div class="form-floating mb-3 input-group has-validation">
              <input type="surname" v-model="surname" class="form-control" id="registerSurname" placeholder="surname" required>
              <label for="registerSurname">Surname</label>
            </div>
            <div class="form-floating mb-3 input-group has-validation">
              <input type="password" v-model="password" class="form-control" id="registerPassword" placeholder="Password" required>
              <label for="registerPassword">Password</label>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="registerCheck">
              <label class="form-check-label" for="registerCheck">Check me out</label>
            </div>
            <div class='mx-3 alert alert-success d-none'  role="alert">
              Succesfully registration
            </div>
            <div class='mx-3 alert alert-danger d-none' role="alert">
              Error
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
  name: "SignupModal",
  data() {
    return {
      name: '',
      surname: '',
      email: '',
      password: '',
    };
  },
  methods: {
    registerAjax: function() {
        let form = document.getElementById('registration');
        let url  = form.getAttribute('action');
        axios.post(url,{
          name:this.name,
          surname:this.surname,
          email:this.email,
          password:this.password
        },{headers: {
          'Content-Type': 'application/json'
        }}).then(response => {
          if(response.data.success) {
            document.querySelector('#registration .alert-danger').classList.add('d-none');
            document.querySelector('#registration .alert-success').classList.remove('d-none');
          }else {
            document.querySelector('#registration .alert-danger').classList.remove('d-none');
          }
        }).catch(error => {
          document.querySelector('#registration .alert-danger').classList.remove('d-none');
        })
    }
  }
}
</script>

<style scoped>

</style>