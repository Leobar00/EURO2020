<template>
  <div class="container my-4 px-0">
    <h2>Lista Partite</h2>
    <ul class="list-group">
      <li class="list-group-item" v-for="match in endMatch" :key="match.id">
        <form method="post" action="salva_dati_partita.php">
          <div class="row">
            <div class="col-sm-6">
              <h4>{{ match.home_team }} vs {{ match.away_team }}</h4>
              <p>Start: {{ formatDate(match.start_time.date) }}</p>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="casa-gol">Gol casa</label>
                    <input type="number" class="form-control" id="casa-gol" name="casa-gol">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="ospite-gol">Gol ospite</label>
                    <input type="number" class="form-control" id="ospite-gol" name="ospite-gol">
                  </div>
                </div>
              </div>
              <div class="form-group float-end mt-3">
                <button type="submit" class="btn btn-primary">Salva</button>
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
    }
  },
  mounted() {
    let url = '/ajax/end/game'
    axios.get(url).then(response => {
      this.endMatch = response.data.games
    })
  }
}
</script>

<style scoped>

</style>