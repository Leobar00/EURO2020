<template>
  <div class="container my-4 px-0" >
    <h2>Match List</h2>
    <ul class="list-group">
      <li class="list-group-item" v-for="match in endMatch" :key="match.id">
        <form method="post"  action="/ajax/bet" :ref="'myForm' + match.id" @submit.prevent="submitResult($refs['myForm' + match.id])">
          <div class="row">
            <div class="col-sm-6">
              <h4>{{ match.home_team }} vs {{ match.away_team }}</h4>
              <p>Start: {{ formatDate(match.start_time.date) }}</p>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="homeGol">Gol Home Team</label>
                    <input type="number" name="homeGol" id="homeGol"  class="form-control">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="awayGol">Gol Away Team</label>
                    <input type="number" name="awayGol" id="awayGol"  class="form-control" >
                  </div>
                </div>
              </div>
              <input type="hidden" name="id" :value="match.id">
              <div class="form-group float-end mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>
        </form>
      </li>
      <!-- Aggiungere altre partite come elementi della lista -->
    </ul>
  </div>

</template>

<script>
import axios from "axios";
export default {
  name: "EndedMatch",
  data() {
    return {
      awayGol:0,
      homeGol:0,
      matchId:null,
      endMatch: []
    }
  },
  methods:{
    formatDate: function(dateTime) {
      const data = new Date(dateTime);
      const day = data.getDate().toString().padStart(2, '0');
      const month = (data.getMonth() + 1).toString().padStart(2, '0');
      const year = data.getFullYear().toString();
      const hour = data.getHours().toString().padStart(2, '0');
      const minute = data.getMinutes().toString().padStart(2, '0');
      return `${day}/${month}/${year} ${hour}:${minute}`;
    },
    submitResult: function(form) {
      //:(
      this.homeGol = form[0][0].value;
      this.awayGol = form[0][1].value;
      this.matchId = form[0][2].value;
      axios.post('/ajax/bet',{
        homeGol:this.homeGol,
        awayGol:this.awayGol,
        matchId:this.matchId

      }).then(response => {

      }).catch(error => {

      })
    },
  },
  mounted() {
    axios.get('/ajax/end/game').then(response => {
      this.endMatch = response.data.games
    })
  }
}
</script>

<style scoped>

</style>