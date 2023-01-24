<script setup>
import headerComponent from "../components/headerComponent.vue";
// import ButtonComponent from "../components/ButtonComponent.vue";
import { ref, onMounted } from 'vue';

let data = sessionStorage.getItem('userInfo');

const myUser = ref([])
onMounted(async () => {
  const send = {
        headers: { "Content-type": "application/json", credentials: "include" },
        method: "POST",
        body: JSON.stringify({
          username: data,
        }),
      };
      myUser.value = await fetch("http://127.0.0.1:8000/api/showOneUser", send)
      .then(value => {
        console.log(value.status)
        if (value.status === 200) {
          return value.json()
        } else {
         
        }
      })
      console.log(myUser)
      let bidule = myUser.value.username
          console.log(bidule);
      
});
console.log("MYUSER");
console.log(myUser.value.rawValue);
</script>

<!-- <script>
// Export des données pour réutilisation dans le template
export default {
  // Instance
  name: "adminView",
  // Composants utilisés
  components: {},
  // Données
  data() {
    //
    async function adminPermission() {
        console.log(data);
    }
    // Retour de la "data"
    return {
      adminPermission,
    };
  },
  // Méthodes
  methods: {},
  // Initialisation de la page
  created() {
    this.adminPermission();
  },
  // Récupération des données transmises via les composants
  props: {},
  // Récupération des données transmises via les routes
  mounted() {},
};
</script> -->

<template>
    <headerComponent />
    <section class="register100vh backgroundcolor3">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="backgroundcolor1 rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active" aria-current="page">
                                <router-link to="/commandant">Stats</router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/manageUsers">Manage users</router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/manageComments">Manage comments</router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/managePosts">Manage posts</router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link to="/managelikes">Manage likes</router-link>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="register100vh backgroundcolor3">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="backgroundcolor1 card mb-4">
                            <div class="card-body text-center">
                                <img :src="myUser.url_img" alt="avatar" class="rounded-circle img-fluid avatar">
                                <h5 class="my-3">{{ myUser.username }}</h5>
                                <p class="text-muted mb-1">{{ myUser.name }} {{ myUser.lastname }}</p>
                                <p class="text-muted mb-4">{{ myUser.email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="backgroundcolor1 card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Registered users</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">5158</p>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Published posts</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">25874</p>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Published comments</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">85664785</p>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Number of likes</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">98657</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
</template>


<style scoped>
.backgroundcolor1 {
    background-color: var(--bs-mainColor1);
}

.backgroundcolor3 {
    background-color: var(--bs-mainColor3);
}

.fontColor {
    color: var(--bs-fontColor);
}

.register100vh {
    min-height: 100vh;
}
</style>