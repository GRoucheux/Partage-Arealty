<script setup>
import headerComponent from "../components/headerComponent.vue";
import ButtonComponent from "../components/ButtonComponent.vue";
import { ref, onMounted } from "vue";

const username = ref("");
const name = ref("");
const lastname = ref("");
const email = ref("");
const password = ref("");
const repeatpassword = ref("");
const admin = ref("");
const username1 = ref("");
let janus = ref("");
let usernameErr = ref("");
function prout() {
    if (repeatpassword.value == password.value) {
        const sendVerify = {
            headers: { "Content-type": "application/json", credentials: "include" },
            method: "POST",
            body: JSON.stringify({
                username: username.value,
            }),
        };
        let result = "";
        fetch("http://127.0.0.1:8000/api/verifyUserExist", sendVerify)
            .then((res) => res.text())
            .then((res) => console.log(res))
            .then((res) => result = res);


        const send = {
            headers: { "Content-type": "application/json", credentials: "include" },
            method: "POST",
            body: JSON.stringify({
                username: username.value,
                name: name.value,
                lastname: lastname.value,
                email: email.value,
                password: password.value,
                admin: admin.value,
            }),
        };
        fetch("http://127.0.0.1:8000/api/register", send)
            .then((res) => res.text());


    } else {
        janus.value = 1;
    }
}
function deleteUser() {
    if (confirm("Are you sure you want to delete this user?")) {
        const sendVerify = {
            headers: { "Content-type": "application/json", credentials: "include" },
            method: "POST",
            body: JSON.stringify({
                username: username1.value,
            }),
        };
        let result = "";
        fetch("http://127.0.0.1:8000/api/verifyUserExist", sendVerify)
            .then((res) => res.text())
            .then((res) => console.log(res))
            .then((res) => result = res);


        const send = {
            headers: { "Content-type": "application/json", credentials: "include" },
            method: "POST",
            body: JSON.stringify({
                username: username1.value,
            }),
        };

        fetch("http://127.0.0.1:8000/api/delUser", send)
            .then((res) => res.text());


    } else {
        janus.value = 1;
    }
}

// onMounted(async () => {
//       // Envoi d'une requête vers la BBD pour récupérer tous les utilisateurs
//       await fetch("http://localhost:8000/api/seeAll", {
//         method: "GET",
//         headers: { "Content-Type": "application/json" },
//       })
//       .then(value => {
//         let arrayUser = ref([]);
//         arrayUser = value;
//         console.log(arrayUser);
//       if (value.status === 200) {
//         return value.json()
//       } else {

//       }
//     })
// });

</script>

<script>
export default {
    // Instance
    name: "manageUsers",
    // Composants utilisés
    components: {

    },
    // Données
    data() {
        let array_users;
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
        }
        return {
            array_users,
            func_datasFetch,
        }
    },
    created() {
        // Appel de la fonction qui recense pour chaque post les données de l'auteur, le nombre de commentaires, et le nombre de likes
        this.func_datasFetch();
    },
}

</script>

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
                                <router-link to="/manageLikes">Manage likes</router-link>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="login100vh backgroundcolor3">
            <div class="paddingCard container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card registerformsize backgroundcolor1" style="border-radius: 25px">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 fontColor">
                                            Show all users
                                        </p>
                                        <article class="mx-1 mx-md-4">
                                            <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <ul v-for="user in array_users" :key="user">
                                                        <li>
                                                            {{ user.username }} / {{ user.name }} / {{ user.lastname }} / {{ user.email }} / {{ user.admin }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </article>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="login100vh backgroundcolor3">
            <div class="paddingCard container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card registerformsize backgroundcolor1" style="border-radius: 25px">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 fontColor">
                                            Delete user
                                        </p>


                                        <form class="mx-1 mx-md-4" @submit.prevent="deleteUser">
                                            <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" id="username" class="form-control"
                                                        name="username" v-model="username1" />
                                                    <label class="form-label" for="username">UserName to delete</label>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <ButtonComponent :string_buttonValue="'Delete'" />
                                            </div>
                                        </form>

                                    </div>
                                    <div
                                        class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img src="../assets/img/7eDelete.jpg" class="img-fluid"
                                            alt="la 7e copagnie vous dit adieu" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="register100vh backgroundcolor3">
            <div class="paddingCard container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card registerformsize backgroundcolor1" style="border-radius: 25px">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 fontColor">
                                            Create new user
                                        </p>

                                        <form class="mx-1 mx-md-4" @submit.prevent="prout">
                                            <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" id="username" class="form-control"
                                                        name="username" v-model="username" />
                                                    <label class="form-label" for="username">Your UserName</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" id="name" class="form-control" name="name"
                                                        v-model="name" />
                                                    <label class="form-label" for="name">Your Name</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="text" id="lastname" class="form-control"
                                                        name="lastname" v-model="lastname" />
                                                    <label class="form-label" for="lastname">Your LastName</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="email" id="email" class="form-control" name="email"
                                                        v-model="email" />
                                                    <label class="form-label" for="email">Your Email</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="password" class="form-control"
                                                        name="password" v-model="password" />
                                                    <label class="form-label" for="password">Password</label>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <input type="password" id="password" class="form-control"
                                                        name="password" v-model="repeatpassword" />
                                                    <label class="form-label" for="password">Repeat your password
                                                    </label>
                                                </div>
                                                <div v-if="janus == 1">Mots de passe différents</div>
                                            </div>

                                            <div class="form-check d-flex justify-content-center mb-5">
                                                <input class="form-check-input me-2" type="checkbox" value="" id="admin"
                                                    v-model="admin" />
                                                <label class="form-check-label fontColor" for="form2Example3">
                                                    Check if this user is an ADMIN
                                                </label>
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <ButtonComponent :string_buttonValue="'Register'" />

                                            </div>
                                        </form>
                                    </div>
                                    <div
                                        class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                        <img src="../assets/img/7eRegister.jpg" class="img-fluid"
                                            alt="la 7e copagnie vous salue" />
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

.backgroundcolor2 {
    background-color: var(--bs-mainColor2);
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

.paddingCard {
    padding-top: 2%;
    padding-bottom: 2%;
}
</style>