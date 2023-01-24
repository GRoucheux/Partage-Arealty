<script setup>
import ButtonComponent from "./ButtonComponent.vue"
import { ref, onMounted } from 'vue';

let data = sessionStorage.getItem('userInfo');

function bye () {
    sessionStorage.clear();
}


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
      
});
</script>

<template>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light backgroundcolor">
        <div class="container px-4 px-lg-5">
            <router-link to="/"><img class="navbar-brand taillelogo" src="../assets/img/7eLogo.png"></router-link>
            <!--searchbar responsive-->
            <form class="form-inline me-auto searchbar-responsive d-flex">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <ButtonComponent :string_buttonValue="'Search'" />
            </form>
            <!--fin searchbar responsive-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><router-link to="/" class="nav-link active" aria-current="page">Home</router-link></li>
                </ul>
                <!--searchbar classic-->
                <form class="form-inline me-auto searchbar-classic d-flex">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <ButtonComponent :string_buttonValue="'Search'" />
                </form>
                <!--fin searchbar classic-->
                <form class="d-flex" v-if="(data == undefined)">
                    <div class="paddingbutton">
                        <router-link to="/login">
                            <ButtonComponent :string_buttonValue="'Login'" />
                        </router-link>
                    </div>
                    <div class="paddingbutton">
                        <router-link to="/register">
                            <ButtonComponent :string_buttonValue="'Register'" />
                        </router-link>
                    </div>
                </form>
                <form class="d-flex" v-else>
                    <div class="paddingbutton" v-if="(myUser.admin == 1)">
                        <router-link to="/commandant">
                            <ButtonComponent :string_buttonValue="'Admin Page'" />
                        </router-link>
                    </div>
                    <div class="paddingbutton">
                        <router-link to="/createpost">
                            <ButtonComponent :string_buttonValue="'Create a Post'" />
                        </router-link>
                    </div>
                    <div class="paddingbutton">
                        <router-link to="/user">
                            <ButtonComponent :string_buttonValue="'User Profile'" />
                        </router-link>
                    </div>
                    <div class="paddingbutton" @click="bye">
                        <router-link to="/">
                            <ButtonComponent :string_buttonValue="'Logout'" />
                        </router-link>
                    </div>
                </form>
            </div>
        </div>
    </nav>
</template>

<style scoped>
.backgroundcolor {
    background-color: var(--bs-mainColor1);
}

.taillelogo {
    width: 100px;
}

.paddingbutton {
    padding-left: 10px;
}

.searchbar-responsive{
    display: none !important;
}


@media (max-width: 1200px) {
    .searchbar-responsive{
    display: flex !important;
    }
    .searchbar-classic{
        display: none !important;
    }

}
</style>