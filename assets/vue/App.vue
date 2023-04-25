<template>
  <Header />
  <main>
    <router-view></router-view>
  </main>
</template>

<script>
import Header from './components/Header'
export default {
  name: "App",
  components: {
    'Header': Header
  }
}
</script>

<style scoped>

</style>