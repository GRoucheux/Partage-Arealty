<script setup></script>

<script>
// Export des données pour réutilisation dans le template
export default {
  // Instance
  name: "ButtonComponent",
  // Composants utilisés
  components: {},
  // Données
  data() {},
  // Méthodes
  methods: {},
  // Créations
  created() {},
  // Récupération des données transmises par le parent
  props: {
    string_buttonValue: {
      type: String,
      required: false,
    },
  },
};
</script>

<template>
  <input type="submit" class="submitButton" v-bind:value="string_buttonValue" />
</template>

<style scoped>
.submitButton {
  margin: 0;
  padding: 5px;
  background-color: var(--bs-mainColor4);
  color: var(--bs-mainColor1);
  border: none;
  border-radius: var(--borderRadius);
  box-shadow: var(--buttonsBoxShadow);
  cursor: pointer;
  font-weight: bold;
}
</style>
