<script setup>
import ButtonComponent from "/src/components/ButtonComponent.vue";
import headerComponent from "../components/headerComponent.vue";
import { ref } from "vue";
let data = sessionStorage.getItem('userInfo');
const title = ref("");
const content = ref("");
function send () {
  
  
    const _send = {
      headers: { "Content-type": "application/json", credentials: "include" },
      method: "POST",
      body: JSON.stringify({
        author: JSON.parse(data),
        title: title.value,
        content: content.value,
      }),
    };
     fetch("http://127.0.0.1:8000/api/createPost", _send)
      .then(value => {
        console.log(value.status)
        if (value.status === 200) {
          return value.json()
        } 
        
      })
}
</script>
<template>
  <headerComponent />
  <section class="login100vh backgroundcolor3">
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
                    Create New Post
                  </p>

                  <form class="mx-1 mx-md-4" @submit.prevent="send">
                    <div
                      class="d-flex flex-row align-items-center mb-4 fontColor"
                    >
                      <i class="fas fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          type="text"
                          id="title"
                          class="form-control backgroundcolor2"
                          name="title"
                          v-model="title"
                        />
                        <label class="form-label" for="title"
                          >Title</label
                        >
                      </div>
                    </div>

                    <div
                      class="d-flex flex-row align-items-center mb-4 fontColor"
                    >
                      <i class="fas fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input
                          id="content"
                          type="text"
                          name="content"
                          class="form-control backgroundcolor2"
                          rows="4"
                          cols="50"
                          v-model="content"
                        />
                        <label class="form-label" for="content"
                          >Your post</label
                        >
                      </div>
                    </div>

                    <div
                      class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                    >
                      <ButtonComponent :string_buttonValue="'Submit'" />
                    </div>
                  </form>
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