<script setup>
import headerComponent from "../components/headerComponent.vue";
import ButtonComponent from "../components/ButtonComponent.vue";
import { ref } from "vue";

const username = ref("");
const name = ref("");
const lastname = ref("");
const email = ref("");
const password = ref("");
const repeatpassword = ref("");
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
          admin: 0,
        }),
      };
      fetch("http://127.0.0.1:8000/api/register", send)
        .then((res) => res.text())
        .then((res) => console.log(res));
     
    
  } else {
    janus.value = 1;
  }
}
</script>

<template>
  <headerComponent />
  <section class="register100vh backgroundcolor3">
    <div class="paddingCard container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div
            class="card registerformsize backgroundcolor1"
            style="border-radius: 25px"
          >
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p
                    class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 fontColor"
                  >
                    Sign up
                  </p>

                  <form class="mx-1 mx-md-4" @submit.prevent="prout">
                    <div
                      class="d-flex flex-row align-items-center mb-4 fontColor"
                    >
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="text"
                          id="username"
                          class="form-control"
                          name="username"
                          v-model="username"
                        />
                        <label class="form-label" for="username"
                          >Your UserName</label
                        >
                      </div>
                    </div>

                    <div
                      class="d-flex flex-row align-items-center mb-4 fontColor"
                    >
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="text"
                          id="name"
                          class="form-control"
                          name="name"
                          v-model="name"
                        />
                        <label class="form-label" for="name">Your Name</label>
                      </div>
                    </div>

                    <div
                      class="d-flex flex-row align-items-center mb-4 fontColor"
                    >
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="text"
                          id="lastname"
                          class="form-control"
                          name="lastname"
                          v-model="lastname"
                        />
                        <label class="form-label" for="lastname"
                          >Your LastName</label
                        >
                      </div>
                    </div>

                    <div
                      class="d-flex flex-row align-items-center mb-4 fontColor"
                    >
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="email"
                          id="email"
                          class="form-control"
                          name="email"
                          v-model="email"
                        />
                        <label class="form-label" for="email">Your Email</label>
                      </div>
                    </div>

                    <div
                      class="d-flex flex-row align-items-center mb-4 fontColor"
                    >
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="password"
                          id="password"
                          class="form-control"
                          name="password"
                          v-model="password"
                        />
                        <label class="form-label" for="password"
                          >Password</label
                        >
                      </div>
                    </div>

                    <div
                      class="d-flex flex-row align-items-center mb-4 fontColor"
                    >
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="password"
                          id="password"
                          class="form-control"
                          name="password"
                          v-model="repeatpassword"
                        />
                        <label class="form-label" for="password"
                          >Repeat your password
                        </label>
                      </div>
                      <div v-if="janus == 1">Mots de passe différents</div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <input
                        class="form-check-input me-2"
                        type="checkbox"
                        value=""
                        id="form2Example3c"
                      />
                      <label
                        class="form-check-label fontColor"
                        for="form2Example3"
                      >
                        I agree all statements in
                        <a href="#!">Terms of service</a>
                      </label>
                    </div>

                    <div
                      class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                    >
                      <ButtonComponent :string_buttonValue="'Register'" />
                    </div>
                  </form>
                </div>
                <div
                  class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2"
                >
                  <img
                    src="../assets/img/7eRegister.jpg"
                    class="img-fluid"
                    alt="la 7e copagnie vous salue"
                  />
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

.paddingCard {
  padding-top: 2%;
  padding-bottom: 2%;
}

.register100vh {
  min-height: 100vh;
}
</style>
