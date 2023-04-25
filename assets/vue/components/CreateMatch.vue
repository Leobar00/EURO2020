<template>
  <form action="/ajax/create/match" id="createMatch" @submit.prevent="createGame">
    <div class="mb-3">
      <label for="home-team" class="form-label">Squadra di casa</label>
      <input type="text" v-model="homeTeam" class="form-control" id="home-team" placeholder="Inserisci il nome della squadra di casa" />
    </div>
    <div class="mb-3">
      <label for="away-team" class="form-label">Squadra ospite</label>
      <input type="text" v-model="awayTeam" class="form-control" id="away-team" placeholder="Inserisci il nome della squadra ospite" />
    </div>
    <div class="mb-3">
      <label for="match-date" class="form-label">Data e ora di inizio partita</label>
      <input type="datetime-local" v-model="startDate" class="form-control" id="match-date" />
    </div>

    <button type="submit" class="btn btn-primary">Salva</button>
  </form>
</template>

<script>
import axios from "axios";

export default {
  name: "CreateMatch",
  data() {
    return {
      homeTeam:'',
      awayTeam:'',
      startDate:'',
      status:true,
      name:'',
      admin:false
    }
  },
  methods: {
    createGame: function() {
      let form = document.getElementById('createMatch');
      let url  = form.getAttribute('action');

      axios.post(url,{
        homeTeam:this.homeTeam,
        awayTeam:this.awayTeam,
        startDate: this.startDate
      },{headers: {
          'Content-Type': 'application/json'
        }}).then(response => {
        if(response.data.success) {

          console.log(response.data)
        }else {

          console.log(response.data)
        }
      }).catch(error => {

        console.log(error)
      })
    }
  },
}
</script>

<style scoped>

</style>