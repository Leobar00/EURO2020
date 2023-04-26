<template>
  <Jumbotron/>
  <Match />
</template>

<script>
import Jumbotron from "./Jumbotron";
import Match from "./Match";
export default {
  name: "Home",
  components: {Match, Jumbotron}
}
</script>

<style scoped>

</style>