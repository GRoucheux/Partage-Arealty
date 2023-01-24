<script setup></script>

<script>
// Export des données pour réutilisation dans le template
export default {
  // Instance
  name: "ToasterComponent",
  // Composants utilisés
  components: {},
  // Données
  data() {
    // Retour de la "data"
    return {};
  },
  // Méthodes
  methods: {},
  // Initialisation de la page
  created() {},
  // Récupération des données transmises via composants
  props: {
    string_alertBoxMessage: {
      type: String,
      required: false,
    },
  },
  // Récupération des données transmises via les routes
  mounted() {},
};
</script>

<template>
  <div>
    <p>{{ string_alertBoxMessage }}</p>
  </div>
</template>

<style scoped>
div {
  margin: 0;
  padding: 10px;
}
p {
  margin: auto;
  padding: 0;
  text-align: center;
}
</style>
