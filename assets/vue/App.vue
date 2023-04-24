<template>
  <Header />
</template>

<script>
import Header from './components/Header'
export default {
  name: "App",
  components: {
    'Header': Header
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