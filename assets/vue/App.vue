<template>
  <Header />
</template>

<script>
import Navbar from './components/Header'
export default {
  name: "App",
  components: {
    'Header': Navbar
  },
  props: {
    title: String
  },
  data(){
    return {
      message:'bello'
    }
  },
  methods: {

  },
  mounted() {

  }
}
</script>

<style scoped>

</style>