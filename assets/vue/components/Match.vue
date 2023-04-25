<template>
  <div class="container">
    <h1>Football match</h1>
    <div class="row" >
      <div class="col-4" v-for="game in games" :key="game.id">
        <div class="card my-3">
          <div class="card-body">
            <h5 class="card-title">{{ game.home_team }} - {{ game.away_team }}</h5>
            <p class="card-text">{{ formatDate(game.start_time.date) }}</p>
            <div class="d-flex justify-content-around">
              <button type="button" class="btn btn-primary">1</button>
              <button type="button" class="btn btn-primary">X</button>
              <button type="button" class="btn btn-primary">2</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Match",
  data(){
    return {
      games:[]
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

      axios.get('/ajax/all/game').then(response => {
        if(response.data.success) {

          this.games = response.data.games;
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