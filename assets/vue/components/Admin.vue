<template>
  <div class="container mt-5">
    <h1>Add detail of the match</h1>
    <CreateMatch/>
    <EndedMatch />
  </div>
</template>

<script>
import Header from "./Header";
import axios from "axios";
import CreateMatch from "./CreateMatch";
import EndedMatch from "./EndedMatch";
export default {
  name: "Admin",
  components: {EndedMatch, CreateMatch, Header},
  mounted() {
    axios.get('/ajax/session').then(response => {
      if(response.data.success) {

        this.name = response.data.user;
        this.admin= response.data.isAdmin;
      }else {

        console.log(response.data)
      }
    }).catch(error => {

      console.log(error)
    })
  }
}
</script>

<style scoped>

</style>