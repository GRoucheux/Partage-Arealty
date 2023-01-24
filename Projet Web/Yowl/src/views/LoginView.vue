<script setup>
import { useRouter, useRoute } from 'vue-router'
import ButtonComponent from "/src/components/ButtonComponent.vue";
import headerComponent from "../components/headerComponent.vue";
import { ref } from "vue";

const router = useRouter()
const username = ref("");
const password = ref("");

function prout() {
    const send = {
        headers: { "Content-type": "application/json", credentials: "include" },
        method: "POST",
        body: JSON.stringify({
            username: username.value,
            password: password.value,
        }),
    };
    let result = fetch(
        "http://127.0.0.1:8000/api/verifyUser", send
    )
        .then((result) => {
            if (result.ok) {
                sessionStorage.setItem("userInfo", JSON.stringify(username.value));
                router.push("/")

            }
        });

    console.log(result)
}

</script>

<template>
    <headerComponent />
    <section class="login100vh backgroundcolor3">
        <div class="paddingCard container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card registerformsize backgroundcolor1" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 fontColor">Login</p>

                                    <form class="mx-1 mx-md-4" @submit.prevent="prout">

                                        <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="username" class="form-control backgroundcolor2"
                                                    required v-model="username" />
                                                <label class="form-label" for="username">Your UserName</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4 fontColor">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="password"
                                                    class="form-control backgroundcolor2" required v-model="password" />
                                                <label class="form-label" for="password">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <ButtonComponent :string_buttonValue="'Login'" />
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="../assets/img/7eLogin.jpg" class="img-fluid"
                                        alt="la 7e copagnie vous salue">

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

.backgroundcolor2 {
    background-color: var(--bs-mainColor2);
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

.login100vh {
    min-height: 100vh;
}
</style>
