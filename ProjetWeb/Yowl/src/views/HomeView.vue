<script setup>
import ButtonComponent from "/src/components/ButtonComponent.vue";
import headerComponent from "../components/headerComponent.vue";
</script>

<script>
// Export des données pour réutilisation dans le template
export default {
  // Instance
  name: "HomeView",
  // Composants utilisés
  components: {
    // PostComponent,
    ButtonComponent,
  },
  // Données
  data() {
    // Tableau qui récupère tous les utilisateurs de la BDD
    let array_users;
    // Tableau qui récupère tous les posts de la BDD
    let array_posts;
    // Tableau qui récupère tous les commentaires de la BDD
    let array_comments;
    // Tableau qui récupère tous les likes de la BDD
    let array_likes;
    // Objet qui récupère pour chaque post les données de l'auteur, le nombre de commentaires, et le nombre de likes
    let object_associatedDatas = [];
    // Fonction qui recense pour chaque post les données de l'auteur, le nombre de commentaires, et le nombre de likes
    async function func_datasFetch() {
      // Envoi d'une requête vers la BBD pour récupérer tous les utilisateurs
      await fetch("http://localhost:8000/api/seeAll", {
        method: "GET",
        headers: { "Content-Type": "application/json" },
      })
        // Récupération des données de la promise au format JSON
        .then((promise) => promise.json())
        // Traitement des données de la promise
        .then((promise) => {
          // Sauvegarde des données de la promise dans le tableau créé à cette fin
          this.array_users = promise;
        });
      // Envoi d'une requête vers la BBD pour récupérer tous les posts
      await fetch("http://localhost:8000/api/seeAllPosts", {
        method: "GET",
        headers: { "Content-Type": "application/json" },
      })
        // Récupération des données de la promise au format JSON
        .then((promise) => promise.json())
        // Traitement des données de la promise
        .then((promise) => {
          // Sauvegarde des données de la promise dans le tableau créé à cette fin
          this.array_posts = promise;
        });
      // Envoi d'une requête vers la BBD pour récupérer tous les commentaires
      await fetch("http://localhost:8000/api/seeAllCom", {
        method: "GET",
        headers: { "Content-Type": "application/json" },
      })
        // Récupération des données de la promise au format JSON
        .then((promise) => promise.json())
        // Traitement des données de la promise
        .then((promise) => {
          // Sauvegarde des données de la promise dans le tableau créé à cette fin
          this.array_comments = promise;
        });
      // Envoi d'une requête vers la BDD pour récupérer tous les likes
      await fetch("http://localhost:8000/api/seeAllLikePost", {
        method: "GET",
        headers: { "Content-Type": "application/json" },
      })
        // Récupération des données de la promise au format JSON
        .then((promise) => promise.json())
        // Traitement des données de la promise
        .then((promise) => {
          // Sauvegarde des données de la promise dans le tableau créé à cette fin
          this.array_likes = promise;
        });
      // Boucle sur les posts
      this.array_posts.forEach((post) => {
        // Objet qui récupère les données du post
        let object_post = post;
        // Object qui récupère les données de l'auteur
        let object_user;
        // Boucle sur les utilisateurs
        this.array_users.forEach((user) => {
          // Recherche de l'auteur du post
          // Si le "username" de l'utilisateur correspond au "username" de l'auteur du post
          if (user.username == post.author) {
            // Sauvegarde des données de l'auteur dans l'objet créé à cette fin
            object_user = user;
          }
        });
        // Variable qui récupère le nombre de commentaires du post
        let numberOfComments = 0;
        // Boucle sur les commentaires
        this.array_comments.forEach((comment) => {
          // Recherche des commentaires liés au post
          // Si l'id du post enregistré dans le commentaire correspond à l'id du post
          if (comment.post_id == post.id) {
            // Incrémentation de la variable créée à cette fin
            numberOfComments++;
          }
        });
        // Variable qui récupère le nombre de likes du post
        let numberOfLikes = 0;
        // Boucle sur les likes
        this.array_likes.forEach((like) => {
          // Recherche des likes liés au post
          // Si l'id du post enregistré dans le like correspond à l'id du post
          if (like.id == post.id) {
            // Incrémentation de la variable créée à cette fin
            numberOfLikes++;
          }
        });
        // Sauvegarde de toutes les données dans l'objet créé à cette fin
        this.object_associatedDatas.push({
          post: object_post,
          user: object_user,
          numberOfComments: numberOfComments,
          numberOfLikes: numberOfLikes,
        });
      });
    }
    // Retour de la "data"
    return {
      array_users,
      array_posts,
      array_comments,
      array_likes,
      object_associatedDatas,
      func_datasFetch,
    };
  },
  // Méthodes
  methods: {},
  // Initialisation de la page
  created() {
    // Appel de la fonction qui recense pour chaque post les données de l'auteur, le nombre de commentaires, et le nombre de likes
    this.func_datasFetch();
  },
  // Récupération des données transmises via composants
  props: {},
  // Récupération des données transmises via les routes
  mounted() {},
};
</script>

<template>
  <headerComponent />
  <main v-if="object_associatedDatas.length !== 0">
    <article v-for="object in object_associatedDatas" :key="object">
      <header class="postHeader">
        <figure class="userPictureWrapper">
          <img v-if="object.user.url_img !== null" :src="object.user.url_img" />
          <img
            v-else
            src="data:image/jpeg;base64,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"
          />
        </figure>
        <p class="postDatasWrapper">
          Publié par
          <span v-if="object.user.username !== null">{{
            object.user.username
          }}</span
          ><span v-else>Cet utilisateur n'existe plus</span> le
          <span>{{ object.post.created_at }}</span>
        </p>
        <router-link :to="{ name: 'post', params: { postId: object.post.id } }">
          <ButtonComponent :string_buttonValue="'See more'" />
        </router-link>
      </header>
      <div class="hr"></div>
      <h2>{{ object.post.title }}</h2>
      <section class="postContentWrapper">
        <figure v-if="object.post.url_img !== null" class="postPictureWrapper">
          <img :src="object.post.url_img" />
        </figure>
        <p class="postText">{{ object.post.content }}</p>
      </section>
      <section class="socialDatasWrapper">
        <p class="likeText">{{ object.numberOfLikes }} likes</p>
        <p class="commentText">{{ object.numberOfComments }} comments</p>
      </section>
    </article>
  </main>
</template>

<style scoped>
main {
  margin: 0;
  padding: 25px;
  background-color: var(--bs-mainColor3);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
}
article {
  margin: 0 0 25px 0;
  padding: 10px;
  background-color: var(--bs-mainColor1);
  border-radius: var(--borderRadius);
  box-shadow: var(--elementsBoxShadow);
  max-width: 700px;
}
article:last-child {
  margin-bottom: 0;
}
article .hr {
  background-color: var(--bs-mainColor4);
  height: 1px;
  padding: 0;
  margin: 10px 0 10px 0;
}
.postHeader {
  margin: 0;
  padding: 0;
  display: flex;
  align-items: center;
}
.userPictureWrapper {
  width: 50px;
  height: 50px;
  border-radius: 100%;
  flex: none;
  border: solid 1px var(--bs-mainColor4);
  margin: 0;
}
.postDatasWrapper {
  margin: 0;
  padding: 0 10px 0 10px;
  flex: auto;
  display: flex;
  color: var(--bs-fontColor);
}
.postDatasWrapper > *:first-child {
  margin: 0 5px 0 5px;
  font-weight: bold;
}
.postDatasWrapper > *:last-child {
  margin: 0 5px 0 5px;
}
h2 {
  margin: 0;
  padding: 0 0 10px 0;
  color: var(--bs-fontColor);
}
.postContentWrapper {
  margin: 0;
  padding: 0;
  display: flex;
  align-items: flex-start;
}
.postPictureWrapper {
  width: 40%;
  border-radius: var(--borderRadius);
  flex: none;
  border: solid 1px var(--bs-mainColor4);
}
.postText {
  margin: 0;
  padding: 0 0 0 10px;
  color: var(--bs-fontColor);
  flex: auto;
}
.socialDatasWrapper {
  margin: 0;
  padding: 10px 0 0 0;
  display: flex;
}
.likeText,
.commentText,
.shareText {
  margin: 0;
  padding: 0 10px 0 0;
  color: var(--bs-fontColor);
}
</style>
