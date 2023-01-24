<script setup>
import headerComponent from "../components/headerComponent.vue"
import ButtonComponent from "../components/ButtonComponent.vue"
import { ref, onMounted } from 'vue';

let data = sessionStorage.getItem('userInfo');

console.log(data);
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
  let bidule = myUser.username
  console.log(bidule);

});
let modify = ref("");
let choix = ref("");
const Mname = ref("");
const Mlastname = ref("");
const Memail = ref("");
const Mpassword = ref("");

function name() {
  
    choix.value = 'name';
    modify.value = Mname.value;
}
function lastname() {
    choix.value = 'lastname';
    modify.value = Mlastname.value;
}
function email() {
    choix.value = 'email';
    modify.value = Memail.value;
}
function password() {
    choix.value = 'password';
    modify.value = Mpassword.value;
}


function send () {
  console.log(choix.value);
  
    const _send = {
      headers: { "Content-type": "application/json", credentials: "include" },
      method: "POST",
      body: JSON.stringify({
        username: JSON.parse(data),
        choix: choix.value,
        modify: modify.value,
      }),
    };
     fetch("http://127.0.0.1:8000/api/modifyUser", _send)
      .then(value => {
        console.log(value.status)
        if (value.status === 200) {
          return value.json()
        } else {

        }
      })

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
              <li class="breadcrumb-item active" aria-current="page"><router-link to="/user">User Profile</router-link>
              </li>
              <li class="breadcrumb-item"><router-link to="/userPosts">User Posts</router-link></li>
            </ol>
          </nav>
        </div>
      </div>

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
                  <p class="mb-0">Name</p>
                </div>
                <div class="col-sm-9">
                  <input
                          type="text"
                          id="name"
                          class="form-control"
                          name="name"
                          v-model="Mname"
                          :placeholder="myUser.name"
                          @change="name"
                        />
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">LastName</p>
                </div>
                <div class="col-sm-9">
                  <input
                          type="text"
                          id="lastname"
                          class="form-control"
                          name="lastname"
                          v-model="Mlastname"
                          :placeholder="myUser.lastname"
                          @change="lastname"
                        />
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <input
                          type="email"
                          id="email"
                          class="form-control"
                          name="email"
                          v-model="Memail"
                          :placeholder="myUser.email"
                          @change="email"
                        />
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Password</p>
                </div>
                <div class="col-sm-9">
                  <input
                          type="password"
                          id="password"
                          class="form-control"
                          name="password"
                          v-model="Mpassword"
                          :placeholder="myUser.password"
                          @change="password"
                        />
                </div>
              </div>
              <hr>
              <div class="col-sm-9">
                <router-link to="/user">
                  <ButtonComponent :string_buttonValue="'Done'" @click="send"/>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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

.avatar {
  display: inline;
  width: 150px;
}
</style>