<script setup>
import headerComponent from "../components/headerComponent.vue";
import ButtonComponent from "../components/ButtonComponent.vue";
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
</script>

<template>
<headerComponent />
<section class="register100vh backgroundcolor3">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="backgroundcolor1 rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item active" aria-current="page"><router-link to="/user">User Profile</router-link></li>
            <li class="breadcrumb-item"><router-link to="/userPosts">User Posts</router-link></li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="backgroundcolor1 card mb-4">
          <div class="card-body text-center">
            <img :src="myUser.url_img" alt="avatar"
              class="rounded-circle img-fluid avatar">
            <h5 class="my-3">{{ myUser.username }}</h5>
            <p class="text-muted mb-1">{{myUser.name}} {{myUser.lastname}}</p>
            <p class="text-muted mb-4">{{myUser.email}}</p>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="backgroundcolor1 list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">https://{{myUser.lastname}}.com</p>
              </li>
              <li class="backgroundcolor1 list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                <p class="mb-0">{{myUser.lastname}}</p>
              </li>
              <li class="backgroundcolor1 list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@{{myUser.lastname}}</p>
              </li>
              <li class="backgroundcolor1 list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">{{myUser.lastname}}</p>
              </li>
              <li class="backgroundcolor1 list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">{{myUser.lastname}}</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="backgroundcolor1 card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">UserName</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{myUser.username}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{myUser.name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">LastName</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{myUser.lastname}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{myUser.email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Password</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">*****************</p>
              </div>
            </div>
            <hr>
            <div class="col-sm-9">
                <router-link to="/userEdit">
                    <ButtonComponent :string_buttonValue="'Edit'" />
                </router-link>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="backgroundcolor1 card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="backgroundcolor1 card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
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